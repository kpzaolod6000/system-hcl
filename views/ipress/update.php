<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ipress $model */

$this->title = 'Actualizar IPRESS: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ipresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ipress-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
