<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" /> --}}
</head>

<body class="w-screen h-screen grid grid-cols-1 grid-rows-1">
    @if (Auth::user()->hasRole('admin'))
        <div class="bg-stone-950 grid grid-cols-6 grid-rows-1">
            {{-- Sidebar --}}
            <div class="col-span-1 bg-slate-900 md:grid hidden grid-cols-1 grid-rows-5 side-bar">
                <div class="logo row-span-1 grid justify-items-center items-center">
                    <img src="../assets/logo.png" class="w-full h-full" alt="">
                </div>
                <div class="nav row-span-2 grid grid-cols-1 text-slate-100 pt-10">
                    <div class="hover:nav-hover nav dashboard"><a href="{{ route('dashboard.view') }}">Dashboard</a></div>
                    <div class="hover:nav-hover nav products"><a href="{{ route('products.view') }}">Products</a></div>
                    <div class="hover:nav-hover nav orders"><a href="{{ route('orders.view') }}">Orders</a></div>
                    <div class="hover:nav-hover nav"><a data-modal-target="popup-modal" data-modal-toggle="popup-modal">Logout</a></div>
                </div>
                <div class="nothing row-span-2"></div>
            </div>

            {{-- Content --}}
            <div class="content md:col-span-5 col-span-6">
                @yield('content')
            </div>
        </div>
    @else
        {{-- User content --}}
        <div class="bg-stone-950 grid grid-cols-1 grid-rows-6">
            <div class="bg-black row-span-1 grid grid-rows-4">
                <div class="row-span-4 grid grid-cols-4">

                    <div class="col-start-1 bg-contain bg-no-repeat bg-center"
                        style="background-image: url(../assets/logo.png)">
                    </div>
                    <div class="col-start-2 col-span-2 grid justify-center">
                        <h1 class="text-3xl text-slate-50 font-bold self-center justify-self-center">Shop J&G Music</h1>
                    </div>
                    <div class="col-start-4 grid justify-items-center relative grid-cols-2">
                        <button onclick="$('.profile-dropdown').slideDown('slow')" class="col-start-2"><i
                                class="fa-regular fa-user text-white text-2xl"></i></button>
                        <div
                            class="w-[30%] h-auto bg-slate-100 absolute right-11 top-[63%] hidden profile-dropdown p-3">
                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" >Logout</button>
                            {{-- <a href="{{ route('logout') }}" class="text-center font-bold hover:text-red-600">Logout</a> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-slate-300 row-span-5 grid grid-cols-6 grid-rows-1">
                <div class="col-span-1 bg-slate-200 border-r-[1px] border-slate-900 grid grid-rows-3">
                    <div class="border-b-[1px] border-slate-500 grid grid-cols-1 content-center gap-5">
                        <a href="{{ route('featured') }}">
                            <div class="flex text-1xl font-semibold grid-cols-2 justify-center gap-5 pt-5 h-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" class="" height="24"
                                    viewBox="0 0 24 24" id="shopping-bag">
                                    <path fill="none" d="M0 0h24v24H0V0z"></path>
                                    <path
                                        d="M19 6h-2c0-2.76-2.24-5-5-5S7 3.24 7 6H5c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-7-3c1.66 0 3 1.34 3 3H9c0-1.66 1.34-3 3-3zm7 17H5V8h14v12zm-7-8c-1.66 0-3-1.34-3-3H7c0 2.76 2.24 5 5 5s5-2.24 5-5h-2c0 1.66-1.34 3-3 3z">
                                    </path>
                                </svg>
                                Featured
                            </div>
                        </a>
                        <a href="{{ route('userOrders.view') }}">
                            <div class="flex text-1xl font-semibold grid-cols-2 justify-center gap-5 pt-5 h-full">
                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 1024 1024"
                                    class="" width="24" height="24" viewBox="0 0 1024 1024" id="order">
                                    <path
                                        d="M537.2,918.7c-14.1-7.4-28.2-14.9-42.3-22.3c-33.9-17.9-67.7-35.8-101.6-53.7
                                                                          c-41.1-21.7-82.3-43.4-123.4-65.2c-35.4-18.7-70.9-37.4-106.3-56.1c-17.2-9.1-34.3-18.5-51.7-27.3c-0.2-0.1-0.5-0.3-0.7-0.4
                                                                          c8.3,14.4,16.5,28.8,24.8,43.2c0-15,0-29.9,0-44.9c0-35.7,0-71.5,0-107.2c0-43.2,0-86.4,0-129.7c0-37.5,0-75,0-112.6
                                                                          c0-18.2,0.3-36.4,0-54.6c0-0.2,0-0.5,0-0.7c-25.1,14.4-50.2,28.8-75.2,43.2c14.1,7.5,28.2,14.9,42.3,22.4
                                                                          c33.9,17.9,67.7,35.8,101.6,53.7c41.1,21.7,82.3,43.5,123.4,65.2c35.4,18.7,70.9,37.5,106.3,56.2c17.2,9.1,34.3,18.5,51.7,27.3
                                                                          c0.2,0.1,0.5,0.3,0.7,0.4c-8.3-14.4-16.5-28.8-24.8-43.2c0,14.9,0,29.9,0,44.8c0,35.7,0,71.4,0,107.1c0,43.2,0,86.4,0,129.6
                                                                          c0,37.5,0,75,0,112.5c0,18.2-0.2,36.4,0,54.6c0,0.2,0,0.5,0,0.7c0,12.8,5.6,26.3,14.6,35.4c8.7,8.7,22.9,15.2,35.4,14.6
                                                                          c12.9-0.6,26.3-4.8,35.4-14.6c9-9.8,14.6-21.8,14.6-35.4c0-14.9,0-29.9,0-44.8c0-35.7,0-71.4,0-107.1c0-43.2,0-86.4,0-129.6
                                                                          c0-37.5,0-75,0-112.5c0-18.2,0.2-36.4,0-54.6c0-0.2,0-0.5,0-0.7c0-17-9.4-35-24.8-43.2c-14.1-7.5-28.2-14.9-42.3-22.4
                                                                          c-33.9-17.9-67.7-35.8-101.6-53.7c-41.1-21.7-82.3-43.5-123.4-65.2c-35.4-18.7-70.9-37.5-106.3-56.2
                                                                          c-17.2-9.1-34.4-18.4-51.7-27.3c-0.2-0.1-0.5-0.3-0.7-0.4c-16-8.5-34.5-9.3-50.5,0c-15.2,8.9-24.8,25.5-24.8,43.2
                                                                          c0,15,0,29.9,0,44.9c0,35.7,0,71.5,0,107.2c0,43.2,0,86.4,0,129.7c0,37.5,0,75,0,112.6c0,18.2-0.2,36.4,0,54.6c0,0.2,0,0.5,0,0.7
                                                                          c0,17,9.4,35.1,24.8,43.2c14.1,7.4,28.2,14.9,42.3,22.3c33.9,17.9,67.7,35.8,101.6,53.7c41.1,21.7,82.3,43.4,123.4,65.2
                                                                          c35.4,18.7,70.9,37.4,106.3,56.1c17.2,9.1,34.4,18.4,51.7,27.3c0.2,0.1,0.5,0.3,0.7,0.4c11.8,6.2,25.5,8.6,38.5,5
                                                                          c11.6-3.2,24.2-12.2,29.9-23c6.1-11.6,9.2-25.7,5-38.5C556.3,936.5,548.8,924.8,537.2,918.7z">
                                    </path>
                                    <path
                                        d="M912.9,693.7c-14.1,7.4-28.2,14.9-42.3,22.3c-33.9,17.9-67.7,35.8-101.6,53.7
                                                                          c-41.1,21.7-82.3,43.4-123.4,65.2c-35.4,18.7-70.9,37.4-106.3,56.1c-17.2,9.1-34.6,17.9-51.7,27.3c-0.2,0.1-0.5,0.3-0.7,0.4
                                                                          c25.1,14.4,50.2,28.8,75.2,43.2c0-14.9,0-29.9,0-44.8c0-35.7,0-71.4,0-107.1c0-43.2,0-86.4,0-129.6c0-37.5,0-75,0-112.5
                                                                          c0-18.2,0.3-36.4,0-54.6c0-0.2,0-0.5,0-0.7c-8.3,14.4-16.5,28.8-24.8,43.2c14.1-7.5,28.2-14.9,42.3-22.4
                                                                          c33.9-17.9,67.7-35.8,101.6-53.7c41.1-21.7,82.3-43.5,123.4-65.2c35.4-18.7,70.9-37.5,106.3-56.2c17.2-9.1,34.6-18,51.7-27.3
                                                                          c0.2-0.1,0.5-0.3,0.7-0.4c-25.1-14.4-50.2-28.8-75.2-43.2c0,15,0,29.9,0,44.9c0,35.7,0,71.5,0,107.2c0,43.2,0,86.4,0,129.7
                                                                          c0,37.5,0,75,0,112.6c0,18.2-0.2,36.4,0,54.6c0,0.2,0,0.5,0,0.7c0,12.8,5.6,26.3,14.6,35.4c8.7,8.7,22.9,15.2,35.4,14.6
                                                                          c12.9-0.6,26.3-4.8,35.4-14.6c9-9.8,14.6-21.8,14.6-35.4c0-15,0-29.9,0-44.9c0-35.7,0-71.5,0-107.2c0-43.2,0-86.4,0-129.7
                                                                          c0-37.5,0-75,0-112.6c0-18.2,0.2-36.4,0-54.6c0-0.2,0-0.5,0-0.7c0-17.6-9.6-34.3-24.8-43.2c-15.9-9.3-34.5-8.5-50.5,0
                                                                          c-14.1,7.5-28.2,14.9-42.3,22.4c-33.9,17.9-67.7,35.8-101.6,53.7c-41.1,21.7-82.3,43.5-123.4,65.2
                                                                          c-35.4,18.7-70.9,37.5-106.3,56.2c-17.2,9.1-34.7,17.9-51.7,27.3c-0.2,0.1-0.5,0.3-0.7,0.4c-15.4,8.1-24.8,26.1-24.8,43.2
                                                                          c0,14.9,0,29.9,0,44.8c0,35.7,0,71.4,0,107.1c0,43.2,0,86.4,0,129.6c0,37.5,0,75,0,112.5c0,18.2-0.2,36.4,0,54.6
                                                                          c0,0.2,0,0.5,0,0.7c0,17.6,9.6,34.3,24.8,43.2c15.9,9.3,34.5,8.4,50.5,0c14.1-7.4,28.2-14.9,42.3-22.3
                                                                          c33.9-17.9,67.7-35.8,101.6-53.7c41.1-21.7,82.3-43.4,123.4-65.2c35.4-18.7,70.9-37.4,106.3-56.1c17.2-9.1,34.7-17.9,51.7-27.3
                                                                          c0.2-0.1,0.5-0.3,0.7-0.4c10.8-5.7,19.8-18.3,23-29.9c3.3-12,1.8-27.9-5-38.5C966.1,688.1,937.7,680.6,912.9,693.7z">
                                    </path>
                                    <path
                                        d="M912.9,244.1c-14.1,7.5-28.2,14.9-42.3,22.4c-33.9,17.9-67.7,35.8-101.6,53.7
                                                                          c-41.1,21.7-82.3,43.5-123.4,65.2c-35.4,18.7-70.9,37.5-106.3,56.2c-17.2,9.1-34.6,18-51.7,27.3c-0.2,0.1-0.5,0.3-0.7,0.4
                                                                          c16.8,0,33.6,0,50.5,0c-14.1-7.5-28.2-14.9-42.3-22.4c-33.9-17.9-67.7-35.8-101.6-53.7c-41.1-21.7-82.3-43.5-123.4-65.2
                                                                          c-35.4-18.7-70.9-37.5-106.3-56.2c-17.2-9.1-34.3-18.5-51.7-27.3c-0.2-0.1-0.5-0.3-0.7-0.4c0,28.8,0,57.6,0,86.3
                                                                          c14.1-7.4,28.2-14.9,42.3-22.3c33.9-17.9,67.7-35.8,101.6-53.7c41.1-21.7,82.3-43.5,123.4-65.2c35.4-18.7,70.9-37.4,106.3-56.2
                                                                          c17.2-9.1,34.6-18,51.7-27.3c0.2-0.1,0.5-0.3,0.7-0.4c-16.8,0-33.6,0-50.5,0c14.1,7.4,28.2,14.9,42.3,22.3
                                                                          c33.9,17.9,67.7,35.8,101.6,53.7c41.1,21.7,82.3,43.5,123.4,65.2c35.4,18.7,70.9,37.4,106.3,56.2c17.2,9.1,34.4,18.4,51.7,27.3
                                                                          c0.2,0.1,0.5,0.3,0.7,0.4c11.8,6.2,25.5,8.6,38.5,5c11.6-3.2,24.2-12.2,29.9-23c6.1-11.6,9.2-25.7,5-38.5
                                                                          c-3.9-12.1-11.4-23.8-23-29.9c-14.3-7.5-28.6-15.1-42.9-22.6c-34-17.9-67.9-35.9-101.9-53.8c-41.3-21.8-82.6-43.6-123.9-65.4
                                                                          c-35.3-18.7-70.6-37.3-105.9-56c-17-9-33.9-18.3-51-26.9c-10.4-5.3-20.7-7.8-32.4-6.2c-6.9,0.9-12.9,3-19.2,6.3
                                                                          c-1.9,1-3.7,2-5.6,2.9c-8.8,4.6-17.6,9.3-26.4,13.9c-32.1,17-64.3,34-96.4,50.9c-40.9,21.6-81.9,43.3-122.8,64.9
                                                                          c-37,19.5-73.9,39.1-110.9,58.6c-20.2,10.7-40.4,21.4-60.6,32c-0.9,0.5-1.9,1-2.8,1.5c-32.6,17.2-32.6,69.1,0,86.3
                                                                          c14.3,7.6,28.6,15.1,42.9,22.7c34,18,67.9,35.9,101.9,53.9c41.3,21.8,82.6,43.7,123.9,65.5c35.3,18.7,70.6,37.3,105.9,56
                                                                          c17,9,33.9,18.3,51,27c10.4,5.3,20.7,7.8,32.4,6.2c6.9-0.9,12.9-3,19.2-6.3c1.9-1,3.7-2,5.6-2.9c8.8-4.6,17.6-9.3,26.4-13.9
                                                                          c32.1-17,64.3-34,96.4-51c40.9-21.6,81.9-43.3,122.8-64.9c37-19.5,73.9-39.1,110.9-58.6c20.2-10.7,40.4-21.4,60.6-32.1
                                                                          c0.9-0.5,1.9-1,2.8-1.5c10.8-5.7,19.8-18.3,23-29.9c3.3-12,1.8-27.9-5-38.5C966.1,238.5,937.7,231,912.9,244.1z">
                                    </path>
                                    <path
                                        d="M324.2,443.2c14.1-7.5,28.2-14.9,42.3-22.4c33.9-17.9,67.7-35.8,101.6-53.7
                                                                          c41.1-21.7,82.3-43.5,123.4-65.2c35.4-18.7,70.9-37.5,106.3-56.2c17.2-9.1,34.7-17.9,51.7-27.3c0.2-0.1,0.5-0.3,0.7-0.4
                                                                          c10.8-5.7,19.8-18.3,23-29.9c3.3-12,1.8-27.9-5-38.5c-15.2-23.6-43.6-31-68.4-17.9c-14.1,7.5-28.2,14.9-42.3,22.4
                                                                          c-33.9,17.9-67.7,35.8-101.6,53.7c-41.1,21.7-82.3,43.5-123.4,65.2c-35.4,18.7-70.9,37.5-106.3,56.2
                                                                          c-17.2,9.1-34.7,17.9-51.7,27.3c-0.2,0.1-0.5,0.3-0.7,0.4c-10.8,5.7-19.8,18.3-23,29.9c-3.3,12-1.8,27.9,5,38.5
                                                                          C270.9,448.8,299.4,456.3,324.2,443.2L324.2,443.2z">
                                    </path>
                                </svg>
                                Orders
                            </div>
                        </a>
                    </div>
                    <div class="border-b-[1px] border-slate-500 grid justify-items-center items-center">
                        <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Category</h3>
                        <ul
                            class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="vue-checkbox" type="checkbox" value="acoustic"
                                        onchange="sortCheckBoxByCategory()"
                                        class="cat-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="vue-checkbox"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Acoustic</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="react-checkbox" type="checkbox" value="bass"
                                        onchange="sortCheckBoxByCategory()"
                                        class="cat-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="react-checkbox"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Bass</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="angular-checkbox" type="checkbox" value="electric-guitar"
                                        onchange="sortCheckBoxByCategory()"
                                        class="cat-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="angular-checkbox"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Electric
                                        guitar</label>
                                </div>
                            </li>
                        </ul>


                    </div>
                    <div class="border-b-[1px] border-slate-500 grid justify-center content-center">
                        <ul
                            class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="all-checkbox" type="radio" value="all"
                                        onclick="generateAllProducts()"
                                        name="sort"
                                        class="cat-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="all-checkbox"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">All Products</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="featured-checkbox" type="radio" value="featured"
                                        onclick="sortFeatured()"
                                        name="sort"
                                        class="cat-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="featured-checkbox"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Featured</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="sale-checkbox" type="radio" value="onsale"
                                        onclick="sortSale()"
                                        name="sort"

                                        class="cat-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="sale-checkbox"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">On
                                        sale</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
    @endif


    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                    <a href="{{ route('logout') }}">
                        <button data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Yes, I'm sure
                        </button>
                    </a>
                    <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    @yield('script')

</body>

</html>
