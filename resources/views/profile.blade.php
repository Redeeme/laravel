@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <div class="page_content">
        <div class="col-md-4" >
            <div class="card">
                <div class="card-header">Uprava profilu</div>
                <div class="card-body">
                    <form action="{{route('profile.update')}}" method="post">
                        @csrf
                        <input type="hidden" name="cid" value="{{$user->id}}">
                        <div class="col-md-6 col-md-offset-3" style="margin-top:50px">
                            <div class="form group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{$user->name}}">
                                <span style="color:red">@error('name'){{$message}} @enderror</span>
                            </div>
                            <div class="form group">
                                <label for="">email</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter email" value="{{$user->email}}">
                                <span style="color:red">@error('email'){{$message}} @enderror</span>
                            </div>
                            <div class="form group">
                                <button type="submit" class="btn btn-primary btn-block" id="update_button">UPDATE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
        <table class="table table-hover">
            <thead>
            <th>comment</th>
            <th>update</th>
            <th>delete</th>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td style="width: 80%">
                        {{$comment->comment}}
                    </td>
                    <td style="width: 10%">
                        <form action="{{ route('update.comment',$comment->id) }}" method="post">
                            @csrf
                            <label>
                                <input type="text" class="form-control" name="comment" placeholder="new comment" value="{{$comment->comment}}">
                            </label>
                            <span style="color:red">@error('comment'){{$message}} @enderror</span>
                            <button type="submit" class="btn btn-primary btn-block">UPDATE</button>
                        </form>
                    </td>
                    <td style="width: 10%">
                        <a href="{{ route('comments.delete',$comment->id) }}" class="btn btn-danger btn-xs">Delete Comment</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            <div class="btn-group">
                <div class="btn btn-danger btn-xs" id="delete_button">Delete Account</div>
            </div>
        </div>
    </div>
    <script>
        $("#update_button").click(function(){
            if(confirm("Are you sure you want to update your profile?")){
                $("#update_button").attr("href", "{{route('profile.update')}}");
            }
            else{
                return false;
            }
        });
        $("#delete_button").click(function(){
            if(confirm("Are you sure you want to delete your profile?")){
                $("#delete_button").attr("href", "{{route('profile.delete')}}");
            }
            else{
                return false;
            }
        });
    </script>
@endsection
