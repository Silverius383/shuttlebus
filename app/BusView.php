<?php

namespace App;
use App\BusSchedule;
use App\Booking;
use App\Bus;
use Illuminate\Foundation\Auth\User as Authenticatable;


use Illuminate\Database\Eloquent\Model;

class Bus extends Authenticatable
{
    protected $table = 'v';
    protected $fillable = ['bus_id', 'bus_name'];
    protected $primaryKey = 'booking_id';

    protected $casts = [
        'seats'  =>  'array',
        // 'seats_avail'   =>  'array'
    ];

    public function schedules()
    {
        return $this->hasMany(BusSchedule::class);
    }
    
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}