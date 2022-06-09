    <head>
    <script>
            const BASE_URL="{{ url('/signin') }}";
        </script>
    </head>
@extends('layouts.log')
@section('title','Signin')
@section('style','../public/style/signin.css')
@section('script','../public/scripts/signin.js')

@section('content')
    <body>    
    <div class="container">
        <div class="card">
            <div class="card-image">	
                <h2 class="card-heading">
                    Sign in
                    <p class="small">Crea il tuo account</p>
                    <p class="smaller">L'unico social dove nessuno può giudicarti</p>
                </h2>
            </div>
            <form class="card-form" method="post" autocomplete="off">
                <div class="input username">
                    <input type="text" class="input-field" name="username" value="{{old('username')}}">
                    <label class="input-label"> Username</label>
                    <span></span>
                </div>
                <div class="input email">
                    <input type="text" class="input-field" name="email" value="{{old('email')}}">
                    <label class="input-label">Email</label>
                    <span></span>
                </div>
                <div class="input password">
                    <input type="password" class="input-field" id="password" name="password" value="{{old('password')}}">
                    <label class="input-label">Password</label>
                    <img id="showpass" src="../public/imgs/eye.png">
                    <span></span>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="action">
                    <input type="submit" class="action-button"></button>
                </div>
            </form>
            <div class="card-info">
            <p>Registrandoti qui stai accettando i nostri <a href="#">Termini e Condizioni</a></p>
            <p>Se invece hai già un account <a href="login">Accedi</a></p>
            </div>
            <div id="error">
            @if (Session::get('err'))
            {{Session::get('err')}}
            @endif
            </div>
        </div>
    </div>
@endsection