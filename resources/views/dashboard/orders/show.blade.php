@extends('dashboard.layouts.app')

@section('title', 'Order Details')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Order Details for Order #{{ $order->id }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Customer Name:</strong> {{ $order->user->name }}</p>
                    <p><strong>Email:</strong> {{ $order->user->email }}</p>
                    <p><strong>Total Amount:</strong> {{ $order->total_price }}USD</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Product Name:</strong> {{ $order->product->name }}</p> <!-- Using product relationship -->
                    <p><strong>Order Status:</strong>
                        <span class="badge bg-{{ $order->status == 'completed' ? 'success' : 'warning' }}">
                            {{ $order->status }}
                        </span>
                    </p>
                    <p><strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('dashboard.orders.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Orders
            </a>
        </div>
    </div>
@endsection
