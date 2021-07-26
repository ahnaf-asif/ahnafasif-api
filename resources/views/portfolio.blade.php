@extends('layouts.app')

@section('content')
    <div class="container my-5 py-4">
        <h1 class="text-center">All Portfolio</h1>

        <p class="my-4">
            <a href="{{ route('portfolio.create') }}" class="btn btn-success">
                Create New Portfolio
            </a>
        </p>
        <ul class="list-group">
            @foreach($all_portfolio as $portfolio)
                
                <li class="list-group-item">
                    <a href="{{route('portfolio.show', ['portfolio' => $portfolio->id])}}" style="text-decoration: none;color:black">
                        <h2 class="font-weight-bold">{!! $portfolio->title !!}</h2>
                        <p><small>{{$portfolio->created_at->format('d M, Y')}}, {{$portfolio->category}}</small></p>
                        @if($portfolio->archive)
                            <p class="text-right font-italic">Added to archive</p>
                        @endif
                    </a>
                </li>
            @endforeach
        </ul>

    </div>
@endsection
