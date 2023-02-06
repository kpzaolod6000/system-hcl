<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\StaffMed $model */

$this->title = 'Update Staff Med: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Staff Meds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="staff-med-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>