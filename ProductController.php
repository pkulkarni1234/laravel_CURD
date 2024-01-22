<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
   public function index()
   {
   
    return view('products.index',
    ['products'=> Product::get()
  ]);
   }
   public function create()
   {
    return view('products.create');
   }

   public function store(Request $request)
   {
    //validate data
    $request->validate([
      'name'=>'required',
      'lname'=>'required',
      'email'=>'required',
      'image'=>'required'

    ]);

    $imageName=time().'.'.$request->image->extension();
    $request->image->move(public_path('products'),$imageName);
    $product = new Product;
    $product->name=$request->name;
    $product->lname=$request->lname;
    $product->email=$request->email;
    $product->image=$imageName;
    $product->save();
    return back()->withSuccess('User Registerd Successfully....!!!');

   }
   public function edit($id)
   {
    $product=Product::where('id',$id)->first();
     return view('products.edit',['product'=>$product]);
   }
   public function update(Request $request,$id)
   {
   
    //validate data
    $request->validate([
      'name'=>'required',
      'lname'=>'required',
      'email'=>'required',
      'image'=>'required'

    ]);
   
    $product=Product::where('id',$id)->first();

    if(isset($request->image))
    {
      $imageName=time().'.'.$request->image->extension();
      $request->image->move(public_path('products'),$imageName);
      $product->image=$imageName;
     
    }
    $product->name=$request->name;
    $product->lname=$request->lname;
    $product->email=$request->email;
   
    $product->save();
    return back()->withSuccess('User Updated Successfully....!!!');
   }
   public function destroy($id)
  {
    
    $product = Product::where('id',$id)->first();
    $product->delete();
    return back()->withSuccess('User deleted Successfully....!!!');
  }

}
