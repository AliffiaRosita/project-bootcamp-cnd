@extends('frontend.includes.template')

@section('title') {{$post->title}} @endsection

@section('content')

<!-- Start top-section Area -->
<section class="top-section-area section-gap">
    <div class="container">
        <div class="row justify-content-between align-items-center d-flex">
            <div class="col-lg-8 top-left">

            <h1 class="text-white mb-20">{{$post->title}}</h1>
                <ul style="color:white">
                    <li>Home<span class="lnr lnr-arrow-right"></span></li>
                <li>Category<span class="lnr lnr-arrow-right"></span></li>
                <li>@foreach ($tags as $tag)
                            {{$tag->category->name.','}}
                        @endforeach
                    </li>

                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End top-section Area -->


<!-- Start post wrapper Area -->
<div class="post-wrapper pt-100">
    <!-- Start post Area -->
    <section class="post-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="single-page-post">
                        <img class="img-fluid" src="{{ asset('images/post/'.$post->image_cover) }}" alt="">
                        <div class="top-wrapper ">
                            <div class="row d-flex justify-content-between">
                                <h2 class="col-lg-8 col-md-12 text-uppercase">
                                    {{$post->title}}
                                </h2>
                                <div class="col-lg-4 col-md-12 right-side d-flex justify-content-end">
                                    <div class="desc">
                                    <h2>{{$post->author->name}}</h2>
                                    <h3>{{$post->created_at->isoFormat('LLLL')}}</h3>
                                    </div>
                                    <div class="user-img">
                                        <img src="{{ asset('blogger/img/user.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tags">
                            <ul>
                                @foreach ($tags as $tag)
                            <li><a href="{{url('category/'.$tag->category_id)}}">{{$tag->category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="single-post-content mb-5">
                                {!!$post->content!!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 sidebar-area">
                   @include('frontend.includes.sidebar')
                </div>
            </div>
        </div>
    </section>
    <!-- End post Area -->
</div>
<!-- End post Area -->

@endsection
