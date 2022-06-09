    <head>
    <script>
            const BASE_URL="<?php echo e(url('/signin')); ?>";
        </script>
    </head>

<?php $__env->startSection('title','Signin'); ?>
<?php $__env->startSection('style','../public/style/signin.css'); ?>
<?php $__env->startSection('script','../public/scripts/signin.js'); ?>

<?php $__env->startSection('content'); ?>
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
                    <input type="text" class="input-field" name="username" value="<?php echo e(old('username')); ?>">
                    <label class="input-label"> Username</label>
                    <span></span>
                </div>
                <div class="input email">
                    <input type="text" class="input-field" name="email" value="<?php echo e(old('email')); ?>">
                    <label class="input-label">Email</label>
                    <span></span>
                </div>
                <div class="input password">
                    <input type="password" class="input-field" id="password" name="password" value="<?php echo e(old('password')); ?>">
                    <label class="input-label">Password</label>
                    <img id="showpass" src="../public/imgs/eye.png">
                    <span></span>
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
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
            <?php if(Session::get('err')): ?>
            <?php echo e(Session::get('err')); ?>

            <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.log', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hw2\resources\views/signin.blade.php ENDPATH**/ ?>