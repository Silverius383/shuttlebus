<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Booking;
use App\Bus; 
use App\BusSchedule;
use App\Station;
Use App\Mail\validasi;
use Illuminate\Support\Facades\Mail;


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
        return view('admin.admin-dashboard');
    }
    public function indexbus()
    {
        $user = Auth::user()->id;
        $order = Booking::where(['customer_id' => $user])->get();
        $buses = Bus::all();
        return view('admin.admin-validasi', ['layout' => 'checklist', 'booking' => $order, 'buses' => $buses]);
    }
    public function sendmail(int $booking_id){
        $view = Booking::findOrFail($booking_id);
        $booking = Booking::find($booking_id);
        $user = Auth::user()->id;
        $order = Booking::where(['email' => $user])->get();
        try {
            Mail::to("$order")->send(new validasi($view));
            return redirect('admin/booking')->with('message', 'Mail has been sent to '.$order);

        } catch (\Exception $e) {
            return redirect('admin/booking')->with('message', 'Something went wrong');
        }

        $users = DB::table('v_bus')->select('booking_id','bus_id','bus_name','price','bus_num')->get();
        $data = ['booking' => $booking];
        $pdf = PDF::loadView('customer.invoice', array('users' => $users,'booking'=>$booking));
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice'.'-'.$todayDate.'.pdf');
    }
}