<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Programation $model */

$this->title = 'Actualizar Programación: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Programación', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="programation-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>