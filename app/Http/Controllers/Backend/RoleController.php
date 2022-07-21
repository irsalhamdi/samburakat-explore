<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function admin(){
        $admins = Admin::latest()->get();
        return view('backend.role.role-admin', compact('admins'));
    }

    public function users(){
        $users = User::latest()->get();
        return view('backend.role.role-users', compact('users'));
    }
}
