@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center my-6">
            <h2 class="text-2xl font-semibold text-gray-700">Security site</h2>
            <a class="btn-primary text-white font-bold py-2 px-4 rounded no-underline" href="{{ route('products.create') }}"> Create New Product</a>
        </div>

        @if ($message = Session::get('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ $message }}</span>
            </div>
        @endif

        <table class="table-auto w-full">
            <thead>
            <tr>
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Details</th>
                <th class="px-4 py-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td class="border px-4 py-2">{{ ++$i }}</td>
                    <td class="border px-4 py-2">{{ $product->name }}</td>
                    <td class="border px-4 py-2">{{ $product->detail }}</td>
                    <td class="border px-4 py-2">
                        <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                            <a class="btn-info font-bold py-2 px-4 rounded shadow mr-2 no-underline" href="{{ route('products.show',$product->id) }}">Show</a>

                            <a class="btn-warning text-white font-bold py-2 px-4 rounded shadow mr-2" href="{{ route('products.edit',$product->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn-danger text-white font-bold py-2 px-4 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {!! $products->links() !!}
        </div>
    </div>
@endsection
