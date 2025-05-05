<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        return view('orders.index', [
            'orders'=>Order::with(['supplier', 'product'])->get(),
            'suppliers' => Supplier::all(),
            'products' => Product::all(),
        ]);
    }

    public function create(){
        return view('orders.create', [
            'suppliers' => Supplier::all(),
            'products' => Product::all(),
        ]);
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);
    
        // Retrieve the selected product
        $product = Product::findOrFail($validated['product_id']);
    
        // Calculate total price
        $totalPrice = $product->price * $validated['quantity'];
    
        // Create order with total price
        $order = Order::create([
            'supplier_id' => $validated['supplier_id'],
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
            'total_price' => $totalPrice,
            'status' => 'Pending'
        ]);
        $order->save();
        // dd($order->all());
        return redirect('/orders')->with('success', 'Order placed successfully.');
    }

    public function get_order($id){
        $order= Order::findOrFail($id);
        $supplier = Supplier::findOrFail($order->supplier_id);
        $product = Product::findOrFail($order->product_id);
        // dd($supplier);
        return view('orders.update', [
            'order'=>$order,
            'supplier' => $supplier,
            'product' => $product,
            'suppliers' => Supplier::all(),
            'products' => Product::all(),
        ]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'status' => 'required'
        ]);

        $product = Product::findOrFail($request->product_id);
    
        // Calculate total price
        $totalPrice = $product->price * $request->quantity;

        $order = Order::findOrFail($id);
        $order->supplier_id = $request->supplier_id;
        $order->product_id = $request->product_id;
        $order->quantity = $request->quantity;
        $order->total_price = $totalPrice;
        $order->status = $request->status;

        // dd($order);
        $order->save();
        return redirect('/orders')->with('success','Order updated successfully');
    }
    public function delete($id){
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect('/orders')->with('success','Order Deleted successfully');
    }


    public function report(){
        return view('report', [
            'orders'=>Order::with(['supplier', 'product'])->get(),
            'suppliers' => Supplier::all(),
            'products' => Product::all(),
        ]);
    }
    
}