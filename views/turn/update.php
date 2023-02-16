<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Turn $model */

$this->title = 'Actualizar Turno: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('turn','turn'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar Turno';
?>
<div class="turn-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
