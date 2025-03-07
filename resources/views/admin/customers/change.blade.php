@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Change Customer Details</h1>
    <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" class="form-input mt-1 block w-full" id="name" name="name" value="{{ $customer->name }}" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" class="form-input mt-1 block w-full" id="email" name="email" value="{{ $customer->email }}" required>
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-gray-700">Phone</label>
            <input type="text" class="form-input mt-1 block w-full" id="phone" name="phone" value="{{ $customer->phone }}" required>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save Changes</button>
    </form>
</div>
@endsection