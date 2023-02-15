<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Programation $model */

$this->title = 'Crear Programación';
$this->params['breadcrumbs'][] = ['label' => Yii::t('programation', 'Programation'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programation-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
