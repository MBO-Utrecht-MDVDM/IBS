<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('content'); ?>

<!--
php artisan tinker
factory(App\User::class, 1)->create()
-->

<div class="title m-b-md">
IBS
</div>
<div class="top-right links">
                <?php if(isset(Auth::user()->email)): ?>
                <a><?php echo e(Auth::user()->email); ?></a>
                <a href="<?php echo e(url('login/logout')); ?>">Logout</a>
                <?php endif; ?>
</div>
<div class="links">
    <?php if(!isset(Auth::user()->email)): ?>
    <a href="<?php echo e(url('login')); ?>">Login</a>
    <?php endif; ?>
    <?php if(Auth::check() && Auth::user()->role == 'admin'): ?>
    <a href="<?php echo e(url('users')); ?>">Users</a>
    <a href="<?php echo e(url('questionnaires')); ?>">Questionnaires</a>
    <?php endif; ?>
    <?php if(Auth::check() && Auth::user()->role == 'user'): ?>
    <a href="<?php echo e(url('usersanswers')); ?>">Questionnaires</a>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>