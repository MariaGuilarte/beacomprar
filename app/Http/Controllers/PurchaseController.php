<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Client;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $purchases = Purchase::where('client_id', $request->client_id);
        return view('shopping-cart', $purchases);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchase = Purchase::create([
            'client_id' => $request->client_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity
        ]);

        $purchase->save();
        return view('products.index');
    }

    public function update(Request $request)
    {
        $purchase->update([
            'client_id' => $request->client_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity
        ]);

        return view('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return view('products.index');
    }
}
