<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = $request->all();
        if (Input::file('cover_image') !== NULL) {
            $image_upload = Input::file('cover_image');
            $extension = $image_upload->getClientOriginalExtension();
            $new_image_name = 'categories-'. time() .'.'. $extension;

            $img_path = public_path('images/categories');
            $image_upload->move($img_path, $new_image_name);
            $category['cover_image'] = $new_image_name;
        }

        $save = Category::create([
            'name' => $category['name'],
            'description' => $category['description'],
            'cover_image' => $category['cover_image'],
        ]);

        if ($save) {
            return response()->json([
                'success' => true,
                'type' => 'add',
                'message' => 'Berhasil menambah kategori baru'
            ]);
        }

        return response()->json([
            'success' => false,
            'type' => 'add',
            'message' => 'Gagal menambah kategori!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('id',$id)->first();

        return response()->json([
            'success' => true,
            'name' => $category->name,
            'description' => $category->description,
            'images' => $category->cover_image,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        $cover_image = $category->cover_image;

        if ($request->cover_image) {
            if ($category->cover_image && file_exists(public_path('images/categories/'.$category->cover_image))) {
                File::delete(public_path('/images/categories/'.$category->cover_image));
            }
            $image_upload = Input::file('cover_image');
            $extension = Input::file('cover_image')->getClientOriginalExtension();
            $new_image_name = 'categories-'. time() .'.'. $extension;
            $img_path = public_path('images/categories');
            $image_upload->move($img_path, $new_image_name);
            $cover_image = $new_image_name;
        }

        $update = $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'cover_image' => $cover_image,
        ]);

        if ($update) {
            return response()->json([
                'success' => true,
                'type' => 'update',
                'id' => $id,
                'message' => 'Berhasil mengubah data kategori'
            ]);
        }

        return response()->json([
            'success' => false,
            'type' => 'update',
            'message' => 'Gagal mengubah data kategori!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Category::where('id', $id)->first();
        File::delete(public_path('/images/categories/'.$delete->cover_image));
        $delete->delete();


        if ($delete) {
            return response()->json([
                'success' => true,
                'id' => $id,
                'message' => 'Berhasil menghapus data kategori'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Gagal menghapus data kategori!'
        ]);
    }
}
