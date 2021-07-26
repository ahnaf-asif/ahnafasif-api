@extends('layouts.app')

@section('content')
    <div class="container my-5 py-4">
        <h1 class="text-center">All Blogs</h1>

        <p class="my-4">
            <a href="{{ route('blog.create') }}" class="btn btn-success">
                Create New Blog
            </a>
        </p>
        <ul class="list-group">
            @foreach($all_blogs as $blog)
                
                <li class="list-group-item">
                    <a href="{{route('blog.show', ['blog' => $blog->id])}}" style="text-decoration: none;color:black">
                        <h2 class="font-weight-bold">{!! $blog->title !!}</h2>
                        <p><small>{{$blog->created_at->format('d M, Y')}}, {{$blog->category}}</small></p>
                        @if($blog->archive)
                            <p class="text-right font-italic">Added to archive</p>
                        @endif
                    </a>
                </li>
            @endforeach
        </ul>

    </div>
@endsection
