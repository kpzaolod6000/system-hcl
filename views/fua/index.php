<?php

use app\models\Fua;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\FuaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Fuas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fua-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Fua', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type_doc',
            'nro_doc',
            'nro_hcl',
            'cod_sure',
            //'date_attention',
            //'nro_ref',
            //'id_ipress',
            //'created_by',
            //'created_date',
            //'modified_by',
            //'modified_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Fua $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
