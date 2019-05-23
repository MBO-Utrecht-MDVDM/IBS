<?php $__env->startSection('title', 'Create User'); ?>
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
              <label for="email">E-mail :</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="password">Password :</label>
              <input type="password" class="form-control" name="password"/>
          </div>
          <div class="form-group">
              <label for="password">Repeat password :</label>
              <input type="password" class="form-control" name="password_confirmation"/>
          </div>
          <div class="form-group">
              <label for="permissions">Permissions :</label>
              <select name="role">
                <option value="user" selected>User</option>
                <option value="admin">Admin</option>
              </select>
          </div>
          <button type="submit" style="margin-bottom: 5px;" class="btn btn-primary">Create User</button>
          <div class="links">
            <a href="<?php echo e(url()->previous()); ?>">Back</a>
          </div>
      </form>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>