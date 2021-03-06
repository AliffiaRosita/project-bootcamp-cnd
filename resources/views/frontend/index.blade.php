@extends('frontend.includes.template')

@section('title') Home @endsection

@section('content')
    <!-- Banner Area -->
    @include('frontend.includes.banner')


    <!-- Start category Area -->

    <section class="category-area section-gap" id="news">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Latest News from all categories</h1>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.</p> -->
                    </div>
                </div>
            </div>

            <div class="active-cat-carusel">
                    @foreach ($categories as $category)
                <div class="item single-cat">
                    <img src="{{ asset('images/categories/'.$category->cover_image) }}" height="200" alt="">
                <p class="date">{{$category->created_at->isoFormat('MMM DD YYYY')}}</p>
                <h4><a href="{{ url('/read/1') }}"></a>{{$category->name}}</h4>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End category Area -->

    <!-- Start travel Area -->
    <section class="travel-area section-gap" id="travel">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Newest Post</h1>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.</p> -->
                    </div>
                </div>
            </div>
            <div class="row">
                    @foreach ($top_post as $item)
                <div class="col-lg-6 ">
                    <div class="single-travel media pb-70">
                        <img class="img-fluid d-flex  mr-3" src="{{ asset('images/post/'.$item->image_cover) }}" height="200px" width="200px" alt="">
                        <div class="dates">
                        <span>{{$item->created_at->isoFormat('DD')}}</span>
                        <p>{{$item->created_at->isoFormat('MMMM')}}</p>
                        </div>
                        <div class="media-body align-self-center">
                        <h4 class="mt-0"><a href="{{ url('read/'.$item->id) }}">{{$item->title}}</a></h4>
                        <p>{{str_limit( strip_tags($item->content), 50)}}</p>
                        <div class="meta-bottom d-flex justify-content-between">
                            <p><span ></span>{{$item->created_at->isoFormat('LLLL')}} </p>
                        </div>
                        </div>
                    </div>
                </div>
                    @endforeach

                <a href="{{ url('/search') }}" class="primary-btn load-more pbtn-2 text-uppercase mx-auto mt-60">Load More </a>
            </div>
        </div>
    </section>
    <!-- End travel Area -->
@endsection
