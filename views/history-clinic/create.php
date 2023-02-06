<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\HistoryClinic $model */

$this->title = 'Create History Clinic';
$this->params['breadcrumbs'][] = ['label' => 'History Clinics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-clinic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
