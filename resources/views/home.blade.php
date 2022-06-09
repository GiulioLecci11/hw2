    <head>
    <script>
            const BASE_URL="{{ url('/home') }}";
        </script>
    </head>
@extends('layouts.feed')
@section('title','Home')
@section('style','../public/style/home.css')
@section('script','../public/scripts/home.js')
@section('content')
    <section id="modal-view" class="hidden">
        <div class="container">
            <form name='text_form' method='post' autocomplete="off">
                 <img id="x" src="imgs/x.jpg">
                    <input id="text" type='textarea' name='text' placeholder="Scrivi il tuo post..">
                <p>
                    <label>&nbsp;<input type='submit' class="action-button"></label>
                </p>
            </form>
        </div>
    </section>
    <header>
            <nav>
            <div class="l_nav">
            <h1>JustWrite</h1>
              <a href="#">Home</a>
              <a href="logout">Logout</a><br><br>
          </div>
                <div class="r_nav">
                    <a href="prefer">Aggiungi utenti ai preferiti</a>
                    <a href="#" id="createPost">Nuovo post</a>
                    <div id="menu" class='menu'>
                    <div></div>
                    <div></div>
                    <div></div>
                    </div>
                    <div class='hidden' id='show_menu'>
                    <a href="home">Home </a>
                    <a href="prefer">Preferiti</a>
                    <a href="logout">Logout</a>
                    <div id='close_menu'>Close menu ✖</div>
                    </div>
                </div>
            </nav>
        </header>

        <main>
            <!-- poi mi copio questo e lo modifico-->
        <template id="post_template">
                    <article class="post">
                        <div class="userinfo">
                            <div class="avatar">
                                <img src="">
                            </div>
                            <div class="names">
                                <a href="#">
                                <div class="username"></div>
                                </a>
                            </div>
                            <div class="time"></div>
                        </div>
                        <div class="content"></div>
                        <div class="text"></div>
                        <div class="actions">
                            <div class="elimina"></div>
                        </div>
                    </article>
                </template>
            <section id="feed">
            </section>
        </main>
        <section id="posts"></section>
        <section id="tracks"></section>
@endsection