@extends('app')

@section('content')

<h1>Products</h1>

@if( $products->isEmpty() )

<p>No products available</p>

@else

<p>All products</p>

@endif


@endsection