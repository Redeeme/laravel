@extends('layouts.app')

@section('content')
<form action="{{route('update')}}" method="post">
    @csrf
<input type="hidden" name="cid" value="{{$Info->id}}">
<div class = "col-md-6 col-md-offset-3" style="margin-top:50px">
    <h5>{{$Title}}</h5>
    <div class="form group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{$Info->name}}">
        <span style="color:red">@error('name'){{$message}} @enderror</span>
    </div>
    <div class="form group">
        <label for="">email</label>
        <input type="text" class="form-control" name="email" placeholder="Enter email" value="{{$Info->email}}">
        <span style="color:red">@error('email'){{$message}} @enderror</span>
    </div>
    <div class="form group">
        <button type ="submit" class="btn btn-primary btn-block">UPDATE</button>
    </div>
</div>
</form>
@endsection
