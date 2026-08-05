<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Stock\StockRequest;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function stockin(StockRequest $request)
    {
        $product = Product::lockForUpdate()->findOrFail($request->input('product_id'));
        $product->stock += $request->input('qty');
        $product->save();

        Transaction::create([
            'product_id' => $product->id,
            'type' => 'in',
            'qty' => $request->input('qty'),
        ]);

        return response()->json($product);
    }

    public function stockout(StockRequest $request)
    {
        $product = Product::lockForUpdate()->findOrFail($request->input('product_id'));
        if ($product->stock < $request->input('qty')) {
            return response()->json(['error' => 'Stock kurang'], 400);
        }

        $product->stock -= $request->input('qty');
        $product->save();

        Transaction::create([
            'product_id' => $product->id,
            'type' => 'out',
            'qty' => $request->input('qty'),
        ]);

        return response()->json($product);
    }
}
