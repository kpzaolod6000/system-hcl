<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\HistoryClinic $model */

$this->title = 'Update History Clinic: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'History Clinics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="history-clinic-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
