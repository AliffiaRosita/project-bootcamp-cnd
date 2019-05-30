@extends('frontend.includes.template')

@section('title') Pencarian @endsection

@section('content')

    <!-- Start top-section Area -->
    <section class="top-section-area section-gap">
        <div class="container">
            <div class="row justify-content-center align-items-center d-flex">
                <div class="col-lg-8">
                    <div id="imaginary_container">
                    <form action="{{url('search/')}}">
                        <div class="input-group stylish-input-group">
                            <input type="text" name="title" class="form-control" placeholder="insert title..."
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Addictionwhen gambling '" value="{{old('title')}}">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="lnr lnr-magnifier"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                    </div>
                    <p class="mt-20 text-center text-white">{{$posts->count()}} results found</p>
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

                            @foreach ($posts as $post)


                            <div class="single-list flex-row d-flex">
                                <div class="thumb">
                                    <div class="date">
                                    <span>{{$post->created_at->isoFormat('DD')}}</span><br>{{$post->created_at->isoFormat('MMMM')}}
                                    </div>
                                    <img src="{{ asset('images/post/'.$post->image_cover) }}" height="200px" width="200px" alt="">
                                </div>
                                <div class="detail">
                                    <a href="#">
                                    <h4 class="pb-20">{{$post->title}}</h4>
                                    </a>
                                    <p>
                                            {{str_limit( strip_tags($post->content), 50)}}
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
