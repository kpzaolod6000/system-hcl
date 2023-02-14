<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\StaffMedSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="staff-med-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cod_staff_med') ?>

    <?= $form->field($model, 'name_staff_med') ?>

    <?= $form->field($model, 'max_q') ?>

    <?= $form->field($model, 'q_issued') ?>

    <?php // echo $form->field($model, 'q_slope') ?>

    <?php // echo $form->field($model, 'id_prof') ?>

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
