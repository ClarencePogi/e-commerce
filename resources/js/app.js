require('./bootstrap');
import $ from 'jquery';
window.$ = window.jQuery = require('jquery');
import Echo from 'laravel-echo';
import Pusher from "pusher-js";

window.$ = window.jQuery = require('jquery');

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',  // Make sure this is set correctly
    key: '1867338',
    cluster: 'mt1',
    forceTLS: true,
    encrypted: true,
});