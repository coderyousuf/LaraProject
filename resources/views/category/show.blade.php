@extends('master')

@section('title', 'Category-Show-Page')

@section('content')
<div class="row">
    <div class="col-8 m-auto">
        <h1>{{ $category->name }}</h1>
        <p>{{ $category->created_at->format('d-m-Y D H:i A') }}</p>
    </div>
</div>
@endsection
