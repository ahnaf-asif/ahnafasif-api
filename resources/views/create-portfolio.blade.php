@extends('layouts.app')

@section('content')

<div class="container my-4 py-4" style="background: white;">
    <h1 class="text-center my-3">
        Create Portfolio
    </h1>
    <form action="{{route('portfolio.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cover_pic">Cover Pic</label>
            <input type="text" id="cover_pic" name="cover_pic" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cover_pic">Portfolio Link</label>
            <input type="text" id="link" name="link" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="short_description">Short Description</label>
            <textarea class="form-control" name="short_description" id="short_description"  rows="6" required></textarea>
        </div>
        <div class="form-group">
            <label for="blog">Long Description</label>
            <textarea class="trumbowyg" name="long_description" id="long_description"  rows="20" required></textarea>
        </div>
        <div class="text-center">
            <input class="btn btn-success" type="submit" value="submit">
        </div>
    </form>
</div>

@endsection
