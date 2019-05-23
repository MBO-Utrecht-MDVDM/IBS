<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('content'); ?>

<div class="title m-b-md">
IBS
</div>
<div class="top-right links">
                <?php if(isset(Auth::user()->email)): ?>
                <a>Welcome back <?php echo e(Auth::user()->name); ?></a>
                <a href="<?php echo e(url('login/logout')); ?>">Logout</a>
                <?php endif; ?>
</div>
<div class="links">
    <?php if(!isset(Auth::user()->email)): ?>
    <a href="<?php echo e(url('login')); ?>">Login</a>
    <?php endif; ?>
    <?php if(isset(Auth::user()->email)): ?>
    <a href="<?php echo e(url('users')); ?>">Users</a>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>