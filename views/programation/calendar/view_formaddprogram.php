<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\builder\Form;

/** @var yii\web\View $this */
/** @var app\models\Programation $model */
/** @var yii\widgets\ActiveForm $form */
?>



<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">
      <?=
      $model->isNewRecord ? "Agregar Programación" : "Actualizar Programación";
      ?>

    </h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="programation-form-add">
      <?php $form = ActiveForm::begin(['id' => 'frm_form_programation_add']); ?>
    <?php
    echo Form::widget([
      'model' => $model,
      'form' => $form,
      'columns' => 2,
      'attributes' => [
        // 'service'=>['type'=>Form::INPUT_STATIC, 'staticValue' => $modelDetailDis->medicine->nameMedicine],
        'service' => ['type' => Form::INPUT_STATIC, 'staticValue' => $model->serviceName],
        'staff' => ['type' => Form::INPUT_STATIC, 'staticValue' => $model->staffMedName],
        'date_program' => ['type' => Form::INPUT_STATIC],
        'cupo_limit' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Escriba la cantidad de cupos']],
      ]
    ]);
    ?>
  
    <?php ActiveForm::end(); ?>
    <?php
    if($model->isNewRecord):?>
    <div class="form-group">
        <?= Html::button('<span class="glyphicon glyphicon-plus"></span> Registrar', ['class' => 'btn btn-success','id'=>'save-program']) ?>
    </div>
    <?php else: ?>
    <div class="form-group">
        <?= Html::button('<span class="glyphicon glyphicon-plus"></span> Actualizar', ['class' => 'btn btn-primary','id'=>'update-program']) ?>
    </div>
    <?php endif;?>
    </div>
  </div>
</div>


<?php
$urlCreateProgram = Yii::$app->urlManager->createUrl(['programation/create-programation', 'id' => $model->id, 'idStaff' => $model->staff, 'idService' => $model->service]);

$jsA = '';

$jsA .= <<<EOT

$('#update-program').on('click',function(e) {

  $.ajax({
    url: '{$urlCreateProgram}',
    global: false,
    cache: false,
    type: "POST",
    dataType:"json",
    data:$("form#frm_form_programation_add").serialize(),
    success: function(html)
    {
        if(html.status == 'ok'){
          $("#modalEvent").modal("hide");  
          $("#program-calendar").html(html.viewProgramCalendar);
      
        }
              
    }
  });
});


EOT;

$this->registerJs(
  $jsA,
  yii\web\View::POS_END,
  'add-programation'
);
?>