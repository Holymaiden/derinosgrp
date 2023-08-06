<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    protected $title = 'Dashboard';

    public function index()
    {
        $title = $this->title;
        return view('content.dashboard.index', compact('title'));
    }
}
