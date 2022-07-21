<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\DestinationType;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::latest()->get();
        return view('backend.destination.index', compact('destinations'));
    }

    public function create(){
        $provinces = Province::all();
        $destinationtypes = DestinationType::latest()->get();
        return view('backend.destination.add', compact('provinces', 'destinationtypes'));
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        $destinationtypes = DestinationType::latest()->get();
        $destination = Destination::findOrFail($id);
        $provinces = Province::all();
        return view('backend.destination.edit', compact('provinces', 'destinationtypes', 'destination'));
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        //
    }
}
