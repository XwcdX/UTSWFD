<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_code',
        'origin',
        'destination',
        'departure_time',
        'arrival_time',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'departure_date' => 'datetime',
        'arrival_time' => 'datetime',
    ];

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
