@extends('layouts.app')

@section('content')
    <!-- main -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <div class="container">
        <div class="col justify-content-md-center">
            <div class="container">
                <img src="{{asset($blog->uvodny_obrazok)}}" alt="Snow" style="width:100%;">
                <div class="centered">
                    <h6>{{$blog->nazov}}</h6>
                    <h6>Written By {{$blog->autor}}</h6>
                </div>
            </div>
            <div class="obsahClanky">
                <p>{!!$blog->uvodny_text !!}</p>
                <p>{!!$blog->kontent!!}</p>

                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <div class="card">
                        <div class="card-header">Add new Comment</div>
                        <div class="card-body">
                            <form action="{{route('comments.add',$blog->id)}}" method=post>
                                @csrf
                                <div class="form-group">
                                    <label for="">comment</label>
                                    <label>
                                        <input type="text" class="form-control" name="comment" placeholder="enter comment">
                                    </label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn-block btn-success">Add comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endguest
                <table class="table table-hover">
                    <thead>
                    <th>nazov uzivatela</th>
                    <th>koment</th>
                    <th>datum pridania</th>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td></p>{{$comment->name}}</p></td>
                            <td><p>{{$comment->comment}}</p></td>
                            <td><p>{{$comment->created_at}}</p></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if(Auth::id()==1)
            <a href="{{ route('admin.delete',$blog->id) }}">vymazanie clanku</a>
            <a href="{{ route('admin.edit',$blog->id) }}">editovanie clanku</a>
            @endif
        </div>

@endsection
