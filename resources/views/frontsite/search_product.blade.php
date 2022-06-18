@extends('frontsite.layout.master')
@section('content')

    <div class="colorlib-shop">
        <div class="container">
            <div class="row">
                <div class="row row-pb-lg">
                    @foreach($clothes as $clo)
                    <div class="col-md-4 text-center">
                        <div class="product-entry">
                            <div class="product-img"
                                 style="background-image: url('{{asset('clothes_image/'.$clo->image_name)}}');">
                            </div>
                            <div class="desc">
                                <h3><a href="{{route('detail' , $clo->id)}}">{{$clo->title}}</a></h3>
                                <p class="price"><span>$ {{$clo->price}}</span></p>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
@section('title')
    Search Clothes
@endsection
