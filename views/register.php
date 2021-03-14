<?php
/** @var $model \app\models\User */
?>

<h1 class="mt-4">Create an account</h1>


<?php $form = \app\core\form\Form::begin('', "post") ?>
<div class="row mt-4">
    <div class="col">
        <?php echo $form->field($model, 'firstname') ?>
    </div>
    <div class="col">
        <?php echo $form->field($model, 'lastname') ?>
    </div>
</div>
<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'password')->passwordField() ?>
<?php echo $form->field($model, 'confirmPassword')->passwordField() ?>



<?php

$cats = \app\models\Category::getCategories();
echo '<label>Select Type</label>';
echo '<br/>';
echo '<select class="form-select w-25" name="category_id">';
$space = "&nbsp;&nbsp;";

foreach ($cats as $cat) {
    if ($cat['parent_id'] == 0) {
        echo "<option value='" . $cat['id'] . "'>" . $cat['name'] . "</option>";
        foreach ($cats as $ca) {
            if ($ca['parent_id'] == $cat['id']) {
                echo "<option value='" . $ca['id'] . "'>" . $space . $ca['name'] . "</option>";
                foreach ($cats as $c) {
                    if ($c['parent_id'] == $ca['id']) {
                        echo "<option value='" . $c['id'] . "'>" . $space . $space . $c['name'] . "</option>";
                        foreach ($cats as $z) {
                            if ($z['parent_id'] == $c['id']) {
                                echo "<option value='" . $z['id'] . "'>" . $space . $space . $space . $z['name'] . "</option>";
                            }
                        }
                    }
                }
            }
        }
    }
}
echo '</select>';
?>


<button type="submit" class="mt-4 btn btn-primary">Submit</button>
<?php echo \app\core\form\Form::end() ?>
