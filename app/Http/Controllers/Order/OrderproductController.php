<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;
use App\Order;
use DB;

class OrderproductController extends Controller
{

    public function index()
    {
        $product = new Product;
        $product = $product->get();

        return view('orderproduct.list_product')->with(compact('product'));
    }


    public function create(Request $request)
    {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        //dd($request->input('id_product'));
        $count = count($request->input('id_product'));

        for($i=0;$i<$count;$i++){
            $order = new Order;
            $order->id_product = $request->input('id_product')[$i];
            $order->price_product = $request->input('price')[$i];
            $order->amount = $request->input('amount')[$i];
            $order->total_price = $request->input('result')[$i];
            $order->order_tax = $randomString;
            $order->save();

            $product = Product::find($request->input('id_product')[$i]);
            $product->amount = $product->amount - $request->input('amount')[$i];
            $product->save();
            //echo $order;
            //dump($product);
        }
        return redirect('/product/list_product');
    }

    public function store()
    {
        $order = DB::table('order')
            ->select('order_tax', DB::raw('SUM(total_price) as total'))
            ->groupBy('order_tax')
            ->get();

        //dd($order);
        return view('orderproduct.list_order_product')->with(compact('order'));
    }


    public function show(Request $request)
    {
        $order = new Order;
        $order = $order->where('order_tax',$request->input('id'))->get();

       return view ('orderproduct.view_order_product')->with(compact('order'));


    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
