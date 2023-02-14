<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ipress $model */

$this->title = 'Crear IPRESS';
$this->params['breadcrumbs'][] = ['label' => Yii::t('ipress', 'ipress'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ipress-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
