<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductCntroller extends Controller
{
    public function index(){
        $products = product::orderBy('id','desc')->get();
        return view('backend.products.index',compact('products'));
    }
    public function create(){
        return view('backend.products.create');
    }
    public function store(Request $request){
        try{
            $request->validate([
                'name'=>'required|min:5|max:255|',
                'price'=>'required',
                'desc'=>'required',
                'photo'=>'required|image|max:1024'
            ],
            // $messages =['name.required' => '!wrong Name'],
            //             ['min.required' => '!carrect Name']

        );
        // dd($request-all());
    //    dd($request->input('photo'));
        // dd($request->file('photo'));
        // dd($request->photo);
        $newName = 'product_'.time().'.'.$request->file('photo')->getClientOriginalExtension();
        // dd($newName);
        $request->photo->move('uplodes/products/',$newName);
       $data =[
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'desc' => $request->input('desc'),
                 'photo'=>$newName
       ];
       product::create($data);
       return redirect()->route('admin.product');

        }catch(\Exception $exception){
            $errors = $exception->validator->getMessageBag();

            return redirect()->back()->withErrors($errors)->withInput();

        }
    }
    public function edit($id){
        $product = product::find($id);
        return view ('backend.products.edit',compact('product'));
    }
    public function update(Request $request,$id){
        try{
            $request->validate([
                'name'=>'required|min:5|max:255',
                'price'=>'required',
                'desc'=>'required',
                'photo'=>'image'
            ]);
        $product = product::find($id);
        $data =[
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'desc' => $request->input('desc'),
            ];
            $product->update($data);
            // dd($data);
            if($request->file('photo')){
                if(file_exists('uplodes/products/'.$product->photo))
                {
                    unlink('uplodes/products/'.$product->photo);
                }
                $newName = 'product_'.time().'.'.$request->file('photo')->getClientOriginalExtension();
                $request->photo->move('uplodes/products/',$newName);
                $product->update(['photo'=>$newName]);
            }
            return redirect()->route('admin.product');
        }catch(\Exception $exception){
            $errors = $exception->validator->getMessageBag();

            return redirect()->back()->withErrors($errors)->withInput();
        }
    }

    public function delete($id){
        // product::where('id',$id)->delete();
        //  return redirect()->back();
        // dd($id);
         $product = Product::find($id);
         if(file_exists('uplodes/products/'.$product->photo))
         {
             unlink('uplodes/products/'.$product->photo);
         }
         $product->delete();
         return redirect()->back();
    }
}
