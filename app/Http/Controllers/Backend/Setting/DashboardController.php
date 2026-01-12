<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        // dd(Auth::user());
        // $id = encryptor('decrypt', session('userId'));
        // $user = User::find($id);
        // dd($user);
        // dd(Session::get('instructorId'));
        // dd(session()->all());



        return view('backend.adminDashboard');
    }
}
