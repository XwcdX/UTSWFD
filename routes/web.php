<?php

use App\Http\Controllers\FlightController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FlightController::class, 'index'])->name('index');
Route::get('/book/{flight}', [FlightController::class,'book'])->name('book');
Route::get('/details/{flight}', [FlightController::class,'details'])->name('details');

Route::post('/ticket', [TicketController::class,'addTicket'])->name('ticket.add');
Route::delete('/ticket/{ticket}', [TicketController::class,'deleteTicket'])->name('ticket.destroy');
Route::patch('/ticket/{ticket}', [TicketController::class,'confirmTicket'])->name('ticket.confirm');
