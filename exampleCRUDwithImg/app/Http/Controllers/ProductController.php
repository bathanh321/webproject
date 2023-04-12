<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::latest()->paginate(5);
        return view('index', compact('products'))->with(request()->input('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request ->validate([
            'name' => 'required',
            'desc' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request ->all();
        if ($image = $request ->file('image')){
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image -> getClientOriginalExtension();
            $image ->move ($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Product::create($input);
        return redirect() ->route('index') -> with('ok','Product created ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('edit',compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        //
        $request ->validate([
            'name' => 'required',
            'desc' => 'required',
        ]);
        $input = $request ->all();
        if ($image = $request ->file('image')){
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image -> getClientOriginalExtension();
            $image ->move ($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        else{
            unset($input['image']);
        }
        $product ->update($input);
        return redirect() ->route('index') -> with('ok','Product updated ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product ->delete();
        return redirect() ->route('index') -> with('ok','Product deleted ok');
    }
}
