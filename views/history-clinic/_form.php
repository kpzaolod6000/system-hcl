<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;
use kartik\builder\Form;

/* @var yii\web\View $this */
/* @var app\models\HistoryClinic $model */
/* @var yii\widgets\ActiveForm $form */
?>

<div class="history-clinic-form">
    <?php $form = ActiveForm::begin(); ?>
</div>
    <div id='history-clinic'></div>
     <?php 
    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>2,
        'attributes'=>[
            'nro_history_clinic'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el número de la historia clínica']],
            'date_entry'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba la fecha de ingreso']],
            'addres'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba la dirección']],
            'nro_phone'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el numero de celular']],
            'profession'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba la profesion']],
            'ocupation'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba la ocupacion']],
            'religion'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba la religion']],
            'procedence'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba la procedencia']],
            'id_type_sure'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el tipo de seguro']],
            'id_marital_status'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el estado civil']],
            'id_instruction_grade'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el grado de instrucción']],
            'id_patient'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el número de documento del paciente']],
            'id_patient_comp'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el número de documento del acompañante']],
        ]
    ]);    
    ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>