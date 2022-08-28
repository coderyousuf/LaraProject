@extends('master')
@section('title', 'SubCategory-Show-Page')
@section('content')
<div class="col-8 m-auto">
<h1>{{ $subcategory->name }}</h1>
<h1>{{ $subcategory->category->name }}</h1>
<h1>{{ $subcategory->created_at->format('D-m-Y D H:i A') }}</h1>
</div>
@endsection
