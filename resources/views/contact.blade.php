@extends('master')
@section('title', 'Contact Page')
@section('content')
    <h1>{{ $page_name }}</h1>
    @forelse($products as $key=>$product)
        @include('partial.product')
        @empty
        <p>No product found</p>
    @endforelse

@endsection
