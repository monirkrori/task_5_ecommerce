<?php
namespace App\Http\Controllers\dashboard;

    use App\Http\Controllers\Controller;
    use App\Models\Order;
    use Illuminate\Http\Request;

class OrderController extends Controller
{

    //return all orders
    public function index()
    {
        $orders = Order::with('user')->latest()->paginate(10);
        return view('dashboard.orders.index', compact('orders'));
    }

     //return order details
        public function show(Order $order)
    {
        $order->load('product');
        return view('dashboard.orders.show', compact('order'));
    }


    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:pending,completed,cancelled',
        ]);

        $order->update([
            'status' => $validated['status'],
        ]);

        return redirect()->route('dashboard.orders.index')
            ->with('success', 'Update order successfully');
    }


    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('dashboard.orders.index')->with('success', 'Order deleted done');
    }

}
