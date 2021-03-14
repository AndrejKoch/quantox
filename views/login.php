<?php
/** @var $model \app\models\User */
?>

<div class="container d-flex justify-content-center text-center">
    <h1 class="mt-4">Login</h1>
</div>


<div class="container d-flex justify-content-center">

    <?php $form = \app\core\form\Form::begin('', "post") ?>
    <div class="row mt-4">
        <?php echo $form->field($model, 'email') ?>
    </div>
    <div class="row mt-4">
        <?php echo $form->field($model, 'password')->passwordField() ?>
    </div>

    <div class="text-center">
    <button type="submit" class="mt-4 btn btn-primary">Login</button>
    </div>
    <?php echo \app\core\form\Form::end() ?>
</div>