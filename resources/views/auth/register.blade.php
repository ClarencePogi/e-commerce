@extends('layouts.app')

@section('content')
    <div class="absolute bg-slate-50 rounded-md w-auto h-auto top-[5%] p-5 shadow-slate-900 shadow-2xl right-12 alert hidden">
        <button class="absolute top-1 right-3" onclick="$('.alert').hide(1000)">&Cross;</button>
        <ul class="grid grid-cols-2 gap-3 text-red-600 list-disc list-inside">

        </ul>
    </div>
    <div class="absolute w-[30%] h-[63%] top-[25%] left-[60%] bg-gray-300 z-10 rounded-md">
        <h1 class="text-4xl text-left ml-4 font-semibold mt-1 mb-5 row-span-1">Sign Up</h2>
            <form method="POST" class="max-w-md mx-auto grid grid-cols-2 gap-2" id="register_form">
                @csrf
                <div class="mb-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        fullname</label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="eg. Clarence S. Golez" />
                </div>

                <div class="mb-2">
                    <label for="phonenumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        contact no.</label>
                    <input type="text" name="phonenumber" id="phonenumber"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Start with +63 or 09" />
                </div>

                <div class="mb-2">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        email</label>
                    <input type="email" id="email" name="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="name@acacia.com" />
                </div>

                <div class="mb-2">
                    <label for="eWalletNumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Create
                        Ewallet no.</label>
                    <input type="text" name="eWalletNumber" id="eWalletNumber"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="6 digits" />
                </div>

                <div class="mb-2">
                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your complete
                        address</label>
                    <input type="text" name="address" id="address"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter your address" />
                </div>

                <div class="mb-2">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Create
                        password</label>
                    <input type="password" name="password" id="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter your password" />
                </div>
                <div class="mb-2 col-span-2 grid justify-items-center">
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password confirmation</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Confirm password" />
                </div>
                {{-- <div class="grid grid-cols-1 row-span-5 justify-items-center items-center">
                    <input type="text" class="w-1/2 h-[2.5rem] pl-3 rounded-md self-start" id="name" name="name"
                        placeholder="Enter fullname">

                    <input type="text" class="w-1/2 h-[2.5rem] pl-3 rounded-md self-start" name="phonenumber"
                        id="phonenumber" placeholder="Enter phone number">

                    <input type="email" name="email" id="email" value=""
                        class="w-1/2 h-[2.5rem] pl-3 rounded-md self-start" placeholder="Enter email address">

                    <input type="text" class="w-1/2 h-[2.5rem] pl-3 rounded-md self-start" name="eWalletNumber"
                        id="eWalletNumber" placeholder="Enter ewallet number">

                    <input type="text" class="w-1/2 h-[2.5rem] pl-3 rounded-md self-start" id="address" name="address"
                        placeholder="Complete address">

                    <input type="password" class="w-1/2 h-[2.5rem] pl-3 rounded-md self-start" id="password"
                        name="password" placeholder="Create password">
                </div> --}}
                <div class="col-span-2 grid justify-center content-center">
                    <button type="submit" class="primary-btn">Register</button>
                </div>
            </form>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#register_form').on('submit', (e) => {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('register.user') }}",
                    type: 'POST',
                    data: $('#register_form').serialize(),
                    beforeSend: function() {
                        console.log('before sending');
                    },
                    success: function(response) {
                        window.location.href = "http://127.0.0.1:8000/home/featured";
                    },
                    error: function(response) {
                        const errors = Object.values((response.responseJSON).errors);
                        const listedErrors = errors.map(error => `<li>${error}</li>`).join()
                            .replaceAll(',', '');
                        $('.alert ul').html('');
                        $('.alert ul').html(listedErrors);
                        $('.alert').show(1000);
                    },
                    complete: function() {
                        console.log('Completed');
                    }
                });
            });
        });
    </script>
@endsection
