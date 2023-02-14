<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Turn $model */

$this->title = Yii::t('message/es','Crear Turno');
$this->params['breadcrumbs'][] = ['label' => Yii::t('turn','Turns'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turn-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
