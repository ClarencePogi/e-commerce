@extends('home')

@section('content')
    <div class="bg-slate-100 w-full h-full grid grid-rows-10">
        <div class="row-span-2 grid justify-items-center items-center relative">
            <h1 class="text-3xl font-bold">User management</h1>
            <button data-modal-target="large-modal" data-modal-toggle="large-modal"
                class="absolute bottom-2 right-4 w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Add user
            </button>
        </div>
        <div class="row-span-8 bg-slate-200 flex justify-center items-center">

            <div class="w-[80%] h-[90%]">
                <table id="user_table"
                    class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 shadow-lg">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                User name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

<div id="large-modal" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    User
                </h3>
                <button type="button" onclick="closeModal()"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="large-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-2 md:p-5 space-y-4">
                <form class="grid w-full grid-cols-2 gap-2" id="user_form" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div>
                        <div class="mb-5">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fullname</label>
                            <input type="text" id="name" name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Clarence Golez" required />
                        </div>
                        <div class="mb-5">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" id="email" name="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@acaciasoft.com" required />
                        </div>
                        <div class="mb-5">
                            <label for="phonenumber"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                                Number</label>
                            <input type="tel" id="phonenumber" name="phonenumber"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="09 or +63" required />
                        </div>
                        <div class="mb-5">
                            <label for="address"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                            <input type="text" id="address" name="address"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="User address" required />
                        </div>
                    </div>
                    <div>
                        <label for="roles"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                        <select id="roles" name="role"
                            class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </select>
                        <label for="status"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <select id="status" name="status"
                            class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        <div class="mb-5" id="password-con">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" id="password" name="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5" id="confirm_password-con">
                            <label for="confirm_password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                password</label>
                            <input type="password" id="confirm_password" name="password_confirmation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                    </div>
            </div>
            <!-- Modal footer -->
            <div
                class="flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                <button id="updateBtn" type="button"
                class="text-white hidden bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                <button id="addBtn" data-modal-hide="large-modal" type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                </form>
                <button data-modal-hide="large-modal" type="button" onclick="closeModal()"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
            </div>
        </div>
    </div>
</div>



@section('script')
    <script>
        let isEdit = false;

        $(document).ready(function() {
            getUsers();
            getRoles();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $('#user_form').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "{{ route('user.store') }}",
                data: $('#user_form').serialize(),
                success: function(response) {
                    if (response.status) {
                        getUsers();
                        Swal.fire({
                            title: "Success!",
                            text: "Successfully created account!",
                            icon: "success"
                        });
                    }
                }
            });
        });

        $('#updateBtn').click(function (e) { 
            const formData = new FormData(user_form);

            $.ajax({
                type: "POST",
                url: "{{ route('user.update') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status) {
                        getUsers();
                        Swal.fire({
                            title: "Success!",
                            text: "Successfully updated account!",
                            icon: "success"
                        });
                    }
                }
            });
            
        });

        function getUsers() {
            $.ajax({
                type: "GET",
                url: "{{ route('role.get') }}",
                success: function(response) {
                    generateDataTable(response);
                    console.log(response);
                }
            });
        }

        function generateDataTable(data) {
            if ($.fn.DataTable.isDataTable('#user_table')) {
                $('#user_table').DataTable().destroy();
            }

            $('#user_table').DataTable({
                "pageLength": 4,
                "lengthMenu": [
                    [4, 8, 12, 16, -1],
                    [4, 8, 12, 16, "All"]
                ],
                data: data,
                columns: [{
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            const role = row.roles[0];

                            return `${!row.roles[0] ? '' : role.display_name}`;
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `${row.status == 'active' ? `<p class="text-green-600">Active</p>` : `<p class="text-red-600">Inactive</p>`}`
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                            return `<button class="primary-btn" onclick='showModal(${row.id})'>Edit</button>`;
                        }
                    }
                ]
            });
        }

        function getRoles() {
            $.ajax({
                type: "GET",
                url: "{{ route('privilege.roles') }}",
                success: function(response) {
                    const options = response.map(role =>
                        `<option value="${role.name}">${role.display_name}</option>`).join().replaceAll(',',
                        '');
                    $('#roles').append(options);
                }
            });
        }

        function triggerModal() {
            $('#large-modal').toggleClass('hidden');
            $('#large-modal').toggleClass('flex');
        }

        function showModal(id) {
            isEdit = true;

            $.ajax({
                type: "GET",
                url: "{{ route('user.find') }}",
                data: {
                    id: id
                },
                beforeSend: function() {
                    $('#updateBtn').show();
                    $('#addBtn').hide();
                    
                },
                success: function(response) {
                    const user = response;
                    // return console.log(response);
                    if(user.roles.length){
                        $('#roles').val(user.roles[0].name);
                    }

                    $('#id').val(user.id);
                    $('#name').val(user.name);
                    $('#email').val(user.email)
                    $('#phonenumber').val(user.phonenumber);
                    $('#address').val(user.address);
                    $('#status').val(user.status).change();

                    $('#password-con').hide();
                    $('#confirm_password-con').hide();
                },
                complete: function() {
                    triggerModal();
                }
            });
        }

        function closeModal() {
            triggerModal();
            $('#name').val('');
            $('#email').val('')
            $('#phonenumber').val('');
            $('#address').val('');
            $('#password').val('');
            $('#confirm_password').val('');

            $('#password-con').show();
            $('#confirm_password-con').show();

            $('#updateBtn').hide();
            $('#addBtn').show();
        }

        // user.find
    </script>
@endsection
