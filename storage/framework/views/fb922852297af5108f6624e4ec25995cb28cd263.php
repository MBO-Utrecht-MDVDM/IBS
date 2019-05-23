<?php $__env->startSection('title', 'Questionnaires'); ?>
<?php $__env->startSection('content'); ?>

<?php $__currentLoopData = $questionnaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $questionnaire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card uper">
  <div class="card-header">
  <?php echo e($questionnaire->title); ?>

</div>
<form action="<?php echo e(route('test.store', [$user->id, $answer->id])); ?>">

<?php $__currentLoopData = $questionnaire->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<h3><?php echo e($question->question); ?></h3>

<?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(($answer->type) === 'MC'): ?>
<div>
  <input type="radio" id="<?php echo e($answer->id); ?>" name="text" value="<?php echo e($answer->text); ?>">
  <label for="<?php echo e($answer->text); ?>"><?php echo e($answer->text); ?></label>
</div>

<?php elseif(($answer->type) === 'IF'): ?>
<input type="text" name="text" style="margin:10px;" placeholder="Input field">

<?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div><button type="submit" value="submit" style="margin-top:10px; margin-bottom:10px;">Answer</button></form>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>