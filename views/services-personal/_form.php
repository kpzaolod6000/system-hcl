<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;
use kartik\builder\Form;


/** @var yii\web\View $this */
/** @var app\models\ServicesPersonal $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="services-personal-form">

    <?php $form = ActiveForm::begin(); ?>

      <!-- <div id='staff-med'></div> -->
    <?php 
    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>2,
        'attributes'=>[
            'id_services'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el codigo del servicio']],
            'id_staff_med'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el personal médico']],
        ]
    ]);    
    ?>

    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('service_personal', 'Guardar') : Yii::t('service_personal', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
