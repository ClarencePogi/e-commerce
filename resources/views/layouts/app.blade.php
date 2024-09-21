<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="referrer" content="no-referrer">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    

    <title>J & K</title>
</head>

<body class="h-screen w-screen grid grid-cols-1 grid-rows-8 bg-cover"
    style="background-image: url('assets/pexels-daniel-reche-718241-3721941.jpg')">
    <div class="bg-black row-span-1 grid grid-cols-4 max-h-24">
        <div>
            <div style="background-image: url(assets/logo.png)"
                class="h-[100%] w-[50%] rounded-[50%] bg-cover bg-center"></div>
        </div>
        <div class="col-span-3 text-slate-300 text-2xl flex gap-10 justify-end items-center pr-10">
            @if (Route::has('login'))
                @auth
                    @if (Auth::user()->hasRole('admin'))
                        <a href="{{ url('/home/dashboard') }}">Home</a>
                    @else
                        <a href="{{ url('/home/featured') }}">Home</a>
                    @endif
                @else
                    <a href="{{ route('landing') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>

    <div class="row-span-7 relative">
        <h1 class="text-8xl text-slate-100 italic fixed top-[40%] left-[10%]">Feel the music, <br> live the moment.</h1>
        @yield('content')
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('script')
</body>

</html>
