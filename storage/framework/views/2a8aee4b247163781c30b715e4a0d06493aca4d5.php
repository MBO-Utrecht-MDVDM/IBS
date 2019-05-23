<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('content'); ?>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Create User
  </div>
  <div class="card-body">
    <?php if($errors->any()): ?>
      <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div><br />
    <?php endif; ?>
      <form method="post" action="<?php echo e(route('users.store')); ?>">
          <div class="form-group">
              <?php echo csrf_field(); ?>
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="price">E-mail :</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="quantity">Password :</label>
              <input type="password" class="form-control" name="password"/>
          </div>
          <div class="form-group">
              <label for="quantity">Repeat password :</label>
              <input type="password" class="form-control" name="password_confirmation"/>
          </div>
          <div class="form-group">
              <label for="quantity">Permissions :</label>
              <select name="role">
                <option value="admin">Admin</option>
                <option value="user">User</option>
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Create User</button>
      </form>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>