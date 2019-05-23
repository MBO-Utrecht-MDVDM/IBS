<?php $__env->startSection('title', 'Answers'); ?>
<?php $__env->startSection('content'); ?>
<div class="title m-b-md">
Answers
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Type</th>
      <th scope="col">Data</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
        
        <?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($answer->id); ?></th>
            <td><div class="links"><a><?php echo e($answer->type); ?></a></div></td>
            <td><div class="links"><a><?php echo e($answer->text); ?></a></div></td>
            <td><div class="links"><a href="<?php echo e(route('questionnaires.questions.answers.edit', [$answer->questionnaire->id, $answer->question_id, $answer->id])); ?>">Edit</a></div></td>
            <td>
                <form action="<?php echo e(route('questionnaires.questions.answers.destroy', [$answer->questionnaire->id, $answer->question_id, $answer->id])); ?>" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <input type="submit" class="btn btn-xs btn-danger" value="Delete" onclick="return confirm('Are you sure you want to delete this answer?')">
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div class="links">
    <a href="<?php echo e(route('questionnaires.questions.index', $questionnaire_id)); ?>">Back to questions</a>
    <a href="<?php echo e(route('questionnaires.questions.answers.create', [$questionnaire_id, $question_id])); ?>">Add Answer</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>