<?php $__env->startSection('title', 'Questionnaires'); ?>
<?php $__env->startSection('content'); ?>
<div class="title m-b-md">
Questionnaire overview
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
        <?php $questionnaires = DB::table('questionnaires')->get();
        foreach ($questionnaires as $questionnaire){
        ?>
        <tr>
            <th scope="row"><?php echo e($questionnaire->id); ?></th>
            <td><div class="links"><a><?php echo e($questionnaire->title); ?></a></div></td>
            <td><div class="links"><a href="<?php echo e(url('questionnaires/' . $questionnaire->id . '/questions')); ?>">View Questions</a></div></td>
            <td><div class="links"><a href="<?php echo e(url('questionnaires/' . $questionnaire->id . '/edit')); ?>">Edit Title</a></div></td>
            <td> 
              <form action="<?php echo e(route('questionnaires.destroy', [$questionnaire->id])); ?>" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <input type="submit" class="btn btn-xs btn-danger" value="Delete" onclick="return confirm('Are you sure you want to delete this questionnaire?')">
                </form>
            </td>
        
        </tr>
        <?php } ?>
    </tbody>
</table>
<div class="links">
        <a href="<?php echo e(url('questionnaires/create')); ?>">Create Questionnaire</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>