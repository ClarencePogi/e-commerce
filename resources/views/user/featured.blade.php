@extends('home')

@section('content')
    <div class="col-span-5 w-full row-span-5">
        <div
            class="w-full max-h-[100%] grid grid-cols-4 p-5 pt-20 gap-y-4 overflow-y-scroll justify-items-center relative card-con">
            <input type="text"
                class="absolute top-4 left-[40%] w-[20%] h-[40px] p-5 rounded-2xl border border-slate-500 shadow-lg search-input"
                placeholder="Search item....">

            <button id="multiLevelDropdownButton" data-dropdown-toggle="multi-dropdown"
                class="absolute top-4 left-5 w-[6%] h-[40px] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">Sort <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="multi-dropdown"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-24 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="multiLevelDropdownButton">
                    <li>
                        <a href="#"
                            class="flex justify-evenly px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            id="sortByPrice">
                            <span>Price</span>
                            <i class="fa-solid fa-angle-up"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex justify-evenly px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            id="sortByName">
                            <span>Name</span>
                            <i class="fa-solid fa-angle-up"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="text-center spinner hidden absolute top-[20%] left-[57%]">
                <div role="status">
                    <svg aria-hidden="true"
                        class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="currentColor" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentFill" />
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

        </div>
    </div>
@endsection


<div class="absolute hidden w-screen h-screen backdrop-invert bg-white/50 backdrop-opacity-10 z-10 product-cart">
    <form method="POST" id="cart_form">
        <div
            class="absolute bg-slate-50 w-[20%] h-[60%] z-20 rounded-2xl shadow-lg top-[30%] left-[40%] grid grid-cols-1 grid-rows-4">
            <div class="row-span-2 bg-contain bg-no-repeat bg-center" id="imageCon"
                style="background-image: url(https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/cfcf17cb-9e73-4294-9513-d8c6f9d73c72/JORDAN+TATUM+2+GPX+PF.png);">
            </div>
            <div class="row-span-1 text-left p-5">
                <h1 class="text-black text-2xl" id="product">Adidas</h1>
                <p id="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, libero.</p>
            </div>
            <div class="row-span-1 grid grid-cols-2 justify-items-center items-center">
                <button id="dropdownRadioButton" data-dropdown-toggle="dropdownDefaultRadio"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">Select color <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <input type="hidden" name="productID" id="hiddenID">
                <input type="hidden" name="userID" id="userID" value="{{ Auth::user()->id }}">
                <div id="dropdownDefaultRadio"
                    class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownRadioButton">

                    </ul>
                </div>
                <p class="text-2xl text-green-500" id="price">₱100</p>
                <button type="submit"
                    class="relative cart-sub-btn inline-flex justify-self-center col-span-2 items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                    <span
                        class="relative px-5 py-2.5 transition-all ease-in  duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Add to Cart
                    </span>
                </button>
            </div>

        </div>
    </form>
</div>

<div id="popup-modal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete
                    this product?</h3>
                <a href="{{ route('logout') }}">
                    <button data-modal-hide="popup-modal" type="button"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, I'm sure
                    </button>
                </a>
                <button data-modal-hide="popup-modal" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                    cancel</button>
            </div>
        </div>
    </div>
</div>





@section('script')
    <script>
        const cardContainer = $('.card-con');
        const productCart = document.querySelector('.product-cart');
        const colorSelectContainer = $('#dropdownDefaultRadio ul');

        let pesoFormatter = new Intl.NumberFormat('en-PH', {
            style: 'currency',
            currency: 'PHP',
        });

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            generateAllProducts();
        });
        $('#cart_form').on('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: "Are you sure?",
                text: "You want to buy this product?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('order.store') }}",
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(response) {
                            console.log(response.status);

                            generateAllProducts();

                        }
                    });
                    Swal.fire({
                        title: "Successfully!",
                        text: "Thank you for comimg!!! 😉",
                        icon: "success"
                    });
                }
            });
        });

        $('.search-input').on('keyup', function() {
            const value = $(this).val();
            $('div.card').hide();
            if (value == '') return $('div.card').show(500)

            setTimeout(() => {
                $('.spinner').hide();
                Object.values($(`div.card`)).map(card => {
                    if ($(card).attr('class').includes(value)) {
                        $(card).show(500);
                    }
                });
            }, 1500);

            $('.spinner').show();

        });

        $('#sortByPrice, #sortByName').on('click', function() {
            const sortBy = $(this).children('span').html();
            const iconClass = $(this).children('i').attr('class').split(' ')[1];

            switch (sortBy) {
                case 'Price':
                    sortByPrice(iconClass, $(this).children('i'));

                    break;

                case 'Name':
                    sortByName(iconClass, $(this).children('i'));
                    break;

                default:
                    break;
            }

        })

        function sortByPrice(arrow, icon) {
            if (arrow == 'fa-angle-up') {
                const sortedBoxesAsc = $('.card').toArray().sort(function(a, b) {
                    return $(a).attr('data-price') - $(b).attr('data-price'); // Ascending
                });

                $('div').remove('.card');

                cardContainer.append(sortedBoxesAsc);

                $(icon).removeClass('fa-angle-up');
                $(icon).addClass('fa-angle-down');
            } else {
                const sortedBoxesDesc = $('.card').toArray().sort(function(a, b) {
                    return $(b).attr('data-price') - $(a).attr('data-price'); // Descending
                });

                $('div').remove('.card');

                cardContainer.append(sortedBoxesDesc);

                $(icon).removeClass('fa-angle-down');
                $(icon).addClass('fa-angle-up');
            }
        }

        function sortByName(arrow, icon) {
            if (arrow == 'fa-angle-up') {
                const sortedBoxesAsc = $('.card').toArray().sort(function(a, b) {
                    return $(a).data('name') - $(b).data('name'); // Ascending
                });

                console.log(sortedBoxesAsc);

                $('div').remove('.card');

                cardContainer.append(sortedBoxesAsc);

                $(icon).removeClass('fa-angle-up');
                $(icon).addClass('fa-angle-down');
            } else {
                const sortedBoxesDesc = $('.card').toArray().sort(function(a, b) {
                    return $(b).data('name') - $(a).data('name'); // Descending
                });

                console.log(sortedBoxesDesc);
                $('div').remove('.card');

                cardContainer.append(sortedBoxesDesc);

                $(icon).removeClass('fa-angle-down');
                $(icon).addClass('fa-angle-up');
            }

            console.log(arrow);
        }

        $('.product-cart').on('click', function(e) {
            e.target != productCart ? null : closeItemCard();
        });

        function getFeatured() {
            $.ajax({
                url: '{{ route('products.featured') }}',
                success: function(response) {
                    generateProductCard(response);
                }
            })
        }

        function sortFeatured() {
            $('div').remove('.card');

            getFeatured();
        }

        function sortSale() {
            $('div').remove('.card');

            getSalesProducts();
        }

        function getSalesProducts() {
            $.ajax({
                url: '{{ route('onsale.all') }}',
                success: function(response) {
                    generateSalesCard(response);
                }
            })
        }

        function sortCheckBoxByCategory() {
            const listCat = Object.values(document.querySelectorAll('.cat-checkbox')).map(inp => {
                if (inp.checked) {
                    return inp.value;
                }
            }).filter(val => val != undefined);

            switch (listCat.length) {
                case 1:
                    $('div.card').hide(500);
                    $(`div.card.${listCat[0]}`).show(500);
                    break;

                case 2:
                    $('div.card').hide(500);
                    $(`div.card.${listCat[0]}, div.card.${listCat[1]}`).show(500);
                    break;

                case 3:
                    $('div.card').hide(500);
                    $(`div.card.${listCat[0]}, div.card.${listCat[1]}, div.card.${listCat[2]}`).show(500);
                    break;
                default:
                    $('.card').show(500);
                    break;
            }
        }

        function generateSalesCard(data) {
            data.map(obj => {
                let discountedDeduct = (obj.discount / 100) * obj.price;
                let discountedPrice = obj.price - discountedDeduct;

                const content = `
                            <div class="card ${obj.stocks < 1 ? 'outOfStock' : ''} ${obj.category.split(' ').join('-')} ${obj.productName.split(' ').join('-').toLowerCase()}"
                                    style="background-image: url('../storage/uploads/${obj.image}')"
                                    data-price='${discountedPrice}'
                                    data-name="${obj.productName}">
                                    ${obj.stocks < 1 ? `
                                    <div class="absolute !opacity-100 bg-slate-950 w-[110px] flex justify-center h-[40px] items-center rounded-lg left-[-5px] top-[-2%] rotate-[-15deg] text-white">
                                        Out of stock!</div>` : ''}
                                    

                                    <div class="h-[40%] self-end text-center text-slate-100 grid grid-cols-2 gap-1 grid-rows-4">
                                        <h1 class="text-2xl mt-2 col-span-2">${obj.productName}</h1>
                                        <p class="text-sm col-span-2">${obj.description}</p>
                                        <p class="text-2xl text-green-500 mt-3 custom-line-through">${pesoFormatter.format(obj.price)}</p>
                                        <p class="text-2xl text-green-500 mt-3">${pesoFormatter.format(discountedPrice)}</p>
                                        <button
                                            class="bg-slate-300 col-span-2 text-black font-bold rounded-xl m-1 hover:text-yellow-400 hover:bg-slate-950" 
                                            onclick="showItemCard(this)" data='${obj.productID}'>Buy now</button>
                                    </div>
                                    <div class="absolute right-0 top-0 h-16 w-16">
                                        <div
                                        class="absolute transform rotate-45 bg-red-600 text-center text-white rounded-[50%] font-semibold py-3 right-[0px] top-[32px] h-[50px] w-[100px]">
                                        ${obj.discount}% off
                                        </div>
                                    </div>
                            </div>`;

                cardContainer.append(content);
            });
        }

        function isSale(id) {
            $.ajax({
                url: '{{ route('check.sale') }}',
                type: 'GET',
                data: {
                    id: id
                },
                success: function(response) {
                    generateProductCard(response);

                }
            })
        }

        function generateAllProducts() {
            $('div').remove('.card');

            getSalesProducts();
            getFeatured();
        }

        function generateProductCard(data) {
            const content = data.map(product => {
                return `
                    <div class="card ${product.stocks < 1 ? 'outOfStock' : ''} ${product.category.split(' ').join('-')} ${product.productName.split(' ').join('-').toLowerCase()}"
                            style="background-image: url('../storage/uploads/${product.image}')"
                            data-price='${product.price}'
                            data-name="${product.productName}">

                            ${product.stocks < 1 ? `
                                    <div class="absolute !opacity-100 bg-slate-950 w-[110px] flex justify-center h-[40px] items-center rounded-lg left-[-5px] top-[-2%] rotate-[-15deg] text-white">
                                        Out of stock!</div>` : ''}

                            <div class="h-[40%] self-end text-center text-slate-100 grid gap-1 grid-rows-4">
                                <h1 class="text-2xl mt-2">${product.productName}</h1>
                                <p class="text-sm">${product.description}</p>
                                <p class="text-2xl text-green-500 mt-3">${pesoFormatter.format(product.price)}</p>
                                <button
                                    class="bg-slate-300 text-black font-bold rounded-xl m-1 hover:text-yellow-400 hover:bg-slate-950" 
                                    onclick="showItemCard(this)" data='${product.id}'>Buy now</button>
                            </div>
                    </div>`;
            }).join('|').replaceAll('|', '');

            cardContainer.append(content);
        }

        function showItemCard(btn) {
            const product = $(btn).attr('data');

            $.ajax({
                url: "{{ route('product.info') }}",
                type: 'GET',
                data: {
                    id: product
                },
                success: async function(obj) {
                    const price = await getDiscountedAmount(obj.id, obj.price);

                    $('#hiddenID').val(obj.id);
                    $('#imageCon').css('background-image', `url('../storage/uploads/${obj.image}')`);
                    $('#product').html(obj.productName);
                    $('#description').html(obj.description);
                    $('#price').html(pesoFormatter.format(price));

                    $('.product-cart').show();

                    getColors(obj.productName);
                }
            });
        }

        async function getDiscountedAmount(id, price) {
            const req = await fetch(`http://127.0.0.1:8000/get-discount/${id}`);
            const response = await req.json();

            if (response.status) return price;

            let discountedDeduct = (response / 100) * price;
            let discountedPrice = price - discountedDeduct;

            return discountedPrice;
        }

        function getColors(name) {
            $.ajax({
                url: '{{ route('product.color') }}',
                type: 'GET',
                data: {
                    name: name
                },
                success: function(response) {
                    const html = response.map((color, i) => {
                        console.log();
                        return `
                        <li>
                            <div class="flex items-center">
                                <input id="default-radio-${i + 1}" type="radio" value="${color}" data-name="${name}" onclick="changeProductByColor(this)" name="color" class="color-radio w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="default-radio-${i + 1}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">${color}</label>
                            </div>
                        </li>`;
                    }).join().replaceAll(',', '');

                    colorSelectContainer.html(html);

                }
            })
        }

        function changeProductByColor(input) {
            console.log(input.value);

            $.ajax({
                url: "{{ route('product.bycolor') }}",
                type: 'GET',
                data: {
                    color: input.value,
                    productName: input.dataset.name
                },
                success: async function(response) {
                    const discountedPrice = await getDiscountedAmount(response[0].id, response[0].price);

                    if(response[0].stocks < 1) {
                        $('.cart-sub-btn').addClass('outOfStock');
                    }else {
                        $('.cart-sub-btn').removeClass('outOfStock');
                    }

                    $('#imageCon').css('background-image', `url('../storage/uploads/${response[0].image}')`);
                    $('#product').html(response[0].productName);
                    $('#description').html(response[0].description);
                    $('#price').html(pesoFormatter.format(discountedPrice));
                    $('#hiddenID').val(response[0].id);
                }
            });

        }

        function closeItemCard() {

            $('#imageCon').css('background-image', `url('')`);
            $('#product').html('');
            $('#description').html('');
            $('#price').html('');

            $('.cart-sub-btn').removeClass('outOfStock');
            $('.product-cart').hide();
        }
    </script>
@endsection
