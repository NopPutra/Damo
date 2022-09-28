<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request){

        $keyword = $request->search;    

        $query = Product::where('name', 'like', '%'.$keyword.'%')->orderBy('id', 'desc');   
        $products = $query->paginate(12);

        return view('pages.homes.home', compact('products'));
    }



}
