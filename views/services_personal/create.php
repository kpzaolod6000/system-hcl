<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ServicesPersonal $model */

$this->title = 'Create Services Personal';
$this->params['breadcrumbs'][] = ['label' => 'Services Personals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-personal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
