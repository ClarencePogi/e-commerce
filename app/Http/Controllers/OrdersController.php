<?php

namespace App\Http\Controllers;

use App\Orders;
use App\Products;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrdersController extends OnsaleController
{
    public function index() {
        return view('admin.orders');
    }

    public function userOrders() {
        return view('user.orders');
    }
    
    public function store(Request $request) {

        $product = $this->getProduct($request->productID);
        $discount = $this->getDiscount($request->productID);

        $deduct = ($discount / 100) * $product->price;
        $discountedPrice = $product->price - $deduct;

        $this->decrementStock($request->productID);

        $test = Orders::create([
            'userID' => $request->userID,
            'productID' => $request->productID,
            'price' => $discountedPrice
        ]);

        dd($test);
        
        return response()->json(['status' => $discountedPrice]);
    }

    public function get(Request $request) {
        $data = DB::table('users')
        ->join('orders', 'users.id', '=', 'orders.userID')
        ->join('products', 'products.id', '=', 'orders.productID')
        ->select('products.productName', 'users.name', 'users.email', 'orders.created_at', 'orders.price')
        ->get();

        return response()->json($data);
    }

    public function decrementStock($id) {
        $stocks = Products::where('id', $id)->pluck('stocks')->first();
        $stocks -= 1;

        Products::where('id', $id)->update([
            'stocks' => $stocks
        ]);
    }

    function getProduct($productID) {
        $product = DB::table('products')
            ->join('onsales', 'products.id', '=', 'onsales.productID')
            ->select('products.*', 'onsales.*')
            ->where('products.id', $productID)
            ->first();
        
        return $product;
    }

    public function getMostSale() {
        $acoustic = DB::table('products')
          ->join('orders', 'products.id', '=', 'orders.productID')
          ->where('products.category', 'acoustic')
          ->select('products.category as category')->count();

        $electric = DB::table('products')
          ->join('orders', 'products.id', '=', 'orders.productID')
          ->where('products.category', 'electric guitar')
          ->select('products.category as category')->count();

        $bass = DB::table('products')
          ->join('orders', 'products.id', '=', 'orders.productID')
          ->where('products.category', 'bass')
          ->select('products.category as category')->count();

        $sumSales = $acoustic + $electric + $bass;

        $acousticPercentage = ($acoustic / $sumSales) * 100;
        $electricPercentage = ($electric / $sumSales) * 100;
        $basscPercentage = ($bass / $sumSales) * 100;

        return response()->json(['acoustic' => round($acousticPercentage), 'electric' => round($electricPercentage), 'bass' => round($basscPercentage)]);
      }
   
}
