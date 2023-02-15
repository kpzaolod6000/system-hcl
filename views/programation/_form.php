<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;
use kartik\builder\Form;

/* @var yii\web\View $this */
/* @var app\models\Programation $model */
/* @var yii\widgets\ActiveForm $form */
?>

<div class="programation-form">

    <?php $form = ActiveForm::begin(); ?>
</div>
    
    <div id='programation'></div>

    <?php 
    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>2,
        'attributes'=>[
            'date_attention'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba la fecha de la atencion']],
            'id_services_personal'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el codigo del servicio personal']],
            'id_turn'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el codigo de servicio turno']],
        ]
    ]);    
    ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
