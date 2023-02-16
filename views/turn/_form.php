<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;
use kartik\builder\Form;
use kartik\widgets\DateTimePicker;

/* @var yii\web\View $this */
/* @var app\models\Turn $model */
/* @var yii\widgets\ActiveForm $form */
?>

<div class="turn-form">

    <?php $form = ActiveForm::begin(); ?>
</div>
    
    <div id='turn'></div>
    <?php 
    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>2,
        'attributes'=>[

            'name_turn'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el nombre de turno']],
            'hour_begin'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba la hora de inicio']],
            'hour_end'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba la hora de termino']],
            //'created_by'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'...']],
            //'created_date'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'...']],
            //'modified_by'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'...']],
            //'modified_date'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'...']],
        ]
    ]);
    
    ?>

    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('turn', 'Guardar') : Yii::t('turn', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

