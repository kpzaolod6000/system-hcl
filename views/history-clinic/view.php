<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\HistoryClinic $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Historia Clinica', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="history-clinic-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro que desea eliminar?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nro_history_clinic',
            'date_entry',
            'addres',
            'nro_phone',
            'profession',
            'ocupation',
            'religion',
            'procedence',
            'id_type_sure',
            'id_marital_status',
            'id_instruction_grade',
            'id_patient',
            'id_patient_comp',
            //'created_by',
            //'created_date',
            //'modified_by',
            //'modified_date',
        ],
    ]) ?>

</div>
