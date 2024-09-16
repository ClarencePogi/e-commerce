<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeaturedController extends Controller
{
    public function index() {
        if (!Auth::user()->hasRole('user')) {
            abort(403, 'Unauthorized action.');
        }

        return view('user.featured');
    }
}
