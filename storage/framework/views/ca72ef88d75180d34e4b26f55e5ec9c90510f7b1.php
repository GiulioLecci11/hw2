
<?php $__env->startSection('title','Login'); ?>
<?php $__env->startSection('style','../public/style/login.css'); ?>
<?php $__env->startSection('script','../public/scripts/login.js'); ?>
<?php $__env->startSection('content'); ?>
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
                    <input type="text" class="input-field"  id= "username" name="username" value="<?php echo e(old('username')); ?>">
                    <label class="input-label"> Username</label>
                </div>
                <div class="input">
                    <input type="password" class="input-field" id="password" name="password" value="<?php echo e(old('password')); ?>">
                    <label class="input-label">Password</label>
                    <img id="showpass" src="../public/imgs/eye.png">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                </div>
                <div class="action">
                    <input type="submit" class="action-button"></button>
                </div>
            </form>
            <div id="error">
            </div>
            <div> 
            <?php if(Session::get('err')): ?>
            <?php echo e(Session::get('err')); ?>

            <?php endif; ?>
            </div>
            <div class="card-info">
                <p>Se non possiedi ancora un account effettua <a href="signin">QUI</a> la tua registrazione</p>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.log', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hw2\resources\views/login.blade.php ENDPATH**/ ?>