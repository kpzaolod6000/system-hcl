<?php

use app\models\StaffMed;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\StaffMedSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Staff Meds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-med-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Staff Med', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cod_staff_med',
            'name_staff_med',
            'max_q',
            'q_issued',
            //'q_slope',
            //'id_prof',
            //'created_by',
            //'created_date',
            //'modified_by',
            //'modified_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, StaffMed $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
