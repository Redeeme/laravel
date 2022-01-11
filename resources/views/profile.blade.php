@extends('layouts.app')

@section('content')
<div class="card" style="width: 18rem;">
    <ul class="list-group list-group-flush">
        <div class = "btn-group">
            <a href="edit" class="btn btn-primary btn-xs">Edit Account</a>
            <a href="delete" class="btn btn-danger btn-xs">Delete Account</a>
        </div>
    </ul>
</div>
@endsection
