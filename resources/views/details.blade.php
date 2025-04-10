@extends('layout')
@section('style')
@endsection

@section('content')
    <header class="w-[80%] px-4 py-2 mb-4">
        <div class="flex justify-between font-bold text-2xl">
            <h1>Ticket Booking For {{ $flightDetail->flight_code }}</h1>
            <h1>
                {{ $flightDetail->tickets->count() }} Passenger -
                {{ $flightDetail->tickets->where('is_boarding', true)->count() }} Boarding
            </h1>
        </div>
        <div class="flex justify-center w-full my-4">
            <span class="line"></span>
        </div>
        <div class="flex justify-between">
            <h1>{{ $flightDetail->origin }} -> {{ $flightDetail->destination }}</h1>
            <h1>
                Departure <span class="font-bold">
                    {{ \Carbon\Carbon::parse($flightDetail->departure_time)->format('l, j F Y, H:i') }}
                </span>
            </h1>
            <h1>
                Arrived <span class="font-bold">
                    {{ \Carbon\Carbon::parse($flightDetail->arrival_time)->format('l, j F Y, H:i') }}
                </span>
            </h1>
        </div>
    </header>
    <main class="w-[80%]">
        <h1>Passenger List</h1>
        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th class="border p-2">No.</th>
                    <th class="border p-2">Passenger Name</th>
                    <th class="border p-2">Passenger Phone</th>
                    <th class="border p-2">Seat Number</th>
                    <th class="border p-2">Boarding</th>
                    <th class="border p-2">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($flightDetail->tickets as $ticket)
                    <tr>
                        <td class="border p-2">{{ $loop->iteration }}</td>
                        <td class="border p-2">{{ $ticket->passenger_name }}</td>
                        <td class="border p-2">{{ $ticket->passenger_phone }}</td>
                        <td class="border p-2">{{ $ticket->seat_number }}</td>
                        <td class="border p-2">
                            @if ($ticket->is_boarding == false)
                                {{ \Carbon\Carbon::parse($ticket->boarding_time)->format('H:i:s') }}
                            @else
                                <form action="{{ route('ticket.confirm', $ticket->id) }}" method="post"
                                    class="confirm-form">
                                    @csrf
                                    @method('patch')
                                    <button type="submit">Confirm</button>
                                </form>
                            @endif
                        </td>
                        <td class="border p-2">
                            <form action="{{ route('ticket.destroy', $ticket->id) }}" method="post" class="delete-form">
                                @csrf
                                @method('delete')
                                <button type="submit" @if ($ticket->is_boarding == false) disabled @endif>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
    <footer class="w-[80%] flex justify-center">
        <form action="{{ route('index') }}" method="get">
            @csrf
            <button type="submit">Back</button>
        </form>
    </footer>
@endsection

@section('script')
    <script>
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                if (form.querySelector('button[type="submit"]').disabled) {
                    return;
                }
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action cannot be undone.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        document.querySelectorAll('.confirm-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to confirm boarding for this ticket?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, confirm it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
