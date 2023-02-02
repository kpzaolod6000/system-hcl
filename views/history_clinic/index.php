<?php

use app\models\HistoryClinic;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\HistoryClinicSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'History Clinics';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-clinic-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create History Clinic', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nro_history_clinic',
            'date_entry',
            'addres',
            'nro_phone',
            //'profession',
            //'ocupation',
            //'religion',
            //'procedence',
            //'id_type_sure',
            //'id_marital_status',
            //'id_instruction_grade',
            //'id_patient',
            //'id_patient_comp',
            //'created_by',
            //'created_date',
            //'modified_by',
            //'modified_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, HistoryClinic $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
