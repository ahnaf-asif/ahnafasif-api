@extends('layouts.app')

@section('content')
<div class="container my-4 py-4" style="background: white;">
    <form action="{{route('blog.update', ['blog' => $blog->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT" />
        <div class="form-group">
            <label for="title">Title</label>
            <input value="{!! $blog->title !!}" type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <input value="{!! $blog->category !!}" type="text" id="category" name="category" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="thumbnail_image">Thumbnail</label>
            <input value="{!! $blog->thumbnail_image !!}" type="text" id="thumbnail_image" name="thumbnail_image" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cover_pic">Cover Pic</label>
            <input value="{!! $blog->cover_pic !!}" type="text" id="cover_pic" name="cover_pic" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="short_description">Short Description</label>
            <textarea class="form-control" name="short_description" id="short_description"  rows="6" required>{!! $blog->short_description !!}</textarea>
        </div>
        <div class="form-group">
            <label for="blog">Blog</label>
            <textarea class="trumbowyg" name="blog" id="blog"  rows="20" required>
                {!! $blog->blog !!}
            </textarea>
        </div>
        <div class="text-center">
            <input class="btn btn-success" type="submit" value="submit">
        </div>
    </form>
</div>
@endsection