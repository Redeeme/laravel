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
                <h4>{!!$blog->uvodny_text !!}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h4>{!!$blog->kontent!!}</h4>
            </div>
        </div>
    </div>
@endsection
