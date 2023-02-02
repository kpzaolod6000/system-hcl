<?php

use app\models\Cupos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CuposSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Cupos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cupos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cupos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'order',
            'phone',
            'datte_attention',
            'last_attention',
            //'reference',
            //'nro_receipt',
            //'receipt',
            //'ip',
            //'status',
            //'id_history_clinic',
            //'id_patient',
            //'id_programation',
            //'id_services',
            //'id_staff_med',
            //'id_fua',
            //'type_sure',
            //'created_by',
            //'created_date',
            //'modified_by',
            //'modified_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Cupos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
