<div class="single_widget search_widget">
    <div id="imaginary_container">
    {{-- <form action="{{url('category/'.$categories_now->id)}}"> --}}
        <div class="input-group stylish-input-group">
            <input type="text" name="title" class="form-control" placeholder="Search">
            <span class="input-group-addon">
                <button type="submit">
                    <span class="lnr lnr-magnifier"></span>
                </button>
            </span>
        </div>
    {{-- </form> --}}
    </div>
</div>

<div class="single_widget cat_widget">
    <h4 class="text-uppercase pb-20">post categories</h4>
    <ul>
        @foreach ($categories as $category)
             <li>
             <a href="{{url('category/'.$category->id)}}" style="cursor:pointer">{{$category->name}} <span>{{$category->post->count()}}</span></a>
            </li>
        @endforeach
    </ul>
</div>

<div class="single_widget recent_widget">
    <h4 class="text-uppercase pb-20">Recent Posts</h4>
    <div class="active-recent-carusel">
        <div class="item">
                <a href="{{url('read/'.$top_post[0]->id)}}">
            <img src="{{ asset('images/post/'.$top_post[0]->image_cover) }}" height="200px" width="200px" alt="">
        <p class="mt-20 title text-uppercase">{{$top_post[0]->title}}</p></a>
        </div>
        <div class="item">
                <a href="{{url('read/'.$top_post[1]->id)}}">
            <img src="{{ asset('images/post/'.$top_post[1]->image_cover) }}" height="200px" width="200px" alt="">
            <p class="mt-20 title text-uppercase">{{$top_post[1]->title}}</p></a>
        </div>
        <div class="item">
                <a href="{{url('read/'.$top_post[2]->id)}}">
            <img src="{{ asset('images/post/'.$top_post[2]->image_cover) }}" height="200px" width="200px" alt="">
           <p class="mt-20 title text-uppercase">{{$top_post[2]->title}}</p></a>
        </div>
    </div>
</div>
