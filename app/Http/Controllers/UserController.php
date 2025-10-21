<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function Dashboard()
    {
        if (Auth::check() && Auth::user()->type == "user") {
            return view('dashboard');
        } elseif (Auth::check() && Auth::user()->type == "admin") {
            return view('admin.dashboard');
        } else {
            return redirect('/');
        }
    }
}
