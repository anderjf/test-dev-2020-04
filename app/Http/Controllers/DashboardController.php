<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $users = \App\User::all();
        return view('dashboard', compact('users'));
    }
}
