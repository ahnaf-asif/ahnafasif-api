@extends('layouts.app')

@section('content')
<div class="container my-4 py-4" style="background: white;">
    <form action="{{route('portfolio.update', ['portfolio' => $portfolio->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT" />
        <div class="form-group">
            <label for="title">Title</label>
            <input value="{!! $portfolio->title !!}" type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cover_pic">Cover Pic</label>
            <input value="{!! $portfolio->cover_pic !!}" type="text" id="cover_pic" name="cover_pic" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="link">Portfolio Link</label>
            <input value="{!! $portfolio->link !!}" type="text" id="link" name="link" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="short_description">Short Description</label>
            <textarea class="form-control" name="short_description" id="short_description"  rows="6" required>{!! $portfolio->short_description !!}</textarea>
        </div>
        <div class="form-group">
            <label for="long_description">Long Description</label>
            <textarea class="trumbowyg" name="long_description" id="long_description"  rows="20" required>
                {!! $portfolio->long_description !!}
            </textarea>
        </div>
        <div class="text-center">
            <input class="btn btn-success" type="submit" value="submit">
        </div>
    </form>
</div>
@endsection