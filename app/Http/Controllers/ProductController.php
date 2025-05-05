<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('products.index', ['products' => Product::all()]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'stock' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
        ]);
        Product::create($validated);
        return redirect('/products')->with('success', 'Product Added Successfully.');
    }
    public function get_product($id){
        $product= Product::findOrFail($id);
        return view('products.update', ['product'=> $product]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'name'=> 'required',
            'stock' => 'required',
            'price' => 'required',
            'description'=> 'required',
        ]);
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->description = $request->description;

        $product->save();
        return redirect('/products')->with('success','product updated successfully');
    }
    public function delete($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/products')->with('success','Product Deleted successfully');
    }
}
