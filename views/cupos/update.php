<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Cupos $model */

$this->title = 'Actualizar Cupo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cupos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cupos-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
