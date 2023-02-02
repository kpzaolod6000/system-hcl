<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ServicesPersonal $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="services-personal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_services')->textInput() ?>

    <?= $form->field($model, 'id_staff_med')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
