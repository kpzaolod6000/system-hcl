<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CuposSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cupos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'order') ?>

    <?= $form->field($model, 'phone') ?>

    <?= $form->field($model, 'datte_attention') ?>

    <?= $form->field($model, 'last_attention') ?>

    <?php // echo $form->field($model, 'reference') ?>

    <?php // echo $form->field($model, 'nro_receipt') ?>

    <?php // echo $form->field($model, 'receipt') ?>

    <?php // echo $form->field($model, 'ip') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'id_history_clinic') ?>

    <?php // echo $form->field($model, 'id_patient') ?>

    <?php // echo $form->field($model, 'id_programation') ?>

    <?php // echo $form->field($model, 'id_services') ?>

    <?php // echo $form->field($model, 'id_staff_med') ?>

    <?php // echo $form->field($model, 'id_fua') ?>

    <?php // echo $form->field($model, 'type_sure') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'modified_by') ?>

    <?php // echo $form->field($model, 'modified_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reiniciar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
