<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\StaffMed $model */

$this->title = 'Crear Personal Médico';
$this->params['breadcrumbs'][] = ['label' => Yii::t('staff_med','staff_med'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-med-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
