@extends('layout')
@section('style')
@endsection

@section('content')
    <div class="flex flex-wrap items-center justify-center">
        @foreach ($flights as $flight)
            <div
                class="w-[30%] h-auto flex flex-col justify-center items-center mx-4 border rounded m-2 p-2 px-4 bg-[#f0f0f0]">
                <header class="w-full flex justify-between my-2">
                    <h1 class="font-bold text-lg">{{ $flight->flight_code }}</h1>
                    <h1>{{ $flight->origin }} -> {{ $flight->destination }}</h1>
                </header>
                <main class="w-full flex flex-col justify-start">
                    <h1>Departure</h1>
                    <h1 class="font-bold">{{ \Carbon\Carbon::parse($flight->departure_time)->format('l, j F Y, H:i') }}</h1>
                    <h1>Arrived</h1>
                    <h1 class="font-bold">{{ \Carbon\Carbon::parse($flight->arrival_time)->format('l, j F Y, H:i') }}</h1>
                </main>
                <footer class="w-full flex justify-between my-2">
                    <form action="{{ route('book', $flight->id) }}" method="GET">
                        @csrf
                        <button type="submit">Book ticket</button>
                    </form>
                    <form action="{{ route('details', $flight->id) }}" method="GET">
                        @csrf
                        <button type="submit">View details</button>
                    </form>
                </footer>
            </div>
        @endforeach
    </div>
@endsection

@section('script')
@endsection
