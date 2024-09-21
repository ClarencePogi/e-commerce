@extends('home')

@section('content')
    <div class="w-full h-full grid bg-slate-300 items-center">
        <div class="max-w-md mx-auto p-4">
            <!-- Chat Container -->
            <div class="bg-white rounded-lg shadow-md p-4 w-80">
                <!-- Chat Header -->
                <div class="flex items-center mb-4">
                    <div class="ml-3">
                        <p class="text-xl font-medium">Customer</p>
                        <p class="text-gray-500">Online</p>
                    </div>
                </div>

                <!-- Chat Messages -->
                <div class="space-y-4 h-52 overflow-y-auto" id="chatCon">
                   
                </div>

                <!-- Chat Input -->
                <div class="mt-4 flex items-center">
                    <input type="text" class="message" placeholder="Type your message..."
                        class="flex-1 py-2 px-3 rounded-full bg-gray-100 focus:outline-none" />
                    <button
                        class="bg-blue-500 sendBtn text-white px-4 py-2 rounded-full ml-3 hover:bg-blue-600">Send</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.socket.io/4.6.1/socket.io.min.js"></script>
    <script>
        var socket = io('http://localhost:3000'); // Connect to Socket.IO server on port 3000
        const chatbox = document.getElementById('chatCon');
        // Handle socket connection
        socket.on('connect', function() {
            console.log('Connected to Socket.IO server');
        });

        socket.emit('room1', {
            userName: 'id',
            role: 'Chat Support'
        });

        socket.on('message', (message) => {
            console.log(message); // Display messages in the browser console
            chatbox.innerHTML +=  `
            <div class="flex items-start">
                <div class="ml-3 bg-gray-100 p-3 rounded-lg">
                    <p class="text-sm text-gray-800">${message}</p>
                </div>
            </div>`;
        });

        $('.sendBtn').on('click', sendChat);

        function sendChat() { 
            const message = $('.message').val();
            chatbox.innerHTML += `
                    <div class="flex items-end justify-end">
                        <div class="bg-blue-500 p-3 rounded-lg">
                            <p class="text-sm text-white">${message}</p>
                        </div>
                        <img src="https://pbs.twimg.com/profile_images/1707101905111990272/Z66vixO-_normal.jpg"
                            alt="Other User Avatar" class="w-8 h-8 rounded-full ml-3" />
                    </div>`

            chatbox.scrollTop = chatbox.scrollHeight;
            $('.message').val(null);

           
            socket.emit('chatMessage', { message, userName: 'id', role: 'Chat support' });
         }
    </script>
@endsection
