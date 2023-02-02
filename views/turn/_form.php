<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Turn $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="turn-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_turn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hour_begin')->textInput() ?>

    <?= $form->field($model, 'hour_end')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'modified_by')->textInput() ?>

    <?= $form->field($model, 'modified_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
