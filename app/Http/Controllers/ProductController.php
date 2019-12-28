<?php

namespace App\Http\Controllers;

use App\Product;
use Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	
	
    public function addProduct(Request $request)
    {
        $product = new Product();
        $file_name =str_replace(' ', '', $request->file('image')->getClientOriginalName());//original name
        $product->image=$file_name;//save image 
        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->quantity=$request->input('quantity');
        $product->description=$request->input('description');
        $product->category=$request->input('category');
        $path = $request->file('image')->move(public_path("/"),$file_name);//upload image 


    	if ($product->save()) {
            $data=[
                'status'=>201,
                'message'=>"added successfuly",
                'id'=>$product->id
            ];
            return response()->json($data);
    	}else{

            $data=[
                'status'=>404,
                'message'=>"error happend"
            ];

            return response()->json($data);
    	}
    }

    public function editeProduct(Request $request,$id)
    {
    	$product = Product::find($id);
        if ($product) {
            $file_name =str_replace(' ', '', $request->file('image')->getClientOriginalName());//original name
            $originalImage=parse_url($product->image);
            Storage::delete( public_path($originalImage['path']));
            $product->image=$file_name;//save image as link
            $product->name=$request->input('name');
            $product->price=$request->input('price');
            $product->quantity=$request->input('quantity');
            $product->description=$request->input('description');
            $product->category=$request->input('category');
            $path = $request->file('image')->move(public_path("/"),$file_name);//upload image 

            $product->save();

            $data=[
                'status'=>200,
                'message'=>$product
            ];

            return response()->json($data);

        }else{
            $data=[
                'status'=>404,
                'message'=>"data not found"
            ];

            return response()->json($data);


        }
        

    }
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product) {
            $originalImage=parse_url($product->image);
            Storage::delete( public_path($originalImage['path']));
            $product->delete();
            $data=[
                    'status'=>200,
                    'message'=>"deleted successfuly"
                ];
            return response()->json($data);       

        }else{
           $data=[
                    'status'=>404,
                    'message'=>"no data found"
                ];
           return response()->json($data);  
        }
        

    } 
    public function displayProduct($id)
    {
    	$product= product::find($id);
        if ($product) {
            $data=[
                    'status'=>200,
                    'message'=>$product
                ];
            return response()->json($product);       

        }else{
           $data=[
                    'status'=>404,
                    'message'=>"no data found"
                ];
           return response()->json($data);  
        }

    }   

    public function displayAllProduct()
    {
    	$products = product::all();

        $data=[
                    'status'=>200,
                    'message'=>$products
                ];
        return response()->json($data);      

    }  

    public function search(Request $request)
    {

    	$searchKey = $request->input('searchKey');

        $searchData = Product::query()->where('name','LIKE','%'.$searchKey.'%')
                                      ->orWhere('description','LIKE','%'.$searchKey.'%')
                                      ->orWhere('category','LIKE','%'.$searchKey.'%')
                                      ->get();

        if (count($searchData)>0) {
            $data=[
                    'status'=>200,
                    'message'=>$searchData
              ];
            return response()->json($data);   
        }else{
            $data=[
                    'status'=>404,
                    'message'=>"no data found"
            ];
            return response()->json($data);
        }
                     

    }

    public function filter(Request $request)
    {
        $filter = $request->input('filter');//by name , category 
        $order = $request->input('order');//asc or desc  
       
        $searchData = Product::query()->where('name','LIKE','%'.$filter.'%')
                                      ->orWhere('description','LIKE','%'.$filter.'%')
                                      ->orWhere('category','LIKE','%'.$filter.'%')
                                      ->orderBy('price', $order) 
                                      ->get();

         if (count($searchData)>0) {
            $data=[
                    'status'=>200,
                    'message'=>$searchData
              ];
            return response()->json($data);   
        }else{
            $data=[
                    'status'=>404,
                    'message'=>"no data found"
            ];
            return response()->json($data);
        }
    }
}
