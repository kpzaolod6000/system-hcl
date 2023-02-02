<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Fua $model */

$this->title = 'Update Fua: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fuas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fua-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
