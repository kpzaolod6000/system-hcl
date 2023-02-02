<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Programation $model */

$this->title = 'Create Programation';
$this->params['breadcrumbs'][] = ['label' => 'Programations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
