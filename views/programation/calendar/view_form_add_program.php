<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\builder\Form;

/** @var yii\web\View $this */
/** @var app\models\Programation $model */
/** @var yii\widgets\ActiveForm $form */
?>



<div class="programation-form-add">
  <?php $form = ActiveForm::begin(['id' => 'frm_form_programation_add']); ?>
  <?php
    if ($model->isNewRecord) : 
      
       echo Form::widget([
        'model' => $model,
        'form' => $form,
        'columns' => 2,
        'attributes' => [
          // 'service'=>['type'=>Form::INPUT_STATIC, 'staticValue' => $modelDetailDis->medicine->nameMedicine],
          'id_services_personal'=> ['type' => Form::INPUT_HIDDEN],
          'status'=> ['type' => Form::INPUT_HIDDEN],
          'service' => ['type' => Form::INPUT_HIDDEN_STATIC, 'staticValue' => $model->serviceName],
          'staff' => ['type' => Form::INPUT_HIDDEN_STATIC, 'staticValue' => $model->staffMedName],
        ]]);

        echo Form::widget([
          'model' => $model,
          'form' => $form,
          'columns' => 3,
          'attributes' => [
            'date_program' => ['type' => Form::INPUT_HIDDEN_STATIC],
            'cupo_limit' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Escriba la cantidad de cupos']],
            'id_turn' => $model->id_turn < 2 ? ['type' => Form::INPUT_HIDDEN_STATIC, 'staticValue' => $model->id_turn == 1 ? "MAÑANA" : "TARDE"] : [
              'type'=>Form::INPUT_RADIO_LIST, 
              'widgetClass'=>'\kartik\select2\Select2', 
              'items'=>[1=>'MAÑANA',0=>'TARDE'],
            ] 
          ]]);
        
    else :
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
            
          ]]);
      endif;
  ?>

  <?php ActiveForm::end(); ?>
  <?php
  if ($model->isNewRecord) : ?>
    <div class="form-group d-flex flex-row-reverse ">
      <?= Html::button('<span class="glyphicon glyphicon-plus"></span> Registrar', ['class' => 'btn btn-success', 'id' => 'save-program']) ?>
    </div>
  <?php else : ?>
    <div class="form-group d-flex flex-row-reverse ">
      <?= Html::button('<span class="glyphicon glyphicon-plus"></span> Actualizar', ['class' => 'btn btn-primary', 'id' => 'update-program']) ?>
    </div>
  <?php endif; ?>
</div>



<?php
$urlCreateProgram = Yii::$app->urlManager->createUrl(['programation/create-programation', 'id' => $model->id, 'idStaff' => $model->staff, 'idService' => $model->service, 'method' => $method]);

$jsA = '';

$jsA .= <<<EOT

function runCreatePro(){
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
        }else {
          alert(html.msg);
        }
    }
  });
};


$('#update-program').on('click',function(e) {
  runCreatePro();
});

$('#save-program').on('click',function(e) {
  runCreatePro();
});

$("#programation-cupo_limit").on('keypress',function(e){
  if(e.keyCode==13){
    runCreatePro();
  }
});

EOT;

$this->registerJs(
  $jsA,
  yii\web\View::POS_END,
  'add-programation'
);
?>