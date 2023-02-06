<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\StaffMed $model */

$this->title = 'Create Staff Med';
$this->params['breadcrumbs'][] = ['label' => 'Staff Meds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-med-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
