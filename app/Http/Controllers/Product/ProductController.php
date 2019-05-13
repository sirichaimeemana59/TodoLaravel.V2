<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Book;
use ImageUploadAndResizer;

class ProductController extends Controller
{

    public function index()
    {
        $product = new Product;
        $product = $product->get();

        return view('product.list_product')->with(compact('product'));
    }


    public function create(Request $request)
    {
        $fileNameToDatabase = '//via.placeholder.com/250x250';
        if($request->hasFile('photo')){
            $uploader = new ImageUploadAndResizer($request->file('photo', '/images/photo'));
            $uploader->width = 350;
            $uploader->height = 350;
            $fileNameToDatabase = $uploader->execute();
        }

        $product = new Product;
        $product->name_product = $request->input('name_product');
        $product->name_create = $request->input('name_create');
        $product->price = $request->input('price');
        $product->amount = $request->input('amount');
        $product->detail = $request->input('detail');
        $product->photo = $fileNameToDatabase;
        $product->save();

        return redirect('/product/add_product');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request)
    {
        $product =  Product::find($request->input('id'));

        return view('product.view_product')->with(compact('product'));

    }


    public function edit(Request $request)
    {
        $product =  Product::find($request->input('id'));

        return view('product.edit_product')->with(compact('product'));
    }


    public function update(Request $request)
    {
        $product =  Product::find($request->input('id'));



        if(!empty($request->hasFile('photo'))){
            $fileNameToDatabase = '//via.placeholder.com/250x250';
            if($request->hasFile('photo')){
                $uploader = new ImageUploadAndResizer($request->file('photo', '/images/photo'));
                $uploader->width = 350;
                $uploader->height = 350;
                $fileNameToDatabase = $uploader->execute();
            }

            $product->name_product = $request->input('name_product');
            $product->name_create = $request->input('name_create');
            $product->price = $request->input('price');
            $product->amount = $request->input('amount');
            $product->detail = $request->input('detail');
            $product->photo = $fileNameToDatabase;
            $product->save();
        }else{
            $product->name_product = $request->input('name_product');
            $product->name_create = $request->input('name_create');
            $product->price = $request->input('price');
            $product->amount = $request->input('amount');
            $product->detail = $request->input('detail');
            $product->photo = $request->input('photo_hidden');
            $product->save();
        }
        return redirect('/product/add_product');
    }


    public function destroy(Request $request)
    {
        $product =  Product::find($request->input('id'));
        $product->delete();

        return redirect('/product/add_product');
    }
}
