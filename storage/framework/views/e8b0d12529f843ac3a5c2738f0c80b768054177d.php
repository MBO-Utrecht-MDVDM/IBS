<?php $__env->startSection('title', 'Users'); ?>
<?php $__env->startSection('content'); ?>
<div class="title m-b-md">
IBS
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Password</th>
      <th scope="col">Role</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
        <?php $users = DB::table('users')->get();
        foreach ($users as $user){
        ?>
        <tr>
            <th scope="row"><?php echo e($user->id); ?></th>
            <td><?php echo e($user->name); ?></td>
            <td><?php echo e($user->email); ?></td>
            <td><?php echo e($user->password); ?></td>
            <td><?php echo e($user->role); ?></td>
            <td><div class="links"><a href="<?php echo e(url('users/' . $user->id . '/edit')); ?>">Edit</a></div></td>
            <td> <?php echo Form::open(['method'=>'DELETE', 'route'=>['users.destroy',$user->id]]); ?>

                    <button data-toggle="tooltip" data-placement="top" title="Delete" type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                  <?php echo Form::close(); ?>

            </td>
        
        </tr>
        <?php } ?>
    </tbody>
</table>
<div class="links">
        <a href="<?php echo e(url('users/create')); ?>">Create User</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>