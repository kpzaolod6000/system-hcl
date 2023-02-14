<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Profession $model */

$this->title = 'Crear Profesión';
$this->params['breadcrumbs'][] = ['label' => Yii::t('profession','profession'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profession-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
