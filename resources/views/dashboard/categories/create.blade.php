@extends('dashboard.layouts.app')

@section('title', 'Add New Category')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Add New Category</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.categories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn" style="background-color: #FF8500; color: white;">Save Category</button>
                <a href="{{ route('dashboard.categories.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
