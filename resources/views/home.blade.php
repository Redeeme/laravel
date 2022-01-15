@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/app.js') }}" defer></script>
                <h3>{{ __('Dashboard') }}</h3>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  <h3> {{ __('You are logged in!') }}</h3>
@endsection
