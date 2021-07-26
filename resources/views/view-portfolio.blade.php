@extends('layouts.app')

@section('content')
    <div class="container my-5 py-4">
        <div class="row">
            <div class="col-md-8">
                <h1 class="font-weight-bold text-center">{!! $portfolio->title !!} </h1>
                <p class="text-center"><small>{{$portfolio->created_at->format('d M, Y')}} , {{$portfolio->category}}</small></p>
                <hr>
                <p>Portfolio Link: <a target="_blank" href="{{$portfolio->link}}">{{$portfolio->link}}</a></p>
                <hr>
                <div class="short-desc">
                    {!! $portfolio->short_description !!}
                </div>
                <hr>
                
                <div class="coverpic mt-3">
                    <img src="{{ $portfolio->cover_pic }}" alt="cover pic" style="width:100%;">
                </div>
                <hr>
                <div class="desc">
                    {!! $portfolio->long_description !!}
                </div>
            </div>
            <div class="col-md-4">
                <a href="{{route('portfolio.edit', [
                    'portfolio' => $portfolio->id
                ])}}" class="btn btn-primary" style="width:100%;">Edit</a>
                <br><br>
                @if($portfolio->archive)
                    <a href="{{route('portfolio.archive', [
                        'id' => $portfolio->id,
                        'type' => 0
                    ])}}" class="btn btn-danger" style="width:100%;">Remove Archive</a>
                @else
                    <a href="{{route('portfolio.archive', [
                        'id' => $portfolio->id,
                        'type' => 1
                    ])}}" class="btn btn-success" style="width:100%;">Add Archive</a>
                @endif
            </div>
        </div>
    </div>
@endsection