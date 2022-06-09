    <head>
    <script>
            const BASE_URL="<?php echo e(url('/prefer')); ?>";
        </script>
    </head>

<?php $__env->startSection('title','Prefer'); ?>
<?php $__env->startSection('style','../public/style/prefer.css'); ?>
<?php $__env->startSection('script','../public/scripts/prefer.js'); ?>

<?php $__env->startSection('content'); ?>
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
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.feed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hw2\resources\views/prefer.blade.php ENDPATH**/ ?>