<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;
use kartik\builder\Form;

/** @var yii\web\View $this */
/** @var app\models\Profession $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profession-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>2,
        'attributes'=>[
            'name_prof'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el nombre de la profesión']],
            'cod_col'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el codigo el codigo de colegiatura del médico']],
        ]
    ]);    
    ?>

    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('profession', 'Guardar') : Yii::t('profession', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
