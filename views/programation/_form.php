<?php

use kartik\form\ActiveForm;
use kartik\builder\Form;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;



/** @var yii\web\View $this */
/** @var app\models\Programation $model */
/** @var yii\widgets\ActiveForm $form */
?>



<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Programación de Consulta Externa</h3>
    <div class="card-tools">
      <!-- Collapse Button -->
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
    </div>
    <!-- /.card-tools -->
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="programation-form">
        <?php $form = ActiveForm::begin(['id'=>'frm_form_programation']); ?>
    </div>
    <?php 
    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>2,
        'attributes'=>[
            
            'service'=>[
                'type'=>Form::INPUT_WIDGET, 
                'widgetClass'=>Select2::className(),
                'options'=>[
                    'options'=>['placeholder' => 'Seleccione el servicio'],
                    'data'=>['Servicios'=> $model->allServices]
                ], 
                // 'hint'=>'Seleccione el servicio adecuado'

            ],
            'staff'=>[
                'type'=>Form::INPUT_WIDGET, 
                'widgetClass'=>DepDrop::className(),
                'options'=>[
                    'type' => DepDrop::TYPE_SELECT2,
                    'options'=>['placeholder' => 'Seleccione el Personal Médico'],
                    // 'data'=>['Servicios'=> $model->staffs]
                    'pluginOptions' => [
                        'depends' => ['programation-service'],
                        'url' => Yii::$app->urlManager->createUrl(['programation/search-staffs'])
                        // 'params' => ['input-type-1', 'input-type-2']
                    ]
                ], 
                // 'hint'=>'Seleccione el personal médico'

            ],
            // 'id_services_personal'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el codigo del turno']],
            // 'id_turn'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escriba el codigo de servicio personal']],
            // 'status'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Estados de los tipo de modelos']]
        ]
    ]);    
    ?>
    <?php ActiveForm::end(); ?>
  </div>
  <!-- /.card-body -->
  
</div>

<!--Calendar Program-->
<div id="program-calendar" class="row"></div>

<!-- /.card -->

<?php
$urlCalendarProgram = Yii::$app->urlManager->createUrl(['programation/show-calendar-programation']);

$js='';

$js.=<<<EOT

function connectShowCalendarProgram(method){
    const idStaff = document.getElementById('programation-staff').value;
    const idService = document.getElementById('programation-service').value;

    if(idStaff != null|| idService != null){
        $.ajax({
            url: '{$urlCalendarProgram}' + '&method=' + method,
            global: false,
            cache: false,
            type: "POST",
            dataType:"json",
            data:$("form#frm_form_programation").serialize(),
            success: function(html)
            {
                if(html.status == 'ok'){
                    $("#program-calendar").html(html.viewProgramCalendar);
                }else if (html.status == 'fail'){
                    alert(html.msg);
                }
            }
        });
    }
}


$('#programation-staff').on('select2:select', function (e) {
    connectShowCalendarProgram('by-service-staff');
});

$('#programation-service').on('select2:select', function (e) {
    connectShowCalendarProgram('by-service');
});



EOT;

$this->registerJs(
    $js,
    yii\web\View::POS_END,
    'create-programation');
?>