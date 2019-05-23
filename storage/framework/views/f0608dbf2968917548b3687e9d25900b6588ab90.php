<?php $__env->startSection('title', 'Edit Question'); ?>
<?php $__env->startSection('content'); ?>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Question
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
      <form method="post" action="<?php echo e(route('questionnaires.questions.update', [$question->questionnaire_id, $question->id])); ?>">
          <div class="form-group">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
              <label for="name">Title :</label>
              <input type="text" class="form-control" name="question" value="<?php echo e($question->question); ?>"/>
          </div>
          <button type="submit" style="margin-bottom: 5px;" class="btn btn-primary">Edit Question</button>
          <div class="links">
            <a href="<?php echo e(url()->previous()); ?>">Back</a>
          </div>
      </form>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>