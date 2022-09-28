<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Type;
use App\Models\Cart;

class ProductController extends Controller
{

    public function index(Request $request){

        $keyword = $request->search;    
        $query = Product::where('name', 'like', '%'.$keyword.'%'); 
        
        if($request->has('c')){
            $query->where('type_id', $request->c);
        }
        $products = $query->get();

        $products = $query->paginate(12);
        $types =  Type::all();

        return view('pages.products.product', compact('products', 'types'));

    }


    public function show(){
        
        $product = Product::where('id', request('id'))->first();
        return view('pages.products.detail', compact('product'));
    }

    public function store(Request $request){

        $image=$request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('productimage', $imagename);
        $product->image=$imagename;

        $product->save();
    }

    public function contact(){

        return view('pages.contacts.contact');
    }

    public function cart(Request $request){

        $product = Product::all();
        return view('pages.products.cart', compact('product'));
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
           
        $cart = session()->get('cart', []);
   
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
           
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product Added to cart Successfully!');
    }

    public function updateCart(Request $request){

        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart Updated Successfully');
        }
    }


    public function removeCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product Removed Successfully');
        }
    }

}
