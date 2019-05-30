<!-- start banner Area -->
<section class="banner-area relative" id="home" data-parallax="scroll" data-image-src="{{ asset('images/post/'.$post_terbaru->image_cover)}}">
    <div class="overlay-bg overlay"></div>
    <div class="container">
        <div class="row fullscreen">
            <div class="banner-content d-flex align-items-center col-lg-12 col-md-12">
                <h1>
                    {{$post_terbaru->title}}
                </h1>
            </div>
            <div class="head-bottom-meta d-flex justify-content-between align-items-end col-lg-12">
                <div class="col-lg-6 flex-row d-flex meta-left no-padding">
                    {{-- <p><span class="lnr lnr-heart"></span> 15 Likes</p>
                    <p><span class="lnr lnr-bubble"></span> 02 Comments</p> --}}
                </div>
                <div class="col-lg-6 flex-row d-flex meta-right no-padding justify-content-end">
                    <div class="user-meta">
                    <h4 class="text-white">{{$post_terbaru->author->name}}</h4>
                        <p>{{$post_terbaru->created_at->isoFormat('LLLL')}}</p>
                    </div>
                    <img class="img-fluid user-img" src="{{ asset('blogger/img/user.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->
