<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Bus;
use App\BusSchedule;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $buses = Bus::all();
        $book = Booking::all();
        $jadwal = BusSchedule::all();

        return view('admin.admin-dashboard', compact('buses','book', 'jadwal'));
    }
}