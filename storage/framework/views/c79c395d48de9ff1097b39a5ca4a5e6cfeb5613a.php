<?php $__env->startSection('title', 'Register'); ?>
<?php $__env->startSection('content'); ?>

    
    <div class="title m-b-md">
    IBS
    </div>
    
    <div class="row">
        <form action="" method="post">
            <input style="margin-bottom: 10px;" class="col-6" type="text" placeholder="Name" name="name">
            <input style="margin-bottom: 10px;" class="col-6" type="text" placeholder="E-mail" name="email">
            <input style="margin-bottom: 40px;" class="col-6" type="password" placeholder="Password" name="password">
            <input style="margin-bottom: 10px;" class="col-6" type="hidden" placeholder="Remember_Token" name="remember_token">
            <input style="margin-bottom: 10px;" class="col-6" type="hidden" placeholder="Permissions" name="permissions" value="0">
        </form>
    </div>

    <div class="links">
        <a href="<?php echo e(url('login')); ?>">Register</a>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /opt/lampp/htdocs/IBS/resources/views/register.blade.php */ ?>