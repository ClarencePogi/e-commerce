@extends('home')

@section('content')
    <div class="container mx-auto p-4 w-full h-full grid">
        <div class="mb-4">
            <p class="text-gray-600">Order date: Feb 16, 2022</p>
        </div>

        <div class="space-y-4">
            <div class="flex items-center">
                <img src="macbook-pro.jpg" alt="MacBook Pro" class="w-16 h-16 object-cover mr-4">
                <div class="flex-grow">
                    <h2 class="text-lg font-semibold">MacBook Pro 14"</h2>
                    <p class="text-gray-600">Space Gray | 32GB | 1TB</p>
                </div>
                <div class="text-right">
                    <p class="font-bold">$2599.00</p>
                    <p class="text-gray-600">Qty: 1</p>
                </div>
            </div>

            <div class="flex items-center">
                <img src="ipad-pro.jpg" alt="iPad Pro" class="w-16 h-16 object-cover mr-4">
                <div class="flex-grow">
                    <h2 class="text-lg font-semibold">iPad Pro 12.9"</h2>
                    <p class="text-gray-600">Space Gray | 2TB | Cellular</p>
                </div>
                <div class="text-right">
                    <p class="font-bold">$2399.00</p>
                    <p class="text-gray-600">Qty: 1</p>
                </div>
            </div>

            <div class="flex items-center">
                <img src="airpods-max.jpg" alt="AirPods Max" class="w-16 h-16 object-cover mr-4">
                <div class="flex-grow">
                    <h2 class="text-lg font-semibold">AirPods Max</h2>
                    <p class="text-gray-600">Space Gray</p>
                </div>
                <div class="text-right">
                    <p class="font-bold">$549.00</p>
                    <p class="text-gray-600">Qty: 1</p>
                </div>
            </div>
        </div>

        <div class="flex justify-between items-center mt-4">
            <div>
                <h2 class="text-lg font-bold">Total:</h2>
                <p class="text-gray-600">$5547.00</p>
            </div>
            <div>
                <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded mr-2">Cancel Order</button>
                <button class="bg-blue-500 text-white px-4 py-2 rounded">Track Order</button>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script></script>
@endsection
