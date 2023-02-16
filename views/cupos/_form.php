<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;
use kartik\builder\Form;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Cupos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cupos-form">
    <?php $form = ActiveForm::begin(); ?>
</div>

    <!-- <?= $form->field($model, 'order')->textInput() ?>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'datte_attention')->textInput() ?>
    <?= $form->field($model, 'last_attention')->textInput() ?>
    <?= $form->field($model, 'reference')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'nro_receipt')->textInput() ?>
    <?= $form->field($model, 'receipt')->textInput() ?>
    <?= $form->field($model, 'ip')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model, 'id_history_clinic')->textInput() ?>
    <?= $form->field($model, 'id_patient')->textInput() ?>
    <?= $form->field($model, 'id_programation')->textInput() ?>
    <?= $form->field($model, 'id_services')->textInput() ?>
    <?= $form->field($model, 'id_staff_med')->textInput() ?>
    <?= $form->field($model, 'id_fua')->textInput() ?>
    <?= $form->field($model, 'type_sure')->textInput() ?> -->

    <div id='cupos'></div>
     <?php 
    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>2,
        'attributes'=>[
            'order'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Número de orden']],
            'phone'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el número de celular']],
            'datte_attention'=>['type'=>Form::INPUT_WIDGET,
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
            'last_attention'=>['type'=>Form::INPUT_WIDGET,
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
            'reference'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el número de referencia']],
            'nro_receipt'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el número de recibo']],
            'receipt'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el recibo']],
            'ip'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el código']],
            'status'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el estado']],
            'id_history_clinic'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Número de historia clínica']],
            'id_patient'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Número de documento del paciente']],
            'id_programation'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Número de programación']],
            'id_services'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Número de servicio']],
            'id_staff_med'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Código del personal médico']],
            'id_fua'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Código de FUA']],
            'type_sure'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el tipo de seguro']],
        ]
    ]);    
    ?>

    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('cupos', 'Guardar') : Yii::t('cupos', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>