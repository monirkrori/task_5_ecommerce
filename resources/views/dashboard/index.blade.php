@extends('dashboard.layouts.app')

@section('title', 'Dashboard')

@section('content')
<style>
    .form-control, .form-select {
        border-radius: 0.5rem;
        transition: border-color 0.3s;
    }

    .form-control:focus, .form-select:focus {
        border-color: #FF8500; /* اللون العام */
        box-shadow: 0 0 0 0.2rem rgba(255, 133, 0, 0.25);
    }

    .btn-outline-primary {
        color: #FF8500;
        border-color: #FF8500;
    }

    .btn-outline-primary:hover {
        background-color: #FF8500;
        color: white;
    }

</style>

{{--search&&filter--}}
<div class="row mb-4">
    <div class="col-md-12">
        <form class="d-flex" role="search" action="{{ route('dashboard.index') }}" method="GET">
            <input class="form-control me-2" type="search" name="search" placeholder="Search Orders" aria-label="Search" value="{{ request('search') }}">
            <select class="form-select me-2" name="status" aria-label="Filter by Status">
                <option value="" {{ request('status') == '' ? 'selected' : '' }}>All Statuses</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Canceled</option>
            </select>
            <button class="btn" style="background-color: #FF8500; color: white;" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
</div>


    <div class="row">

        <!-- Quick Stats Section -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-primary shadow h-100 py-2 animate__animated animate__fadeInUp">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-primary mb-1">Total Products</div>
                            <div class="h5 mb-0 font-weight-bold">{{ $totalProducts }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-success shadow h-100 py-2 animate__animated animate__fadeInUp animate__delay-1s">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-success mb-1">Total Orders</div>
                            <div class="h5 mb-0 font-weight-bold">{{ $totalOrders }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-info shadow h-100 py-2 animate__animated animate__fadeInUp animate__delay-2s">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-info mb-1">Total Users</div>
                            <div class="h5 mb-0 font-weight-bold">{{ $totalUsers }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-warning shadow h-100 py-2 animate__animated animate__fadeInUp animate__delay-3s">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-warning mb-1">Total Revenue</div>
                            <div class="h5 mb-0 font-weight-bold">{{ $totalRevenue }} $</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Latest Orders Table -->
        <div class="col-12 mt-4">
            <div class="card shadow animate__animated animate__fadeIn">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Latest Orders</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Product</th>
                                <th>Product Price</th>
                                <th>Quantity</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($recentOrders as $order)
                                <tr class="animate__animated animate__fadeIn animate__delay-{{ $loop->index + 4 }}s">
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->product->name }}</td>
                                    <td>{{ $order->product->price }} $</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->total_price }} $</td>
                                    <td>
                                            <span class="badge bg-{{ $order->status == 'completed' ? 'success' : ($order->status == 'pending' ? 'warning' : 'danger') }}">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                    </td>
                                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No orders found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
