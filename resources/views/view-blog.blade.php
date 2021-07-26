@extends('layouts.app')

@section('content')
    <div class="container my-5 py-4">
        <div class="row">
            <div class="col-md-8">
                <h1 class="font-weight-bold text-center">{!! $blog->title !!} </h1>
                <p class="text-center"><small>{{$blog->created_at->format('d M, Y')}} , {{$blog->category}}</small></p>
                <hr>
                <div class="short-desc">
                    {!! $blog->short_description !!}
                </div>
                <hr>
                <div class="thumbnail">
                    <img src="{{ $blog->thumbnail_image }}" alt="thumbnail" style="width:100%;">
                </div>
                <div class="coverpic mt-3">
                    <img src="{{ $blog->cover_pic }}" alt="cover pic" style="width:100%;">
                </div>
                <hr>
                <div class="desc">
                    {!! $blog->blog !!}
                </div>
            </div>
            <div class="col-md-4">
                <a href="{{route('blog.edit', [
                    'blog' => $blog->id
                ])}}" class="btn btn-primary" style="width:100%;">Edit</a>
                <br><br>
                @if($blog->archive)
                    <a href="{{route('archive', [
                        'id' => $blog->id,
                        'type' => 0
                    ])}}" class="btn btn-danger" style="width:100%;">Remove Archive</a>
                @else
                    <a href="{{route('archive', [
                        'id' => $blog->id,
                        'type' => 1
                    ])}}" class="btn btn-success" style="width:100%;">Add Archive</a>
                @endif
            </div>
        </div>
    </div>
@endsection