<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;
use kartik\builder\Form;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Patient $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="patient-form">

    <?php $form = ActiveForm::begin(); ?>


    <?php 
    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>2,
        'attributes'=>[
            'type_doc'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el tipo de documento del paciente']],
            'nro_doc'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el número de documento del paciente']],
            'name'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el nombre del paciente']],
            'last_name'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el apellido paterno del paciente']],
            'last_name_m'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el apellido materno del paciente']],
            'gender'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el género del paciente']],
            'birth_date'=>['type'=>Form::INPUT_WIDGET,
                        'widgetClass' => DatePicker::class,
                        'options' => [
                        'options' => ['placeholder' => 'Selecciona una fecha'],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true,
                        ]
                    ]
            ],
            'clinic_history'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el número de historia clínica del paciente']],
        ]
    ]);    
    ?>

    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('patient', 'Guardar') : Yii::t('patient', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
