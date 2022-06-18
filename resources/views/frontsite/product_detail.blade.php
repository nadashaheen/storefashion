@extends('frontsite.layout.master')
@section('content')

    <div class="colorlib-shop">
        <div class="container">
            <div class="row row-pb-lg">
                <div class="col-md-10 col-md-offset-1">
                    <div class="product-detail-wrap">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="product-entry">
                                    <img src='{{asset('clothes_image/'.$clothes->image_name)}}'
                                         style=" width: 474px; height: 446px;">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="desc" style="margin-left: 76px; margin-top: 50px;">
                                    <h3>{{$clothes->title}}</h3>
                                    <p class="price">
                                        <span>$ {{$clothes->price}}</span>
                                    </p>
                                    <p>{{$clothes->description}}.</p>
                                    <div class="size-wrap">
                                        <p class="size-desc">
                                            Size:
                                            {{$clothes->size}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('title')
    Clothes detail Page
@endsection
