<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\onsale;
use Illuminate\Support\Facades\DB;

class OnsaleController extends Controller
{

  public function index()
  {
    return view('user.sales');
  }

  public function store(Request $request)
  {
    $request->validate([
      "discount" => ['required', 'integer', 'between:10,50'],
      "start" => ['required', 'date', 'after:today'],
      "end" => ['required', 'date', 'after:today']
    ]);

    $listProduct = [];

    foreach (explode(',', $request->listID) as $id) {
      array_push($listProduct, [
        'productID' => $id,
        'discount' => $request->discount,
        'date_start' => $request->start,
        'date_end' => $request->end
      ]);
    }

    foreach ($listProduct as $item) {
      onsale::create($item);
    }
    
    return response()->json(['status' => true]);
  }

  public function checkSale(Request $request)
  {
    $product = DB::table('products')
      ->join('onsales', 'products.id', '=', 'onsales.productID')
      ->select('products.*', 'onsales.*')
      ->where('products.id', $request->id)
      ->first();

    if ($product) {
      return response()->json($product);
    } else {
      return null;
    }
  }

  // public function ifSale(Request $request) {

  // }

  public function getAll(Request $request)
  {
    $product = DB::table('products')
      ->join('onsales', 'products.id', '=', 'onsales.productID')
      ->select('products.*', 'onsales.*')
      ->get();

    if ($product) {
      return response()->json($product);
    } else {
      return null;
    }
  }

  public function getDiscount($id)
  {
    $discount = DB::table('products')
      ->join('onsales', 'products.id', '=', 'onsales.productID')
      ->select('products.*', 'onsales.*')
      ->where('products.id', $id)
      ->pluck('discount')->first();

    if ($discount) {
      return $discount;
    }

    return response()->json(['status' => true]);
  }


}
