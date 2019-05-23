<?php $__env->startSection('title', 'Questions'); ?>
<?php $__env->startSection('content'); ?>
<div class="title m-b-md">
Questions from Questionnaire: <?php echo e($questionnaire_id); ?>

</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Question</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
        
        <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($question->id); ?></th>
            <td><div class="links"><a><?php echo e($question->question); ?></a></div></td>
            <td><div class="links"><a href="<?php echo e(route('questionnaires.questions.edit', [$question->questionnaire_id, $question->id])); ?>">Edit</a></div></td>
            <td><div class="links"><a href="<?php echo e(route('questionnaires.questions.answers.index', [$question->questionnaire_id, $question->id])); ?>">View answers</a></div></td>
            <td>
                <form action="<?php echo e(route('questionnaires.questions.destroy', [$question->questionnaire_id, $question->id])); ?>" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <input type="submit" class="btn btn-xs btn-danger" value="Delete" onclick="return confirm('Are you sure you want to delete this question?')">
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<div class="links">
    <a href="<?php echo e(url('questionnaires')); ?>">Back to Questionnaires</a>
    <a href="<?php echo e(route('questionnaires.questions.create', $questionnaire_id)); ?>">Create Question</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>