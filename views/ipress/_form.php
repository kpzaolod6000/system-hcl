<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;
use kartik\builder\Form;

/** @var yii\web\View $this */
/** @var app\models\Ipress $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ipress-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>2,
        'attributes'=>[
            'cod_ipress'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el código IPRESS']],
            'full_name'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el nombre de IPRESS']],
            'establishment'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el establecimiento']],
            'department'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el departamento']],
            'province'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba la provincia']],
            'district'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el distrito']],
            'ubigeo'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el ubigeo']],
            'diresa'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba la diresa']],
            'name_red'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el codigo de la red']],
            'cod_microred'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el codigo de microred']],
            'disa'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el disa']],
            'red'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el nombre de la red']],
            'microred'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el nombre de la microred']],
            'cod_ue'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el número de unidad ejecutora']],
            'name_ue'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el nombre de unidad ejecutora']],
        ]
    ]);    
    ?>

    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('ipress', 'Guardar') : Yii::t('ipress', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
