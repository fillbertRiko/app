@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center py-4">
        <h1 class="text-2xl font-bold">Customers</h1>
        <a href="{{ route('admin.customers.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Add New Customer</a>
    </div>
    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Phone</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $customer->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $customer->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $customer->email }}</td>
                    <td class="py-2 px-4 border-b">{{ $customer->phone }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.customers.edit', $customer->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                        <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection