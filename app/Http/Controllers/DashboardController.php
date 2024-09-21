<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Orders;


class DashboardController extends Controller
{
    public function __construct() {
        // $this->middleware()
    }

    public function index() {
        return view('admin.dashboard');
    }

    public function countCategories(Request $request) {
        $acoustic = Products::where('category', 'acoustic')->count();
        $bass = Products::where('category', 'bass')->count();
        $electric = Products::where('category', 'electric guitar')->count();

        $categoryList = ['acoustic' => $acoustic, 'bass' => $bass, 'electric' => $electric];

        arsort($categoryList);

       return response()->json($categoryList);
    }

    public function getCountProducts() {
        return Products::count();
    }

    public function getCountPuechased() {
        return Orders::count();
    }

    public function getTotalSale() {
        return Orders::sum('price');
    }

}
