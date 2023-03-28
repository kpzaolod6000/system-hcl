<?php

use yii\bootstrap5\Modal;
?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Programación</h3>
        <div class="card-tools">
        <!-- Collapse Button -->
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        
        <?= yii2fullcalendar\yii2fullcalendar::widget([
                'options' => [
                'lang' => 'es',
                //... more options to be defined here!
            ],
            'events' => Yii::$app->urlManager->createUrl(['programation/calendar-programation', 'idService' => $idService, 'idStaff' => $idStaff])
            ]);
        ?>
    </div>
  <!-- /.card-body -->
</div>


<?php

Modal::begin([
    'title' => '<h4>ModalEvents</h4>',
    'id'=> 'modalEvent',
    'size' => 'modal-sm'
]);

echo '<div id="modalContent"></div>';
Modal::end();

?>

<?php
$urlCalendarProgram = Yii::$app->urlManager->createUrl(['programation/show-calendar-programation']);

$js='';

$js.=<<<EOT

$(document).on('click','.fc-day', function(){
    let date = $(this).attr('data-date');
    
    $('#modalEvent').modal('show');
    $.ajax({
        url: '{$urlCalendarProgram}',
        global: false,
        cache: false,
        type: "POST",
        dataType:"json",
        data:$("form#frm_form_programation").serialize(),
        success: function(html)
        {
            if(html.status == 'ok'){
                $("#program-calendar").html(html.viewProgramCalendar);
            }
                  
        }
    });
    
    
})

$(document).on('mouseover','.fc-day-grid',function() {
    $(this).css('cursor', 'pointer');
});


EOT;

$this->registerJs(
    $js,
    yii\web\View::POS_END,
    'create-event');
?>