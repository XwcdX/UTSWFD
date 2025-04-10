@extends('layout')
@section('style')
@endsection

@section('content')
    <header class="w-[80%] px-4 py-2 mb-4">
        <div class="flex justify-between font-bold text-2xl">
            <h1>Ticket Booking For</h1>
            <h1>{{ $flight->flight_code }}</h1>
        </div>
        <div class="flex justify-center w-full my-4">
            <span class="line"></span>
        </div>
        <div class="flex justify-between">
            <h1>{{ $flight->origin }} -> {{ $flight->destination }}</h1>
            <h1>Departure <span
                    class="font-bold">{{ \Carbon\Carbon::parse($flight->departure_time)->format('l, j F Y, H:i') }}</span>
            </h1>
            <h1>Arrived <span
                    class="font-bold">{{ \Carbon\Carbon::parse($flight->arrival_time)->format('l, j F Y, H:i') }}</span></h1>
        </div>
    </header>
    <main class="w-[80%]">
        <form action="{{ route('ticket.add') }}" method="POST" class="text-lg flex flex-col justify-start w-full">
            @csrf
            <main>
                <input type="hidden" name="flight_id" value="{{ $flight->id }}">
                <div class="w-[55%] flex justify-between">
                    <label class="mr-4 flex items-center" for="name">Passenger Name</label>
                    <input type="text" id="name" class="bg-[#f0f0f0] rounded my-4 w-72 py-1 px-2"
                        name="passenger_name">
                </div>
                <div class="w-[55%] flex justify-between">
                    <label class="mr-4 flex items-center" for="phone">Passenger Phone</label>
                    <input type="text" id="phone" class="bg-[#f0f0f0] rounded my-4 w-72 py-1 px-2"
                        name="passenger_phone">
                </div>
                <div class="w-[55%] flex justify-between">
                    <label class="mr-4 flex items-center" for="seat_number">Seat Number</label>
                    <input type="text" id="seat_number" class="bg-[#f0f0f0] rounded my-4 w-72 py-1 px-2"
                        name="seat_number">
                </div>
            </main>
            <footer class="w-[80%] flex justify-end">
                <button type="button" onclick="window.location='{{ route('index') }}'" class="mx-3">
                    Cancel
                </button>
                <button type="submit" class="mx-3">Book ticket</button>
            </footer>
        </form>
    </main>
@endsection

@section('script')
@endsection
