<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{

    // public function index(Request $request){

    //     $keyword = $request->search;    

    //     $query = Product::orderBy('id', 'desc')->get();   
    //     $products = $query->paginate(12);

    //     return view('pages.homes.home', compact('products'));

    // }
    


    // public function index(Request $request){
        
    //     $keyword = $request->search;

    //     $query = Product::where('name', 'like', '%'.$keyword.'%')->orderBy('id', 'asc');
    //     $products = $query->paginate(12);

    //     return view('pages.homes.home', compact('products'));
    // }


    // public function store(Request $request){

    //     $image=$request->image;
    //     $imagename = time().'.'.$image->getClientOrisginalExtension();
    //     $request->image->move('productimage', $imagename);
    //     $product->image=$imagename;

    //     $product->save();
    // }
}
