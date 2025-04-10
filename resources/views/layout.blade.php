<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Airline | {{ $title }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
        }

        .line {
            border: 1px solid black;
            width: 80vw;
            display: block;
        }
    </style>
    @yield('style')
</head>

<body class="min-h-screen flex flex-col">
    <header class="w-full flex justify-center px-4 py-2 my-8 font-bold text-3xl">
        Airplane Booking System
    </header>

    <main class="flex-1 px-4 flex flex-col items-center">
        @yield('content')
    </main>

    <footer class="w-full px-4 py-2 mb-4">
        <div class="flex justify-center w-full my-4">
            <span class="line"></span>
        </div>
        <div class="flex justify-end">
            <h1>by Web Framework and Development - 2025</h1>
        </div>
    </footer>

    @if (session('error'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Error",
                text: {!! json_encode(session('error')) !!}
            });
        </script>
    @endif
    @if (session('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Success",
                text: {!! json_encode(session('success')) !!}
            });
        </script>
    @endif


    @yield('script')
</body>

</html>
