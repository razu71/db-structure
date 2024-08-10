@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Products</h1>
        @foreach($products as $product)
            <div class="mb-4 border-b-2 pb-4" style="background-color: #f5f5f5; padding: 10px 20px; border-radius: 5px;">
                <div class="font-bold"><b>Name: </b> {{ $product->name }}</div>
                <p class="text-sm mb-2"><b>Description: </b> {{ $product->description }}</p>
                <div class="text-xl"><b>Price: </b> ${{ number_format($product->price / 100, 2) }}</div>
            </div>
        @endforeach
    </div>
@endsection