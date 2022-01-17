@extends('layouts.app')

@section('content')
    <!-- main -->
    <div class="page_content">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <div class="container">
            <div class="col justify-content-md-center">
                <div class="container">
                    <h2>{{$blog->nazov}}</h2>
                    <h2>Written By {{$blog->autor}}</h2>
                </div>
                <div class="obsahClanky">
                    <p>{!!$blog->uvodny_text !!}</p>
                    <p>{!!$blog->kontent!!}</p>
                </div>
            </div>
        </div>
@endsection
