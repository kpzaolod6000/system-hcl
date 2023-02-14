<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\HistoryClinicSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="history-clinic-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nro_history_clinic') ?>

    <?= $form->field($model, 'date_entry') ?>

    <?= $form->field($model, 'addres') ?>

    <?= $form->field($model, 'nro_phone') ?>

    <?php // echo $form->field($model, 'profession') ?>

    <?php // echo $form->field($model, 'ocupation') ?>

    <?php // echo $form->field($model, 'religion') ?>

    <?php // echo $form->field($model, 'procedence') ?>

    <?php // echo $form->field($model, 'id_type_sure') ?>

    <?php // echo $form->field($model, 'id_marital_status') ?>

    <?php // echo $form->field($model, 'id_instruction_grade') ?>

    <?php // echo $form->field($model, 'id_patient') ?>

    <?php // echo $form->field($model, 'id_patient_comp') ?>

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
