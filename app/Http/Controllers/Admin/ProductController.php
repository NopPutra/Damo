<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Type;

class ProductController extends Controller
{
    public function index(Request $request){

        $keyword = $request->search;    

        $query = Product::where('name', 'like', '%'.$keyword.'%')->orderBy('id', 'desc');
        $productCounts = $query->count();
        $limit = 10;
    
        $products = $query->paginate($limit);

        return view('admin.pages.product.index', compact('products', 'productCounts', 'limit'));

    }

    public function create(){

        $types = Type::all();
        return view('admin.pages.product.create', compact('types'));
    }

    public function store(Request $request){
        
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
            'type' => 'required',
            'description' => 'required'
        ]);

        $product = new Product;
        $product->name=$request->name;
        $product->type_id=$request->type;
        $product->price=$request->price;
        $product->description=$request->description;

        $image=$request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('productimage', $imagename);
        $product->image=$imagename;

        $product->save();
        // $product = Product::create([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'image' => $request->image,
        //     'description' => $request->description
        // ]);
        // if($request->hasFile('image')){
        //     $request->image->store('public/products');
        // }
        return redirect()->route('list-product')->with('success','Product Created Successfully.');
    }

    public function view($id){

        $product = Product::find($id);
        return view('admin.pages.product.view', compact('product'));
    }

    public function edit($id){

        $product = Product::find($id);
        $types = Type::all();
        return view('admin.pages.product.edit', compact('product', 'types'));
    }

    public function update(Request $request, $id){

        $product = Product::find($id);
        $product->name=$request->name;
        $product->type_id=$request->type;
        $product->price=$request->price;
        $product->description=$request->description;

        $image=$request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('productimage', $imagename);
        $product->image=$imagename;

        $product->save();
        return redirect()->route('list-product')->with('success','Product Updated Successfully.');
    }

    public function destory($id){
        $product = Product::find($id);

        if($product){
            $product->delete();
        }
        return redirect()->route('list-product')->with('success','Product Deleted Successfully.');   
    }

    public function type(Request $request){
  
        $keyword = $request->search;    

        $query = Type::where('name', 'like', '%'.$keyword.'%')->orderBy('id', 'desc');   
        $typeCounts = $query->count();
        $limit = 10;

        $types = $query->paginate($limit);

        return view('admin.pages.types.type', compact('types', 'typeCounts', 'limit'));
    }

    public function createType(){

        return view('admin.pages.types.createType');
    }

    public function storeType(Request $request){

        $request->validate([
            'name' => 'required'
        ]);

        $type = new Type;
        $type->name=$request->name;
        $type->save();
        return redirect()->route('list-type')->with('success','Type Product Created Successfully.');
    }

    public function editType($id){

        $type = Type::find($id);
        return view('admin.pages.types.editType', compact('type'));
    }

    public function updateType(Request $request, $id){

        $type = Type::find($id);
        $type->name=$request->name;
        $type->update();
        return redirect()->route('list-type')->with('success','Type Product Updated Successfully.');
    }

    public function deleteType($id){

        $type = Type::find($id);
        $type->delete();
        return redirect()->route('list-type')->with('success','Type Product Deleted Successfully.');
    }
}
