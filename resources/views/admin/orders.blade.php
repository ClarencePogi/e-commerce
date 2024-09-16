@extends('home')

@section('content')
    <div class="bg-slate-100 w-full h-full grid grid-rows-12">
        <div class="bg-slate-900 row-span-1">
            <button class="bg-transparent text-2xl m-5 md:hidden block"><i
                    class="fa-solid fa-bars text-slate-50"></i></button>
            <button class="absolute top-8 right-5"><i class="fa-solid fa-bell fa-xl text-slate-50"></i></button>
        </div>

        <div class="bg-slate-300 row-span-2 grid grid-cols-2">
            <div class="grid grid-rows-2">
                <div>
                    <ul class="flex gap-1 h-full items-center pl-5">
                        <li>Home</li>
                        <li><i class="fa-solid fa-caret-right"></i></li>
                        <li>Products</li>
                    </ul>
                </div>
                <div class="grid justify-start pl-5 pb-2 items-center">
                    <h1 class="text-2xl mb-2">Total of orders: 6</h1>
                    <input type="date" class="bg-transparent" name="" id="">
                </div>
            </div>
            <div class="flex justify-end gap-4 items-end pb-5 pr-5">

            </div>

        </div>
        <div class="bg-slate-100 row-span-9 p-10 relative flex flex-col">
            <button class="trash-btn danger-btn absolute top-2 left-10 hidden">Delete selected</button>
            <div class="overflow-x-auto w-[100%] self-center mt-5">
                <table id="orders_table"
                    class="min-w-full border-collapse text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th>Product</th>
                            <th>Customer</th>
                            <th>Purchased date</th>
                            <th>Status</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let pesoFormatter = new Intl.NumberFormat('en-PH', {
            style: 'currency',
            currency: 'PHP',
        });

        $(document).ready(function() {
            getOrders();
        });

        function getOrders() {
            $.ajax({
                url: '{{ route('orders.get') }}',
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    if ($.fn.DataTable.isDataTable('#orders_table')) {
                        $('#orders_table').DataTable().destroy();
                    }

                    $('#orders_table').DataTable({
                        "pageLength": 4,
                        "lengthMenu": [
                            [5, 10, 15, 20, -1],
                            [5, 10, 15, 20, "All"]
                        ],
                        data: response,
                        columns: [{
                                data: 'productName'
                            },
                            {
                                data: null,
                                render: (data, type, row) => {
                                    return `<p class="text-md font-semibold">${row.email}</p><br><p>${row.name}</p>`;
                                }
                            },
                            {
                                data: null,
                                render: (data, type, row) => {
                                    const d = new Date(row.created_at);
                                    const date = d.toLocaleDateString('en-US', {
                                        year: 'numeric',
                                        month: 'long',
                                        day: 'numeric'
                                    });

                                    return `${date}`;
                                }
                            },
                            {
                                data: null,
                                render: (data, type, row) => {
                                    return `<p class="text-blue-600">Delivered</p>`;
                                }
                            },
                            {
                                data: null,
                                render: (data, type, row) => {
                                    return `<p class="text-green-600">${pesoFormatter.format(row.price)}</p>`;
                                }
                            }
                        ]
                    });
                }
            });
        }
    </script>
@endsection
