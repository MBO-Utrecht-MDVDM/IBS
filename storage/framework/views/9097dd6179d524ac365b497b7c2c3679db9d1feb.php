<?php $__env->startSection('title', 'Edit Answer'); ?>
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
      </div><br>
    <?php endif; ?>
      <form method="post" action="<?php echo e(route('questionnaires.questions.answers.update', [$answer->questionnaire->id, $answer->question_id, $answer->id])); ?>">
          <div class="form-group">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
              <label for="name">Text :</label>
              <input type="text" class="form-control" name="text" value="<?php echo e($answer->text); ?>"/>
          </div>
          <div class="form-group">
          <label for="permissions">Type :</label>
            <div>
              <input type="radio" id="MC" name="type" value="MC" checked>
              <label for="MC">Multiple choice</label>
          </div>
          <div>
            <input type="radio" id="IF" name="type" value="IF">
            <label for="IF">Input field</label>
          </div>
          <button type="submit" style="margin-bottom: 5px;" class="btn btn-primary">Edit Question</button>
          <div class="links">
            <a href="<?php echo e(url()->previous()); ?>">Back</a>
          </div>
      </form>
  </div>
</div>
</div>
<h2 style="color:red;">Please note that your answer will not appear if you don't have a type selected</h2><br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>