    <head>
    <script>
            const BASE_URL="{{ url('/prefer') }}";
        </script>
    </head>
@extends('layouts.feed')
@section('title','Prefer')
@section('style','../public/style/prefer.css')
@section('script','../public/scripts/prefer.js')

@section('content')
<header>
      <nav>
      <div class="l_nav">
            <h1>JustWrite</h1>
              <a href="home">Home</a>
              <a href="logout">Logout</a><br><br>
          </div>
          <div class="r_nav">
            <a href="home">Torna alla home</a>
            <div id="menu" class='menu'>
                    <div></div>
                    <div></div>
                    <div></div>
                    </div>
                    <div class='hidden' id='show_menu'>
                    <a href="home">Home </a>
                    <a href="logout">Logout</a>
                    <div id='close_menu'>Close menu ✖</div>
                    </div>
          </div>
      </nav>
</header>
<div class="container">
  <h2>Utenti iscritti</h2>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">Username</div>
      <div class="col col-2">Email</div>
      <div class="col col-3">Post creati</div>
      <div class="col col-4">Aggiungi ai Preferiti</div>
    </li>
    <section id="users">
  </section>
  </ul>
</div>           
<div class="container">
  <h2>I tuoi preferiti</h2>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">Username</div>
      <div class="col col-2">Email</div>
      <div class="col col-3">Post creati</div>
      <div class="col col-4">Rimuovi dai Preferiti</div>
    </li>
    <section id="prefe">
  </section>
  </ul>
</div>
@endsection



