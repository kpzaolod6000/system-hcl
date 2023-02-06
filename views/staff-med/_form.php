<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\StaffMed $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="staff-med-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cod_staff_med')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_staff_med')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'max_q')->textInput() ?>

    <?= $form->field($model, 'q_issued')->textInput() ?>

    <?= $form->field($model, 'q_slope')->textInput() ?>

    <?= $form->field($model, 'id_prof')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'modified_by')->textInput() ?>

    <?= $form->field($model, 'modified_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
