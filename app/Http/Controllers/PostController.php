<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Category;
use App\PostCategory;
use App\User;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(8);
        $dualima = Post::where('id', 25)->first();

        return view('post.index', compact('posts', 'dualima'));
    }

    public function create()
    {
        $categories = Category::all();
        $users = User::all();

        return view('post.create', compact('categories', 'users'));
    }

    public function store(PostRequest $request)
    {
        $input = $request->all();

        if (Input::file('cover') !== NULL) {
            $image_upload = Input::file('cover');
            $extension = $image_upload->getClientOriginalExtension();
            $new_image_name = 'post-'. time() .'.'. $extension;

            $img_path = public_path('images/post');
            $image_upload->move($img_path, $new_image_name);
            $input['image_cover'] = $new_image_name;
        }

        $save = Post::create($input);

        $category_data = [];
        foreach ($input['categories'] as $category_id) {
            $category_data[] = [
                'post_id' => $save->id,
                'category_id' => $category_id
            ];
        }

        $save_category = PostCategory::create($category_data);

        if ($save_category) {
            return redirect('/admin/posts')->with('success', 'Berhasil menambah postingan baru.');
        }

        return redirect()->back()->with('error', 'Gagal menambah postingan!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $users = User::all();
        $category_data=[];
        foreach ($post->categories as $category) {
            $category_data[] = $category->id;
        }
        return view('post.edit', compact('post','category_data','categories', 'users'));
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        PostCategory::where('post_id',$id)->get();
        $image_cover = $post->image_cover;

        if ($request->cover) {
            if ($post->image_cover && file_exists(public_path('images/post/'.$post->image_cover))) {
                File::delete(public_path('/images/post/'.$post->image_cover));
            }
            $image_upload = Input::file('cover');
            $extension = $image_upload->getClientOriginalExtension();
            $new_image_name = 'post-'. time() .'.'. $extension;
            $img_path = public_path('images/post');
            $image_upload->move($img_path, $new_image_name);
            $image_cover = $new_image_name;
        }
       $post->update([
            'author_id' => $request->author_id,
            'title' => $request->title,
            'content' => $request->content,
            'is_draft' => $request->is_draft,
            'image_cover' => $image_cover,
        ]);

        // $category_data = [];
        // foreach ($request->categories as $category_id) {
        //     $category_data[] = [
        //         'post_id' => $update->id,
        //         'category_id' => $category_id
        //     ];
        // }

       $update_category = $post->categories()->sync($request->categories);
        // $update_category = $post_category->update($category_data);

        if ($update_category) {
            return redirect('/admin/posts')->with('success', 'Berhasil mengubah postingan.');
        }

        return redirect()->back()->with('error', 'Gagal mengubah postingan!');
    }

    public function destroy($id)
    {
        $delete = Post::where('id',$id)->first();
        File::delete(public_path('/images/post/'.$delete->image_cover));

        PostCategory::where('post_id',$id)->delete();
        $delete->delete();


        if ($delete) {
            return redirect('/admin/posts')->with('success', 'Berhasil menghapus postingan.');
        }

        return redirect()->back()->with('error', 'Gagal menghapus postingan!');
    }
}
