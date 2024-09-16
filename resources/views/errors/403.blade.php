<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Document</title>
</head>
<body class="bg-contain bg-top bg-no-repeat h-screen w-screen grid" style="background-size: 50% 60%; background-image: url('https://i.ytimg.com/vi/87mjZiwjNWA/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLCk_fJ-27xGwCyCnCppgJgSUCzgYw')">
    <section class= "dark:bg-gray-900 self-end">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center bg-slate-100">
                <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-600 dark:text-primary-500">403</h1>
                <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Bawal ka dito bossing!</p>
                <p class="mb-4 text-2xl font-bold text-black dark:text-gray-400">You don't have permission to access this page.</p>
                <a href="{{ route('landing') }}" class="inline-flex text-white bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900 my-4">Back to Homepage</a>
            </div>   
        </div>
    </section>
</body>
</html>