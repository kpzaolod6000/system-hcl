<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ServicesPersonal $model */

$this->title = 'Actualizar Servicio Personal: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Servicio Personal', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="services-personal-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
