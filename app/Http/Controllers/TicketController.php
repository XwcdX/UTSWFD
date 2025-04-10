<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    public function addTicket(Request $request){
        $valid = Validator::make($request->only(['passenger_name', 'passenger_phone', 'seat_number']), [
            'passenger_name' => 'required|string',
            'passenger_phone'=> 'required|string|regex:/^08[1-9]{1}[0-9]{11}$/',
            'seat_number'=> 'required|string|max:3|min:3'
        ]);
        if($valid->fails()){
            return back()->with('error',$valid->errors()->first());
        }
        return back()->with('success','Success');
    }
    public function confirmTicket(Ticket $ticket){
        $ticket->boarding_time = now();
        $ticket->save();
        return back()->with('success','Ticket confirmed');
    }

    public function deleteTicket(Ticket $ticket){
        $ticket->delete();
        return back()->with('success','Ticket deleted successfully');
    }
}
