<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\FuaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="fua-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'type_doc') ?>

    <?= $form->field($model, 'nro_doc') ?>

    <?= $form->field($model, 'nro_hcl') ?>

    <?= $form->field($model, 'cod_sure') ?>

    <?php // echo $form->field($model, 'date_attention') ?>

    <?php // echo $form->field($model, 'nro_ref') ?>

    <?php // echo $form->field($model, 'id_ipress') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'modified_by') ?>

    <?php // echo $form->field($model, 'modified_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
