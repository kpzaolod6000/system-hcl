<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Profession $model */

$this->title = 'Actualizar Profesión: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Profesión', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="profession-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
