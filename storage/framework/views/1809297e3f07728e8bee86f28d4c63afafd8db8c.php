<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('content'); ?>
<div class="title m-b-md">
IBS
</div>



<div class="row">
    <form method="post" action="<?php echo e(url('login/checklogin')); ?>">
        <?php echo e(csrf_field()); ?>

        <input style="margin-bottom: 10px;" class="col-6" type="text" placeholder="E-mail" name="email">
        <input style="margin-bottom: 40px;" class="col-6" type="password" placeholder="Password" name="password">
        <?php if($message = Session::get('error')): ?>
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong><?php echo e($message); ?></strong>
    </div>
    <?php endif; ?>
    <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul>Credentials error:
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <br>
        <input type="submit" class="btn btn-primary" name="login" value="Login">
    </form>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>