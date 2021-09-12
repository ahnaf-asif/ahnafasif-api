<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request; 
use App\Http\Controllers\UploadImage;

class BlogController extends Controller
{

    public function index()
    {
        $all_blogs = Blog::select('id', 'title', 'created_at', 'archive', 'category')
                            ->orderBy('id', 'desc')->get();

        return view('blog', [
            'all_blogs' => $all_blogs
        ]);
    }


    public function create()
    {
        return view('create-blog');
    }

    public function store(Request $request)
    {
//        $thumbnail_image = UploadImage::uploadPictureToImgur($request->file('thumbnail_image'));
        //dd($request->file('thumbnail_image'));
        $new_blog = new Blog;
        $new_blog->title = $request->title;
        $new_blog->category = $request->category;
        $new_blog->thumbnail_image = $request->thumbnail_image;
        $new_blog->cover_pic = $request->cover_pic;
        $new_blog->short_description = $request->short_description;
        $new_blog->blog = $request->blog;

        $new_blog->save();
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $current_blog = Blog::find($id);
        return view('view-blog', [
            'blog' => $current_blog
        ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $current_blog = Blog::find($id);
        return view('edit-blog', [
            'blog' => $current_blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $current_blog = Blog::find($id);
        $current_blog->title = $request->title;
        $current_blog->category = $request->category;
        $current_blog->thumbnail_image = $request->thumbnail_image;
        $current_blog->cover_pic = $request->cover_pic;
        $current_blog->short_description = $request->short_description;
        $current_blog->blog = $request->blog;

        $current_blog->save();

        return redirect()->route('blog.show', ['blog' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function archive($id, $type){
        $current_blog = Blog::find($id);
        $current_blog->archive = $type;
        $current_blog->save();
        return redirect()->route('blog.show', ['blog' => $id]);
    }
}
