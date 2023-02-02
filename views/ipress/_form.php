<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Ipress $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ipress-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cod_ipress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'establishment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ubigeo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diresa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_red')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cod_microred')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'disa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'red')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'microred')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cod_ue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_ue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'modified_by')->textInput() ?>

    <?= $form->field($model, 'modified_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
