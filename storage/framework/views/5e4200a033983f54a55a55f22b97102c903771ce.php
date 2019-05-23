<?php $__env->startSection('title', 'Create Question'); ?>
<?php $__env->startSection('content'); ?>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Question
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
      <form method="POST" action="<?php echo e(route('questionnaires.questions.store', $questionnaire_id)); ?>">
          <div class="form-group">
              <?php echo csrf_field(); ?>
              <label for="name">Question :</label>
              <input type="text" class="form-control" name="question"/>
          </div>
          <button type="submit" style="margin-bottom: 5px;" class="btn btn-primary">Add Question</button>
          <div class="links">
            <a href="<?php echo e(url()->previous()); ?>">Back</a>
          </div>
      </form>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>