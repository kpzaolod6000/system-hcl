<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\HistoryClinic $model */

$this->title = 'Crear historia clinica';
$this->params['breadcrumbs'][] = ['label' => Yii::t('history_clinic', 'history_clinic'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-clinic-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
