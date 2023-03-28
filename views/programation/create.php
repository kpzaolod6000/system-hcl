<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Programation $model */

$this->title = 'Crear Programación';
$this->params['breadcrumbs'][] = ['label' => Yii::t('programation', 'Programation'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="programation-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<!-- 
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>
    
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendartest');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });
      </script>
<div id = "calendartest"></div> -->
