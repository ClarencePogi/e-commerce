@extends('home')

@section('content')
    <div class="bg-slate-100 w-full h-full grid grid-rows-12">
        <div class="bg-slate-900 row-span-1">
            <button class="bg-transparent text-2xl m-5 md:hidden block"><i
                    class="fa-solid fa-bars text-slate-50"></i></button>
        </div>

        <div class="bg-slate-300 row-span-2 grid grid-cols-2">
            <div class="grid">
                <div class="grid justify-start pl-5 pb-2 items-center">
                    <h1 class="text-2xl">Total of products: <span id="sortResult"></span></h1>
                    <div class="flex items-center   ">
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input name="sortStart" type="date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date start">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-end gap-4 items-end pb-5 pr-5">
                <button class="primary-btn" onclick="openModal()">Add product</button>
                <button class="primary-btn" data-modal-target="default-modal" data-modal-toggle="default-modal">Add to
                    sale</button>
            </div>

        </div>
        <div class="bg-slate-100 row-span-9 p-10 relative grid">

            <div class="overflow-x-hidden max-w-[100%] self-center mt-2">
                <table id="product_table"
                    class="min-w-full border-collapse text-sm text-left rtl:text-right text-slate-950 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-400">
                        <tr class="!bg-gray-900 text-stone-50">
                            <th><input type="checkbox" onclick="toggleCheckbox(this)"></th>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Color</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>

                    <tfoot>
                        <tr class="font-semibold text-gray-900 dark:text-white">
                            <th scope="row" class="px-6 py-3 text-base"><button
                                    class="trash-btn danger-btn hidden">Delete selected</button></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection


<div class="product-modal opacity-0 z-[-1]">
    <div class="bg-slate-200 row-span-1 grid">
        <h1 class="text-2xl self-center justify-self-center font-bold modal-label">Add product</h1>
        <button class="absolute top-5 right-3 hover:text-red-600" onclick="closeModal()"><i
                class="fa-solid fa-xmark fa-lg"></i></button>
    </div>
    <div class="row-span-6 grid grid-cols-1 grid-rows-1">
        <form method="POST" class="grid grid-cols-1 grid-rows-3 justify-items-center items-center product-form"
            enctype="multipart/form-data" id="formProduct">
            @csrf
            <input type="hidden" id="hiddenID" name="hiddenID">
            <input type="file" name="image" id="image" onchange="changeImage(this)" class="hidden">
            <div class="col-span-1 row-span-1 w-full h-full flex flex-col p-3">
                <div
                    class="bg-slate-200 w-20 max-w-[90%] h-[90%] self-center rounded-[50%] border border-slate-700 img-con bg-contain bg-center bg-no-repeat">
                </div>
                <button class="dark-btn self-center m-3" type="button" onclick="image.click()">Choose image</button>
            </div>

            <div class="row-span-2 w-full h-full grid grid-cols-2 grid-rows-2 inputs justify-items-center gap-3 p-2">
                <div class="grid justify-items-center items-center h-full w-full">
                    <label for="productName"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product</label>
                    <input type="text" name="productName" id="productName"
                        class="mr-5 ml-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter product name">
                </div>
                <div class="grid justify-items-center items-center h-full w-full">
                    <label for="productName"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <input type="text" name="description" id="description"
                        class="mr-5 ml-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter product description">
                </div>
                <div class="grid justify-items-center items-center h-full w-full">
                    <label for="productName"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                    <input type="text" name="stocks" id="stocks"
                        class="mr-5 ml-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter product stocks">
                </div>
                <div class="grid justify-items-center items-center h-full w-full">
                    <label for="productName"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                    <input type="text" name="price" id="price"
                        class="mr-5 ml-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter product price">
                </div>
                <div class="grid justify-items-center items-center h-full w-full">
                    <label for="category"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select name="category" id="category"
                        class="mr-5 ml-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="acoustic">Acoustic</option>
                        <option value="bass">Bass</option>
                        <option value="electric guitar">Electric guitar</option>
                    </select>
                </div>
                <div class="grid justify-items-center items-center h-full w-full">
                    <label for="color"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Color</label>
                    <input type="text" name="color" id="color"
                        class="mr-5 ml-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter product color">
                </div>
            </div>
    </div>
    <div class="bg-slate-200 row-span-1 flex justify-center">
        <button class="primary-btn self-center add-btn">Submit</button>
        <button type="button" class="primary-btn self-center hidden update-btn">Update</button>

        </form>
    </div>
</div>

<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Add Product Discount
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form class="max-w-sm mx-auto" method="POST" id="add_discount_form">
                    <label for="discount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                        discount</label>
                    <select id="discount" name="discount"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="10">10%</option>
                        <option value="20">20%</option>
                        <option value="30">30%</option>
                        <option value="40">40%</option>
                        <option value="50">50%</option>
                    </select>
                    <div class="flex items-center mt-5">
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input name="start" type="date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date start">
                        </div>
                        <span class="mx-4 text-gray-500">to</span>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input name="end" type="date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date end">
                        </div>
                    </div>

            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="default-modal" type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                <button data-modal-hide="default-modal" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>



@section('script')
    <script>
        let isAddToSale = false;
        const pesoFormatter = new Intl.NumberFormat('en-PH', {
            style: 'currency',
            currency: 'PHP',
        });


        $(document).ready(function() {
            getProducts();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $('.trash-btn').on('click', function() {
            const ids = Object.values($('input[name="products"]:checked')).map(inp => inp.value).filter(
                val => val != undefined);


            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteProduct(ids);
                    Swal.fire({
                        title: "Deleted!",
                        text: "Product has been deleted.",
                        icon: "success"
                    });
                }
            });
        });

        $('.update-btn').on('click', function() {

            $.ajax({
                url: "{{ route('products.update') }}",
                type: 'POST',
                data: new FormData(formProduct),
                contentType: false,
                processData: false,
                success: function(response) {
                    Swal.fire({
                        title: "Success!",
                        text: "You successfully add product!",
                        icon: "success"
                    });

                    clearForm();
                    getProducts();
                },
                error: function(response) {
                    renderError(response);
                }
            })
        });

        $('input[name=sortStart]').on('change', function() {
            const date = $('input[name=sortStart]').val();

            $.ajax({
                type: "GET",
                url: "{{ route('products.sortDate') }}",
                data: {
                    date: date
                },
                success: function(response) {
                    generateDataTableProduct(response);

                    $('#sortResult').html(response.length);
                }
            });

        })

        $('#add_discount_form').on('submit', function(e) {
            e.preventDefault();

            if (!isAddToSale) {
                Swal.fire({
                    title: "Error",
                    text: "You need to select product first!",
                    icon: "error"
                });
                return;
            }

            const ids = Object.values($('input[name="products"]:checked')).map(inp => inp.value).filter(
                val => val != undefined);

            $.ajax({
                url: "{{ route('onsale.store') }}",
                type: 'POST',
                data: $('#add_discount_form').serialize() + "&" + `listID=${ids}`,
                success: function(response) {
                    if (response.status) {
                        Swal.fire({
                            title: "Success",
                            text: "Successfully added sale!",
                            icon: "success"
                        });
                    }
                },
                error: function(response) {
                    renderError(response);
                }
            });

        });

        function closeModal() {
            clearForm();
            $('.product-modal').css('opacity', '0');
            $('.product-modal').css('z-index', '-1');
        }

        function openModal() {
            $('.product-modal').css('opacity', '1');
            $('.product-modal').css('z-index', '10');

        }

        function deleteProduct(list) {
            $.ajax({
                url: "{{ route('products.delete') }}",
                type: 'DELETE',
                data: {
                    list: list
                },
                success: function(response) {
                    response.status ? getProducts() : null;
                },
                error: function(response) {
                    console.log(response);
                }
            })
        }

        function seletedDeleted(input) {
            if ($('input:checked').is(':checked')) {
                $('.trash-btn').show(500)
                isAddToSale = true;
            } else {
                $('.trash-btn').hide(500);
                isAddToSale = false;
            }
        }

        function toggleCheckbox(input) {
            $('input:checkbox').not(input).prop('checked', input.checked);
            if (input.checked) {
                $('.trash-btn').show(500)
                isAddToSale = true;
            } else {
                $('.trash-btn').hide(500)
                isAddToSale = false;
            }
        }

        function changeImage(input) {
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();

                console.log(file);
                reader.onload = function(e) {
                    $('.img-con').css('background-image', `url(${e.target.result})`);
                }

                reader.readAsDataURL(file);
            } else {
                alert('Please select an image file.');
            }
        }

        $('.product-form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('products.store') }}",
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(response) {
                    Swal.fire({
                        title: "Success!",
                        text: "You successfully add product!",
                        icon: "success"
                    });

                    clearForm();
                    getProducts();
                },
                error: function(response) {
                    renderError(response);
                }
            })
        });

        function renderError(response) {
            try {
                const errors = response.responseJSON.errors;
                const list = Object.values(errors).map(val => `<li>${val}</li>`).join()
                    .replaceAll(',', '');
                Swal.fire({
                    title: "<strong>Invalid input</strong>",
                    icon: "error",
                    html: `
                            <ul>${list}</ul>
                        `,
                });
            } catch (error) {
                Swal.fire({
                    title: "<strong>HTML <u>Invalid input</u></strong>",
                    icon: "error",
                    html: `
                            <p>File must by png, jpg or jpeg type.</p>
                        `,
                });
            }
        }

        function getProducts() {
            $.ajax({
                url: '{{ route('products.data') }}',
                success: function(response) {
                    generateDataTableProduct(response);
                }
            })
        }

        function generateDataTableProduct(data) {
            if ($.fn.DataTable.isDataTable('#product_table')) {
                $('#product_table').DataTable().destroy();
            }

            $('#product_table').DataTable({
                "pageLength": 4,
                "lengthMenu": [
                    [4, 8, 12, 16, -1],
                    [4, 8, 12, 16, "All"]
                ],
                data: data,
                columns: [{
                        data: null,
                        orderable: false,
                        render: function(data, type, row) {
                            return `<input type="checkbox" value="${row.id}" name="products" onchange="seletedDeleted(this)" class="products">`
                        }
                    },
                    {
                        data: null,
                        orderable: false,
                        render: function(data, type, row) {
                            return `<div class="h-24 w-24 block ml-auto mr-auto bg-transparent"><img class="w-full h-full rounded-[50%]" src="storage/uploads/${row.image}" ></div>`
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `<p class="font-bold">${row.productName}</p>`
                        }
                    },
                    {
                        data: 'category'
                    },
                    {
                        data: 'color'
                    },
                    {
                        data: 'description'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `<p class="text-green-600">${pesoFormatter.format(row.price)}</p>`;
                        }
                    },
                    {
                        data: 'stocks'
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                            return `${row.stocks > 1 ? '<p class="text-blue-600">Available</p>' : '<p class="text-red-600">Not available</p>'}`
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                            return `<button class="primary-btn" onclick='showUpdateModal(${row.id})''>Edit</button>`
                        }
                    }
                ]
            });
        }

        function showUpdateModal(id) {
            $.ajax({
                url: '{{ route('product.info') }}',
                type: 'GET',
                data: {
                    id: id
                },
                beforeSend: function() {
                    $('.modal-label').html('Update product');
                    $('.update-btn').show();
                    $('.add-btn').hide();

                },
                success: function(response) {
                    console.log(response.image);
                    $('#hiddenID').val(response.id);
                    $('#productName').val(response.productName);
                    $('#category').val(response.category.toLowerCase());
                    $('#description').val(response.description);
                    $('#stocks').val(response.stocks);
                    $('#color').val(response.color);
                    $('#price').val(response.price);
                    $('.img-con').css('background-image', `url('storage/uploads/${response.image}')`);

                    const file = new File(['dummy content'], `storage/uploads/${response.image}`, {
                        type: "image/" + response.image.split('.')[1]
                    });

                    // Create a DataTransfer object to use with the file input
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file);

                    const fileInput = document.getElementById('image');
                    fileInput.files = dataTransfer.files;
                },
                complete: function() {
                    openModal();

                }
            });
        }

        function clearForm() {
            $('.modal-label').html('Add product');

            $('#productName').val('');
            $('#description').val('');
            $('#stocks').val('');
            $('#price').val('');
            $('#hiddenID').val('');
            $('.img-con').css('background-image', `url('')`);

            $('.update-btn').hide();
            $('.add-btn').show();



            $('.product-modal').css('opacity', '0');
        }
    </script>
@endsection
