@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <div class="page_content">
        <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
                <div class="btn-group">
                    <a href="{{ route('edit') }}" class="btn btn-primary btn-xs">Edit Account</a>
                    <a href="{{ route('delete') }}" class="btn btn-danger btn-xs">Delete Account</a>
                </div>
            </ul>
        </div>
        <table class="table table-hover">
            <thead>
            <th>comment</th>
            <th>update</th>
            <th>delete</th>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->comment}}</td>
                    <td>
                        <form action="{{ route('update.comment',$comment->id) }}" method="post">
                            @csrf
                            <label>
                                <input type="text" class="form-control" name="comment" placeholder="new comment">
                            </label>
                            <span style="color:red">@error('comment'){{$message}} @enderror</span>
                            <button type="submit" class="btn btn-primary btn-block">UPDATE</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('comments.delete',$comment->id) }}" class="btn btn-danger btn-xs">Delete
                            Comment</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
