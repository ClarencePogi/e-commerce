<?php

namespace App\Http\Controllers;

use App\Products;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Storage;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
    }

    public function __invoke(Request $request)
    {
        //
    }

    public function index()
    {
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Unauthorized action.');
        }

        return view("admin.products");
    }

    public function store(Request $request)
    {
        $file = $_FILES['image'];

        $convertListName = explode('.', $file['name']);
        if ($convertListName[1] == 'png' || $convertListName[1] == 'jpg' || $convertListName[1] == 'jpeg') {

            $this->productValidator($request); 

            $filename = time() . '_' . $file['name'];
            $tmpName = $file['tmp_name'];

            $destinationPath = storage_path('app/public/uploads/' . $filename);

            move_uploaded_file($tmpName, $destinationPath);

            Products::create([
                'productName' => $request->input('productName'),
                'description' => $request->input('description'),
                'category' => $request->input('category'),
                'stocks' => $request->input('stocks'),
                'price' => $request->input('price'),
                'color' => $request->input('color'),
                'image' => $filename
            ]);

        } else {
            throw new ValidationException("File must by png, jpg or jpeg type.", 1);
        }

        return response()->json(['status' => true]);
    }

    public function get(Request $request)
    {
        return response()->json(Products::all());
    }

    public function getFeatured(Request $request)
    {
        $sales = DB::table('onsales')->select()->pluck('productID');
        $featured = DB::table('products')->whereNotIn('id', $sales)->get();

        return response()->json($featured);
    }

    public function delete(Request $request)
    {
        $filenames = Products::whereIn('id', $request->list)->pluck('image');

        $disk = 'public'; // Specify the disk if it's not the default

        foreach ($filenames as $file) {
            if (Storage::disk($disk)->exists('uploads/' . $file)) {
                Storage::disk($disk)->delete('uploads/' . $file);
            }
        }

        Products::whereIn('id', $request->list)->delete();

        return response()->json(['status' => true]);
    }

    public function update(Request $request)
    {
        $filename = Products::where('id', $request->hiddenID)->pluck('image')[0];
        $file = $_FILES['image'];

        $disk = 'public'; // Specify the disk if it's not the default
        $extension = explode('.',  $file['name'])[1];

        if($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {

            if ($filename != $file['name']) {

                if (Storage::disk($disk)->exists('uploads/' . $filename)) {
                    Storage::disk($disk)->delete('uploads/' . $filename);
    
                    $filename = time() . '_' . $file['name'];
                    $tmpName = $file['tmp_name'];
    
                    $destinationPath = storage_path('app/public/uploads/' . $filename);
    
                    move_uploaded_file($tmpName, $destinationPath);
                }

                $this->productValidator($request);
                $this->updateProduct($request, $filename);

                return response()->json(['status' => true]);
    
            } else {
                $this->productValidator($request);
                $this->updateProduct($request, $filename);

                return response()->json(['status' => true]);
            }

        } else {
            throw new ValidationException("File must by png, jpg or jpeg type.", 1);
        }
        
    }

    public function search(Request $request) {
        return response()->json(Products::where('productName', 'LIKE', '%' . $request->input . '%')->get());
    }

    public function getColor(Request $request) {
        $colors = Products::where('productName', $request->name)->pluck('color');

        return response()->json($colors);
    }

    public function getProductByColor(Request $request) {
        $product = Products::where('productName', $request->productName)->where('color', $request->color)->get();

        return response()->json($product);
    }

    public function sorted(Request $request) {
        $sortedList = [];
        
        $data = Products::whereIn('category', $request->list)->get()->toArray();

        return response()->json($data);
    }

    public function getInformation(Request $request) {
        $product = Products::find($request->id);

        return response()->json($product);
    }

    function productValidator($data) {
        $data->validate([
            'productName' => ['required', 'string', 'max:30', 'regex:/^[\pL\pN\s\p{P}]+$/u'],
            'description' => ['required', 'string', 'max:120', 'regex:/^[\pL\pN\s\p{P}]+$/u'],
            'category' => ['required', 'string', 'max:15'],
            'stocks' => ['required', 'integer', 'regex:/^\d{1,100}$/'],
            'price' => ['required', 'integer', 'regex:/^\d{1,1000}$/'],
            'color' => ['required', 'string', 'max:20']
        ]);
    }

    function updateProduct($data, $imageName) {
        Products::where('id', $data->hiddenID)->update([
            'productName' => $data->input('productName'),
            'description' => $data->input('description'),
            'category' => $data->input('category'),
            'stocks' => $data->input('stocks'),
            'price' => $data->input('price'),
            'color' => $data->input('color'),
            'image' => $imageName
        ]);
    }

    public function dateSort(Request $request) {
        $products = Products::whereBetween('created_at', [$request->date, now()])->get();

        return response()->json($products);
    }
}
