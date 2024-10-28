<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string',
            'quantity' => 'required|min:1'
        ]);

       //check if user have any pending order
        if (auth()->user()->order()->where('status', 'pending')->exists()) {
            return response()->json(['message' => 'You already have a pending order.'], 400);
        }

        //search product name
        $product = Product::where('name', $validated['product_name'])->first();

        //check if product موجود
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        //انجليزيتي ضعيفة(بس عاد للتحقق اذا موجود بالمستودع او لاء)
        if ($product->stock < $validated['quantity']) {
            return response()->json(['message' => 'Insufficient stock'], 400);
        }

        // create new order
        $order = Order::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'quantity' => $validated['quantity'],
            'total_price' => $validated['quantity'] * $product->price,
        ]);

        // بديهياً لازم لما يصير طلب يقل المنتج بالمخزون
        $product->decrement('stock', $validated['quantity']);

        return response()->json($order, 201);
    }
}
