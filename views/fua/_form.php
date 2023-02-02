<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Fua $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="fua-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_doc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nro_doc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nro_hcl')->textInput() ?>

    <?= $form->field($model, 'cod_sure')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_attention')->textInput() ?>

    <?= $form->field($model, 'nro_ref')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_ipress')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'modified_by')->textInput() ?>

    <?= $form->field($model, 'modified_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
