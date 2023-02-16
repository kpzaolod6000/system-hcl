<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;
use kartik\builder\Form;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Fua $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="fua-form">
    <?php $form = ActiveForm::begin(); ?>
</div>

    <!-- <?= $form->field($model, 'type_doc')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'nro_doc')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'nro_hcl')->textInput() ?>
    <?= $form->field($model, 'cod_sure')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'date_attention')->textInput() ?>
    <?= $form->field($model, 'nro_ref')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'id_ipress')->textInput() ?> -->

    <div id='fua'></div>
     <?php 
    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>2,
        'attributes'=>[
            'type_doc'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el tipo de documento']],
            'nro_doc'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el número de documento']],
            'nro_hcl'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el número de historia clínica']],
            'cod_sure'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el código de seguro']],
            'date_attention'=>['type'=>Form::INPUT_WIDGET,
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
            'nro_ref'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el número de referencia']],
            'id_ipress'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el código IPRESS']],
        ]
    ]);    
    ?>

    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('fua', 'Guardar') : Yii::t('fua', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


