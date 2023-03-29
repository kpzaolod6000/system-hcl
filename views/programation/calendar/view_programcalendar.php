<?php

use yii\bootstrap4\Modal;
use yii\jui\Selectable;
use yii\web\JsExpression;
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
        <?php 
            $urlDataProgram = Yii::$app->urlManager->createUrl(['programation/data-programation']);
            $format = <<< JS

                function(event, jsEvent, view) {
                    // const date_current = event.start._i;

                    const turn_current = ((event.title).split("-"))[0].toUpperCase();
                    const id_program = event.id;
                    console.log("disparando");
                    console.log(event.id);

                    $.ajax({
                        url: "{$urlDataProgram}" + "&id=" + id_program,
                        global: false,
                        cache: false,
                        type: "POST",
                        dataType:"json",
                        success: function(html)
                        {
                            if(html.status == "ok"){
                                $("#modalEvent").modal("show");
                                $("#modalEvent-label").html("<h4>"+turn_current+"</h4>");
                                $("#modalContent").html(html.viewDataProgram);
                            }
                        }
                    });

                }
            JS;
        ?>
        <?= yii2fullcalendar\yii2fullcalendar::widget([
                'header' => [
                    'left' => 'prev,next today',
                    'center' => 'title',
                    'right' => 'month'
                    // 'right' => 'month,agendaWeek,agendaDay'
                ],
                'options' => [
                    'lang' => 'es',
                    //... more options to be defined here!
                ],
                
                'clientOptions' => [
                    'selectable' => true,
                    'eventLimit' => 2,
                    'eventLimitClick' => 'popover', // mostrar los eventos adicionales en un popover
                    'eventLimitText' => 'Existen mas programaciones de lo habitual', // texto del enlace "más"
                    'eventLimitTextColor' => '#fff', // color del texto del enlace "más"
                    'eventLimitBackground' => '#007bff',
                    
                    'eventClick' => new JsExpression($format)
                ],
                'events' => Yii::$app->urlManager->createUrl(['programation/calendar-programation', 'idService' => $idService, 'idStaff' => $idStaff])

            ]);
        ?>
    </div>
  <!-- /.card-body -->
</div>


<?php

Modal::begin([
    'title'=>"",
    'id'=> 'modalEvent',
    'size' => 'modal-lg'
]);

echo '<div id="modalContent"></div>';

Modal::end();

?>

<?php


$js='';

$js.=<<<EOT

$(document).on('mouseover','.fc-event-container',function() {
    $(this).css('cursor', 'pointer');
});

EOT;

$this->registerJs(
    $js,
    yii\web\View::POS_END,
    'calendar-programation');
?>
