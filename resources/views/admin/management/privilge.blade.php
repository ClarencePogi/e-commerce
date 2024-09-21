@extends('home')

@section('content')
    <div class="bg-slate-100 w-full h-full grid grid-rows-10">
        <div class="row-span-2 grid justify-items-center items-center relative">
            <h1 class="text-3xl font-bold">Privilage management</h1>
            <button class="primary-btn absolute bottom-2 right-4" data-modal-target="large-modal"
                data-modal-toggle="large-modal">
                Add privilege
            </button>
        </div>
        <div class="row-span-8 bg-slate-200 flex justify-center items-center">

            <div class="w-[80%] h-[90%]">
                <table id="user_table"
                    class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 shadow-lg">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Display Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Permissions
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
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
            <div
                class="grid items-center grid-cols-6 justify-items-center p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium col-span-2 text-gray-900 dark:text-white">
                    Role
                </h3>
                <h3 class="text-xl font-medium col-span-4 text-gray-900 dark:text-white">Permissions</h3>
                <button type="button" onclick="closeModal()"
                    class="text-gray-400 bg-transparent absolute top-2 right-2 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
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
            <div class="p-4 md:p-5 space-y-4">
                <form class="w-full grid grid-cols-6 gap-4" id="privilege_form" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="col-span-2">
                        <div class="mb-5">
                            <label for="role_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" id="role_name" name="name"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Role name" required />
                        </div>
                        <div class="mb-5">
                            <label for="role_display_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Display
                                name</label>
                            <input type="text" id="role_display_name" name="display_name"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Display name" required />
                        </div>
                        <label for="message"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="description" rows="4" name="description"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Something descriptive..."></textarea>
                    </div>
                    <div class="col-span-4">
                        <div
                            class="w-full h-full grid grid-cols-1 items-center checkbox-contianer justify-items-center">

                        </div>
                    </div>
            </div>
            <!-- Modal footer -->
            <div
                class="flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="large-modal" type="submit"
                    class="text-white bg-blue-700 addBtn hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                <button data-modal-hide="large-modal" type="button"
                    class="text-white bg-blue-700 updateBtn hidden hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                <button data-modal-hide="large-modal" type="button" onclick="closeModal()"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>


@section('script')
    <script>
        $(document).ready(function() {
            getPrivilege();
            generateCheckbox();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $('#privilege_form').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "{{ route('privilege.store') }}",
                data: $('#privilege_form').serialize(),
                success: function(response) {
                    if (response.status) {
                        Swal.fire({
                            title: "Success!",
                            text: "You successfully add privilege!",
                            icon: "success"
                        });
                        getPrivilege();
                    }
                }
            });
        });

        $('.updateBtn').click(function() {

            $.ajax({
                type: "POST",
                url: "{{ route('privilege.update') }}",
                data: $('#privilege_form').serialize(),
                success: function(response) {
                    if (response.status) {
                        getPrivilege();
                        Swal.fire({
                            title: "Success!",
                            text: "You successfully update privilege!",
                            icon: "success"
                        });
                    }
                }
            });
        });

        function getPrivilege() {
            $.ajax({
                type: "GET",
                url: "{{ route('privilege.get') }}",
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
                "pageLength": 8,
                "lengthMenu": [
                    [8, 16, 24, 32, -1],
                    [8, 16, 24, 32, "All"]
                ],
                data: data,
                columns: [{
                        data: 'name'
                    },
                    {
                        data: 'display_name'
                    },
                    {
                        data: 'description'
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                            const permissionList = row.permissions.map(permission => `${permission.name}`)
                                .join(" | ");
                            return `${permissionList}`;
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `<button class="primary-btn" onclick="openModal(${row.id})">Edit</button>`;
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `<button class="danger-btn" onclick="deleteRole(${row.id})">Delete</button>`;
                        }
                    }
                ]
            });
        }

        function openModal(id) {
            $('#large-modal').toggleClass('hidden');
            $('#large-modal').toggleClass('flex');
            $('.updateBtn').toggleClass('hidden');
            $('.addBtn').toggleClass('hidden');

            $.ajax({
                type: "GET",
                url: "{{ route('privilege.find') }}",
                data: {
                    id: id
                },
                success: function(response) {
                    const permissions = response.permissions;
                    permissionCheckbox(permissions);

                    $('#id').val(response.id);
                    $('#role_name').val(response.name);
                    $('#role_display_name').val(response.display_name);
                    $('#description').val(response.description);

                }
            });
        }

        function deleteRole(id) {
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
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('privilege.delete') }}",
                        data: {
                            id: id
                        },
                        success: function(response) {
                            if (response.status) {
                                getPrivilege();
                            }
                        }
                    });
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your role has been deleted.",
                        icon: "success"
                    });
                }
            });

        }

        function closeModal() {
            $('#large-modal').toggleClass('hidden');
            $('#large-modal').toggleClass('flex');
            $('.updateBtn').toggleClass('hidden');
            $('.addBtn').toggleClass('hidden');

            $('#role_name').val(null);
            $('#role_display_name').val(null);
            $('#description').val(null);

            $('input:checkbox').prop('checked', false);
        }


        function permissionCheckbox(permissions) {
            $('input:checkbox').prop('checked', false);

            permissions.forEach(permission => {
                $(`input[value=${permission.name}]`).prop('checked', true);
            });
        }

        function generateCheckbox() {
            $.ajax({
                type: "GET",
                url: "{{ route('permissions.get') }}",
                success: function(response) {
                    let counter = 0;
                    const checkboxes = response.map(function(permission, i) {
                        return `<li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="grid justify-items-center h-full grid-rows-2 items-center">
                            <input id="${permission.name}" type="checkbox" value="${permission.name}"
                                name="permissions[]"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="${permission.name}"
                                class="text-sm justify-self-center font-medium text-gray-900 dark:text-gray-300">${permission.display_name}</label>
                        </div>
                    </li>`
                    }).join().replaceAll(',', '');

                    $('.checkbox-contianer').html(`<ul class="unlisted">${checkboxes}</ul>`);
                }
            });
        }
    </script>
@endsection
