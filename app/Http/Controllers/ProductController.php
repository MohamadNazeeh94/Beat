<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Auth;

class ProductController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200',
            'description' => 'required|min:50',
        ]);
    
        $product = Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'user_id' => Auth::user()->id
        ]);

        $product
            ->addMedia($request->image)
            ->toMediaCollection('product_image');
     
        return redirect()->route('home.index')
                        ->with('success','Product created successfully.');
    }
}
