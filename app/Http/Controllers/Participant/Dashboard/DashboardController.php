<?php

namespace App\Http\Controllers\Participant\Dashboard;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('participant.dashboard.index');
    }
}
