<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Cupos $model */

$this->title = 'Crear cupos';
$this->params['breadcrumbs'][] = ['label' => 'Cupos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cupos-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
