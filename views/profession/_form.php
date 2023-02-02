<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Profession $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profession-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_prof')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cod_col')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'modified_by')->textInput() ?>

    <?= $form->field($model, 'modified_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
