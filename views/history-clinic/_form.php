<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\HistoryClinic $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="history-clinic-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nro_history_clinic')->textInput() ?>

    <?= $form->field($model, 'date_entry')->textInput() ?>

    <?= $form->field($model, 'addres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nro_phone')->textInput() ?>

    <?= $form->field($model, 'profession')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ocupation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'religion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'procedence')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_type_sure')->textInput() ?>

    <?= $form->field($model, 'id_marital_status')->textInput() ?>

    <?= $form->field($model, 'id_instruction_grade')->textInput() ?>

    <?= $form->field($model, 'id_patient')->textInput() ?>

    <?= $form->field($model, 'id_patient_comp')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'modified_by')->textInput() ?>

    <?= $form->field($model, 'modified_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
