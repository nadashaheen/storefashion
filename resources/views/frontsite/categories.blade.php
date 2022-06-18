@extends('frontsite.layout.master')
@section('content')

    <div class="colorlib-blog">
        <div class="container">
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-4">
                        <article class="article-entry">
                            <a href="{{route('catclothes' , $category->id)}}" class="blog-img" style="background-image:url({{asset('category_image/'.$category->image_name)}});"></a>
                            <div class="desc" style="padding-right: 104px;">
                                <h2 style="text-align: center;"><a href="{{route('catclothes' , $category->id)}}">{{$category->title}}</a></h2>
                            </div>
                        </article>
                    </div>

                @endforeach


            </div>
        </div>
    </div>


@endsection

@section('title')
    Category Page
@endsection


