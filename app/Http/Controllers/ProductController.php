<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;



class ProductController extends Controller
{
           //1.show all products 
           public function  index(){
        // $productlist=Product::orderBy('created_at','DESC')->paginate(5)->get();
         $productlist = Product::orderBy('created_at', 'DESC')->paginate(5);
        
        // return view('productf.index');
         return view('productf.index',[
             'productlist'=>$productlist]);
    // $productlist = Product::orderBy('created_at', 'DESC')->paginate(5);
    // return view('products.index', compact('productlist'));
            

    }

    //1.show all products 
    public function create(){
        return view('productf.create');

    }
    //1.insert  products 
    public function store(Request $request){
            $valrules= [
           'gender' => 'required|string',
           'name' => 'required|string|max:255',
           "sku"=>"required|min:5",
           'description' => 'required|string|max:255',
             ];
            if($request->image!=''){
             $valrules['image']='image';
             }
             $validator=Validator::make($request->all(),$valrules);
             if($validator->fails()){
            return redirect()->route('productf.create')->withInput()->withErrors($validator);
             }

     // store 
     $product=new Product();
     $product->gender=$request->gender;
     $product->name=$request->name;
     $product->sku=$request->sku;
     $product->price=$request->price;
     $product->description=$request->description;
     $product->save();

    if($request->image !=''){  // image select then code excute 
    // hete will store image
     $image=$request->image;
     $ext=$image->getClientOriginalExtension();
     $imageName= time().'.'.$ext; // unique file name
    // sent in foler public f image
     $image->move(public_path('upload/productsupload'),$imageName);
  // image save in db
     $product->image=$imageName;
     $product->save();
      }
     return redirect()->route('productf.index')->with('success','Product Created successfully');
    }

    //1.edit(fetch single product) 
    public function edit($id){
        // echo $id;
        $fetchdata= Product::findOrFail($id);
        // return view('productf.edit');
        return view('productf.edit',[
            'fetchdata'=>$fetchdata
           
        ]); 
    }


    //1.update all products 
    public function update($id,Request $request){
        $fetchdata= Product::findOrFail($id);
        $valrules= [
            'gender' => 'required|string',
            'name' => 'required|string|max:255',
            "sku"=>"required|min:5",
            'description' => 'required|string|max:255',
              ];
             if($request->image!=''){
              $valrules['image']='image';
              }
              $validator=Validator::make($request->all(),$valrules);
              if($validator->fails()){
              return redirect()->route('productf.edit',$fetchdata->id)->withInput()->withErrors($validator);
              }
 
      // update
    //   $product=new Product();
      $fetchdata->gender=$request->gender;
      $fetchdata->name=$request->name;
      $fetchdata->sku=$request->sku;
      $fetchdata->price=$request->price;
      $fetchdata->description=$request->description;
      $fetchdata->save();
 
     if($request->image !=''){  // image select then code excute 
        // old image delete
    File::delete(public_path('upload/productsupload/'.$fetchdata->image));
     // hete will store image
      $image=$request->image;
      $ext=$image->getClientOriginalExtension();
      $imageName= time().'.'.$ext; // unique file name
     // sent in foler public f image
      $image->move(public_path('upload/productsupload'),$imageName);
   // image save in db
      $fetchdata->image=$imageName;
      $fetchdata->save();
     
       }
       return redirect()->route('productf.index')->with('success','Product Updated successfully');
       



    }



    //1.destory products 
    public function destroy($id){
        // echo $id;
        $fetchdata= Product::findOrFail($id);
        // delete image
        File::delete(public_path('upload/productsupload/'.$fetchdata->image));
        $fetchdata->delete();
        return redirect()->route('productf.index')->with('success','Product deleted successfully');


    }





}
