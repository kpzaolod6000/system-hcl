<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;
use kartik\builder\Form;

/* @var yii\web\View $this */
/* @var app\models\StaffMed $model */
/* @var yii\widgets\ActiveForm $form */
?>

<div class="staff-med-form">

    <?php $form = ActiveForm::begin(); ?>
</div>

    <div id='staff-med'></div>
    <?php 
    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>2,
        'attributes'=>[
            'cod_staff_med'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el codigo del médico']],
            'name_staff_med'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el nombre del médico']],     
            'max_q'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el numero maximo de cupos']],
            'q_issued'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba la cantidad de cupos a emitir']],
            'q_slope'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'...']],
            'id_prof'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'...']],
            //'created_by'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'...']],
            //'created_date'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'...']],
            //'modified_by'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'...']],
            //'modified_date'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'...']],
        ]
    ]);    
    ?>

    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('staff_med', 'Guardar') : Yii::t('staff_med', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>