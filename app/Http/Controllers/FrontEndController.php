<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\PostCategory;
use App\User;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();
        $top_post = Post::orderBy('created_at','desc')->paginate(4);

        $categories =  Category::all();
        $post_terbaru =  Post::orderBy('created_at','desc')->first();
        return view('frontend.index', compact('post','categories','post_terbaru','top_post'));

    }


    /**
     * Display a listing of the resource category.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($id)
    {
        $top_post = Post::orderBy('created_at','desc')->get();
        $categories = Category::all();
            $post_join = PostCategory::where('category_id',$id)->get();


        // }else{
        //     $key = $request->title;

        //     $post_join = \DB::table('post_categories')->join('posts','post_id','=','posts.id')->join('categories','category_id','=','categories.id')->select('posts.title','categories.name')->where('category_id',$id)->where('posts.title','like',"%$key%")->get();

        // }

        $categories_now= Category::where('id',$id)->first();

        return view('frontend.category',compact('post_join','categories','categories_now','top_post'));
    }

    /**
     * Display a listing of the search resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $top_post = Post::orderBy('created_at','desc')->get();
        $categories = Category::all();
        if ($request->title == null) {
           $posts = Post::orderBy('created_at','desc')->get();
        }else{
             $posts = Post::where('title','LIKE',"%$request->title%")->orderBy('created_at','desc')->get();
        }
        return view('frontend.search',compact('categories','posts','top_post'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $top_post = Post::orderBy('created_at','desc')->get();
        $post = Post::where('id',$id)->first();
         $tags = PostCategory::where('post_id',$id)->get();
        $categories = Category::all();

        // $author = User::where('id',$id)->first();
        return view('frontend.detail',compact('post','categories','tags','top_post'));
    }
}
