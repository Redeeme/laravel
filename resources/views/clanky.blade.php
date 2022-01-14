@extends('layouts.app')

@section('content')
<div class="obsahClanky">
    <div class="description">
        <img src="https://www.lrswebsolutions.com/Resources/a5f67cd8-9851-4cf4-9228-0756ca94983c/alt-text-lead.jpg"
             class="responsiveR" alt="img123" height="200" width="450">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam at ligula suscipit, iaculis ipsum quis,
            fringilla
            nisi. Sed dapibus placerat lorem. Praesent vel blandit velit. Aliquam molestie nulla vitae sapien eleifend,
            at
            ultrices elit efficitur. Nulla sed sollicitudin purus. Sed a ultrices metus, eu tincidunt risus. Etiam
            aliquet
            ligula a mauris eleifend tempus. Pellentesque tristique dolor vel sem dictum, sed pharetra nisi laoreet.
            Aliquam
            semper lobortis nulla sit amet ultricies. Quisque et pretium diam. Quisque non venenatis risus.
        </p>
        <table class="table table-hover">
            <thead>
            <th>nazov</th>
            <th>autor</th>
            <th>datum</th>
            </thead>
            <tbody>
            @foreach($blogy as $item)
                <tr>
                    <td>
                        <form action="{{route('crete')}}" method="post">
                            {{$item->nazov}}
                        </form>
                    </td>
                    <td>{{$item->autor}}</td>
                    <td>{{$item->datum}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
