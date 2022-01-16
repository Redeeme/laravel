@extends('layouts.app')

@section('content')
    <!-- main -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <div class="container">
        <div class="row">
            <div class="col">
                <h4>{{$blog->nazov}}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h4>Written By {{$blog->autor}}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <img src="{{asset($blog->uvodny_obrazok)}}" alt=""/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h4>{!!$blog->uvodny_text !!}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h4>{!!$blog->kontent!!}</h4>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Add new Comment</div>
            <div class="card-body">
                <form action="{{route('comments.add',$blog->id)}}" method=post>
                    @csrf
                    <div class="form-group">
                        <label for="">name</label>
                        <input type="text" class="form-control" name="name" placeholder="enter name">
                    </div>
                    <div class="form-group">
                        <label for="">comment</label>
                        <input type="text" class="form-control" name="comment" placeholder="enter comment">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-block btn-success">Add comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
        <th>nazov</th>
        <th>comment</th>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td>
                    <h5>{{$comment->name}}</h5>
                </td>
                <td>{{$comment->comment}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
