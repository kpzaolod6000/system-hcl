<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;
use kartik\builder\Form;


/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="user-form">
    <?php $form = ActiveForm::begin(); ?>
</div>
    <div id='user'></div>
    <?php 
    //echo "<pre>";       print_r(\Yii::$app->authManager->getRoles());exit;
    //echo $this->render('info_sure',['model'=>$model]);
    //$provinces=$model->UbigeoOptions;
    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>3,
        'attributes'=>[
            'username'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el usuario']],
            'name'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba su nombre']],     
            'last_name'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba su apellido paterno']],
            'last_name_m'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba su apellido materno']],
            'password'=>['type'=>Form::INPUT_PASSWORD, 'options'=>['placeholder'=>'Escriba su contraseña']],
            're_password'=>['type'=>Form::INPUT_PASSWORD, 'options'=>['placeholder'=>'Confirmar contraseña']],
            'role'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Debe ser un dropdown']],
        ]
    ]);
    
    ?>
        
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('user', 'Guardar') : Yii::t('user', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
    