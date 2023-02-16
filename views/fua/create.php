<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Fua $model */

$this->title = 'Crear Fua';
$this->params['breadcrumbs'][] = ['label' => 'Fuas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fua-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
