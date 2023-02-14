<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;
use kartik\builder\Form;

/** @var yii\web\View $this */
/** @var app\models\Services $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="services-form">

    <?php $form = ActiveForm::begin(); ?>

      <!-- <div id='services-form'></div> -->
    <?php 
    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>2,
        'attributes'=>[
            'name'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el nombre del servicio']],
            'type'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el tipo de servicio']],
            'ups'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el ups']],
            'ups_s'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el ups_s']],
            'max_cp'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el maximo de cupos']],
            'max_am'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el maximo de cupos en la mañana']],
            'max_pm'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el maximo de cupos en la tarde']],
        ]
    ]);    
    ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
