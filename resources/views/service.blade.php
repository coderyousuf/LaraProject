@extends('master')
@section('title', 'Service Page')
@section('content')
    @for ($index=0; $index<count($services); $index++)
    {{ $services[$index] }}<br>
    @endfor
@endsection
