<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TurnSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="turn-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name_turn') ?>

    <?= $form->field($model, 'hour_begin') ?>

    <?= $form->field($model, 'hour_end') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'modified_by') ?>

    <?php // echo $form->field($model, 'modified_date') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('message/es','Buscar'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('message/es','Reiniciar'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
