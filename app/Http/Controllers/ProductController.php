<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{

    public function create()
    {
       return view('createproduct');
    }
    public function store(Request $request)
    {
        $data=request()->validate([
            'name'=>'required',
            'price'=>'required|integer',
            'quantity'=>'required|integer',
        ]);
        $products=new Product([
            'name'=>$request->get('name'),
            'price'=>$request->get('price'),
            'quantity'=>$request->get('quantity'),
        ]);
        $products->save();
        return redirect('/product');

    }
    public function view()
    {
        $product=Product::all();
        return view('product',compact('product'));
    }
     public function edit($id)
     {
         if($product=product ::where ('id',$id)->get()->first())
         {
             return view('edit',compact('product'));
         }
     }

     public function update(Request $request,$id)
     {
    
            $product = Product::find($id);
            $product->name=$request->get('name');
            $product->price=$request->get('price');
            $product->quantity=$request->get('quantity');
            $product->save();
           // dd($insert);
           return redirect()->to('/product')->with('success','Product updated successfully');
        
     }

     public function delete($id)
    { $product = Product::find($id);
        $product->delete();
  
        return redirect()->to('/product')->with('success','Product deleted successfully');
    }


}
