<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = 'dashboard';
        return view('pages.dashboard.dashboard', compact('page'));
    }
}
