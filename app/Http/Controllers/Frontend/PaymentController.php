<?php

namespace App\Http\Controllers\Frontend;

use Exception;
use Midtrans\Config;
use App\Models\Booking;
use Midtrans\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function booking(Request $request)
    {
        if($request->destination_id){
            $code = 'STORE-' . mt_rand(000000, 999999);
            
            $id = Booking::insertGetId([
                    'user_id' => Auth::user()->id,
                    'destination_id' => $request->destination_id,
                    'transportation_id' => $request->transportation_id,
                    'total_price' => $request->price,
                    'code' => $code,
                    'date' => $request->date,
            ]);

            return redirect()->route('checkout',$id);
        }else{
            $code = 'STORE-' . mt_rand(000000, 999999);

            $id = Booking::create([
                    'user_id' => Auth::user()->id,
                    'package_id' => $request->package_id,
                    'total_price' => $request->total_price,
                    'code' => $code,
                    'date' => $request->date,
            ]);

            return redirect()->route('checkout',$id);
        }
    }

    public function proccess($id)
    {   
        $booking = Booking::where('id', $id)->first();
        $code = $booking->code;
        $total_price = $booking->total_price;
            
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');
    
        $midtrans = [
            'transaction_details' => [
                'order_id' => $code,
                'gross_amount' => (int) $total_price,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            'enabled_payments' => [
                'gopay', 'permata_va', 'bank_transfer',
            ],
            'vtweb' => [],
        ];

        try {
            $paymentUrl = \Midtrans\Snap::createTransaction($midtrans)->redirect_url;
            return redirect($paymentUrl);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function callback()
    {
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        $notification = new Notification();
        $status = $notification->transaction_status ;
        $type = $notification->payment_type ;
        $fraud = $notification->fraud_status ;
        $order_id = $notification->order_id ;

        $booking = Booking::findOrFail($order_id);

        if($status == 'capture'){
            if($type == 'credit_card'){
                if($fraud == 'challenge'){
                    $booking->payment_proof = 'PENDING';
                }else{
                    $booking->payment_proof = 'SUCCESS';
                }
            }
        }

        else if($status == 'settlement'){
            $booking->payment_proof = 'PENDING';
        }

        else if($status == 'pending'){
            $booking->payment_proof = 'PENDING';
        }

        else if($status == 'deny'){
            $booking->payment_proof = 'CANCELLED';
        }

        else if($status == 'expire'){
            $booking->payment_proof = 'CANCELLED';
        }

        else if($status == 'cancel'){
            $booking->payment_proof = 'CANCELLED';
        }

        $booking->save();
    }
}
