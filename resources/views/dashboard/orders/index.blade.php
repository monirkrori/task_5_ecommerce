@extends('dashboard.layouts.app')

@section('title', 'Orders')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Orders List</h5>
        </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Product</th>
                        <th>Product Price</th>
                        <th>Total Amount</th>
                        <th>Order Status</th>
                        <th>Order Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->product->name }}</td>
                            <td>{{ $order->product->price }}$</td>
                            <td>{{ number_format($order->total_price, 2)}}$ </td>
                            <td>
                                <span class="badge bg-{{ $order->status == 'completed' ? 'success' : ($order->status == 'cancelled' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                            <td class="d-flex align-items-center">
                                <a href="{{ route('dashboard.orders.show', $order) }}" class="btn btn-sm" style="background-color: #FF8500; color: white; margin-right: 5px;">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <form action="{{ route('dashboard.orders.update', $order) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <div class="input-group" style="margin-right: 5px;">
                                        <select name="status" onchange="this.form.submit()" class="form-select form-select-sm status-select">
                                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </div>
                                </form>
                                <form action="{{ route('dashboard.orders.destroy', $order) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No Orders Available</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $orders->links() }}
            </div>
        </div>
    </div>

    <style>
        .status-select {
            transition: border-color 0.3s ease;
        }

        .status-select:focus {
            border-color: #FF8500;
            box-shadow: 0 0 5px rgba(255, 133, 0, 0.5);
        }

        .btn:hover {
            transform: scale(1.05);
            transition: transform 0.2s ease;
        }
    </style>
@endsection
