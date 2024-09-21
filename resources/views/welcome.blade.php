@extends('layouts.app')

@section('content')
    @auth
    @else
        @error('error')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="absolute w-[30%] h-[40%] top-[30%] left-[60%] bg-gray-300 z-10 rounded-md">
            <form method="POST" action="{{ route('login') }}" class="h-full grid grid-rows-8">
                <h1 class="text-4xl text-center font-semibold mt-2 row-span-1">Sign in</h2>
                    @csrf
                    <div class="grid grid-cols-1 row-span-4 justify-items-center items-center">
                        <input type="email" class="w-1/2 h-[2.5rem] pl-3 rounded-md self-end" id="email" name="email"
                            placeholder="Enter email address">

                        <input type="password" class="w-1/2 h-[2.5rem] pl-3 rounded-md" id="password" name="password"
                            placeholder="Enter password">
                    </div>
                    <div class="row-span-3 grid justify-center p-2">
                        <button type="submit" class="bg-sky-500 w-28 h-10 text-white rounded-lg">Login</button>
                        <a href="">
                            <p class="font-thin underline text-black hover:text-sky-800">Forgot password?</p>
                        </a>
                    </div>
            </form>
        </div>
        @endif
    @endsection
