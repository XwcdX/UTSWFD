<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index(){
        $title = "Home";
        $flights = Flight::all();
        return view("home", compact('title', 'flights'));
    }

    public function book(Flight $flight){
        $title = 'Book';
        return view('book', compact('title','flight'));
    }

    public function details(Flight $flight){
        $title = 'Details';
        $flightDetail = $flight->load('tickets');
        return view('details', compact('title','flightDetail'));
    }
}
