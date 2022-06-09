@extends('layouts.log')
@section('title','Login')
@section('style','../public/style/login.css')
@section('script','../public/scripts/login.js')
@section('content')
        <div class="container">
        <div class="card">
            <div class="card-image">	
                <h2 class="card-heading">
                    Get in
                    <p class="small">Accedi al tuo account</p>
                    <p class="smaller">L'unico social dove nessuno può giudicarti</p>
                </h2>
            </div>
            <form class="card-form" name="form" method="post" autocomplete="off">
                <div class="input">
                    <input type="text" class="input-field"  id= "username" name="username" value="{{old('username')}}">
                    <label class="input-label"> Username</label>
                </div>
                <div class="input">
                    <input type="password" class="input-field" id="password" name="password" value="{{old('password')}}">
                    <label class="input-label">Password</label>
                    <img id="showpass" src="../public/imgs/eye.png">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="action">
                    <input type="submit" class="action-button"></button>
                </div>
            </form>
            <div id="error">
            </div>
            <div> 
            @if (Session::get('err'))
            {{Session::get('err')}}
            @endif
            </div>
            <div class="card-info">
                <p>Se non possiedi ancora un account effettua <a href="signin">QUI</a> la tua registrazione</p>
            </div>
        </div>
    </div>
    @endsection