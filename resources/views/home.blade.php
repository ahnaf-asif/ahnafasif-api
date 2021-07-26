@extends('layouts.app')

@section('content')
<div class="container " >
    <div style="display: flex;align-items: center;justify-content: center; column-gap: 40px;">


        <a href="{{route('blog.create')}}" class="btn btn-success"
           style="
                height: 150px;
                width:150px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 25px;">
            <p>New<br> Blog</p>
        </a>
        <a href="{{route('portfolio.create')}}" class="btn btn-primary"
           style="
                height: 150px;
                width:150px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 25px;">
            <p>New Portfolio</p>
        </a>
    </div>

    <div class="contact-messages overflow-auto my-5">
        <h1 class="font-weight-bold text-center my-5">Contact Messages</h1>
        <table class="table table-bordered text-light bg-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th style="min-width: 120px;">Date</th>
                    <th style="min-width: 200px;">Name</th>
                    <th style="min-width: 200px;">Email</th>
                    <th style="min-width: 400px;">Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach($contacts as $con)
                    <tr>
                        <td>{{$i++}}</td>
                        <td  class="text-center" style="min-width: 120px;">{{$con->created_at->format('d M Y')}}</td>
                        <td  class="text-center" style="min-width: 120px;">{{$con->name}}</td>
                        <td  class="text-center" style="min-width: 120px;">{{$con->email}}</td>
                        <td style="min-width: 400px;">
                            {!! $con->message !!}
                        </td>
                        <td  class="text-center">
                            <a href="{{route('read.contact', ['id' => $con->id])}}" class="btn btn-danger">Mark Done</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
