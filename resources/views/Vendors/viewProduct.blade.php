@extends('Vendors.index')

@section('css')
    <style>

    </style>
@endsection

@section('maincontent')
            @foreach($showProduct as $products)
            {{$products->product_name}}
            {!!$products->product_short_description!!}
            {!!$products->product_long_description!!}

@endforeach
    @endsection