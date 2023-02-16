<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;
use kartik\builder\Form;
use kartik\date\DatePicker;



/** @var yii\web\View $this */
/** @var app\models\Programation $model */
/** @var yii\widgets\ActiveForm $form */
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
        'id_services_personal'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el codigo del turno']],
        'id_turn'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el codigo de servicio personal']],
    ]
]);    
?>

<div class="form-group">
<?= Html::submitButton($model->isNewRecord ? Yii::t('programation', 'Guardar') : Yii::t('programation', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

