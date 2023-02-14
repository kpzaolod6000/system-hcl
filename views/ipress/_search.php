<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\IpressSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ipress-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cod_ipress') ?>

    <?= $form->field($model, 'full_name') ?>

    <?= $form->field($model, 'establishment') ?>

    <?= $form->field($model, 'department') ?>

    <?php // echo $form->field($model, 'province') ?>

    <?php // echo $form->field($model, 'district') ?>

    <?php // echo $form->field($model, 'ubigeo') ?>

    <?php // echo $form->field($model, 'diresa') ?>

    <?php // echo $form->field($model, 'name_red') ?>

    <?php // echo $form->field($model, 'cod_microred') ?>

    <?php // echo $form->field($model, 'disa') ?>

    <?php // echo $form->field($model, 'red') ?>

    <?php // echo $form->field($model, 'microred') ?>

    <?php // echo $form->field($model, 'cod_ue') ?>

    <?php // echo $form->field($model, 'name_ue') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'modified_by') ?>

    <?php // echo $form->field($model, 'modified_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Riniciar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
