<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Services $model */

$this->title = 'Actualizar Servicio: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('services', 'services'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="services-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
