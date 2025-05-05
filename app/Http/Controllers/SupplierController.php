<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        return view('suppliers.index', ['supplier' => Supplier::all()]);
    }
    
    public function create(){
        return view('suppliers.create');
    }

    public function store(Request $request){
        Supplier::create($request->validate([
            'name' => 'required',
            'contact_person' => 'required',
            'email' => 'required|email:suppliers',
            'phone' => 'required',
            'address' => 'required',
        ]));
        return redirect('/suppliers')->with('success', 'Supplier Added Successfully.');
    }
    public function get_data($id){
        $data = Supplier::findOrFail($id);
        return view('suppliers.update', compact('data'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'contact_person' => 'required',
            'email' => 'required|email:suppliers',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $data = Supplier::findOrFail($id);
        $data->name = $request->name;
        $data->contact_person = $request->contact_person;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->save();
        return redirect('/suppliers')->with('success','data updated successfully');
    }
    public function delete($id){
       $supplier = Supplier::findOrFail($id);
       $supplier->delete();
       return redirect('/suppliers')->with('success', 'Data deleted successfully');
    }
}
