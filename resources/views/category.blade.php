@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    @foreach ($categories as $category)
                        <li>{{ $category->name }}</li>
                        @includeWhen($category->subcategories->count(), 'subcategory', ['subcategories' => $category->subcategories])
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
