<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ServicesPersonal $model */

$this->title = 'Crear Servicio Personal';
$this->params['breadcrumbs'][] = ['label' => Yii::t('services_personal', 'services_personal'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-personal-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>