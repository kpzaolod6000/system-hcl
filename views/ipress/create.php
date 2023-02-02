<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ipress $model */

$this->title = 'Create Ipress';
$this->params['breadcrumbs'][] = ['label' => 'Ipresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ipress-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
