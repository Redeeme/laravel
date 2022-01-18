@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/app.js') }}" defer></script>

    <div class="noveMenu">
        <div class="obsah">
            @foreach($latestBlogs as $latestBlog)
            <div class="karta">
                    <img src={{$latestBlog->uvodny_obrazok}}
                        class="responsive" alt="obrazok1" width="1200">
                    <a href="{{route('blog.show', $latestBlog->id)}}"><h3>{{$latestBlog->nazov}}</h3></a>
                <div class="obsahClanky">
                    <p>
                        {{$latestBlog->uvodny_text}}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
        <div class=menu>
            <h4>Popularne prispevky</h4>
            @foreach($randomBlogs as $randomBlog)
            <div class="karta">
                <div class="Popularne prispevky">
                    <a href="{{route('blog.show', $randomBlog->id)}}">
                    <img src={{$randomBlog->uvodny_obrazok}}class="responsive" alt="obrazok">
                    </a>
                </div>
            </div>
            @endforeach
            <div class="karta">
                <div class="O nas">
                    <h4>O nas</h4>
                    <p>"or one who avoids a pain that produces no resultant pleasure?"</p>
                </div>
            </div>
            <div class="karta">
                <div class="Sledujte ma na">
                    <a href="{{route('o_nas')}}">
                    <img
                        src="https://images.hdqwalls.com/download/anime-in-nature-qhd-1600x900.jpg"
                        alt="obrazok8" class="responsive" height="560" width="1000">
                    </a>
                    <h4>Sledujte nas na</h4>
                    <a href="#">facebook</a><br>
                    <a href="#">instagram</a><br>
                    <a href="#">twitter</a>
                </div>
            </div>
        </div>
    </div>
@endsection
