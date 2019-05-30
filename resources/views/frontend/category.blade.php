@extends('frontend.includes.template')

@section('title') Daftar Kategori @endsection

@section('content')

    <!-- Start top-section Area -->
    <section class="top-section-area section-gap">
        <div class="container">
            <div class="row justify-content-between align-items-center d-flex">
                <div class="col-lg-8 top-left">
                    <h1 class="text-white mb-20">{{$categories_now->name}}</h1>
                    <ul style="color:white">
                        <li>Home<span class="lnr lnr-arrow-right"></span></li>
                        <li>Category<span class="lnr lnr-arrow-right"></span></li>
                        <li>{{$categories_now->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End top-section Area -->


    <!-- Start post Area -->
    <div class="post-wrapper pt-100">
        <!-- Start post Area -->
        <section class="post-area">
            <div class="container">
                <div class="row justify-content-center d-flex">
                    <div class="col-lg-8">
                        <div class="post-lists">
                            @foreach ($post_join as $item)


                            <div class="single-list flex-row d-flex">
                                <div class="thumb">
                                    <div class="date">
                                        <span>{{$item->post->created_at->isoFormat('DD')}}</span><br>{{$item->post->created_at->isoFormat('MMMM')}}
                                    </div>
                                    <img src="{{ asset('images/post/'.$item->post->image_cover) }}" width="200px" height="200px" alt="">
                                </div>
                                <div class="detail">
                                <a href="{{url('read/'.$item->post_id)}}">
                                        <h4 class="pb-20">{{$item->post->title}}</h4>
                                    </a>
                                    <p>
                                        {{str_limit( strip_tags($item->post->content), 100)}}
                                    </p>
                                </div>
                            </div>
                            @endforeach

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
