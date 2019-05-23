<?php $__env->startSection('title', 'Questionnaires'); ?>
<?php $__env->startSection('content'); ?>



<?php $__currentLoopData = $questionnaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $questionnaire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card uper">
  <div class="card-header">
  <?php echo e($questionnaire->title); ?>

</div>
<form method="post" action="<?php echo e(route('usersanswers.store', [$user_id = Auth::id()])); ?>">
<?php echo csrf_field(); ?>
<?php $__currentLoopData = $questionnaire->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<h3><?php echo e($question->question); ?></h3>

<?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(($answer->type) === 'MC'): ?>
<div>
  <input type="radio" id="<?php echo e($answer->id); ?>" name="<?php echo e($question->id); ?>" value="<?php echo e($answer->id); ?>">
  <label for="<?php echo e($answer->text); ?>"><?php echo e($answer->text); ?></label>
</div>

<?php elseif(($answer->type) === 'IF'): ?>
<input type="text" id="<?php echo e($answer->id); ?>" name="<?php echo e($question->id); ?>" style="margin:10px;" placeholder="Input field"><br>

<?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<button type="submit" value="submit" style="margin-top:10px; margin-bottom:10px;">Answer</button></form></div><br>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>