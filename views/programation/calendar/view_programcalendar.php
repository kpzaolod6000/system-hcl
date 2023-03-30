<?php

use yii\bootstrap5\Modal;
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
            
            $updateEvent = <<< JS

                function(event, jsEvent, view) {
                    // const date_current = event.start._i;

                    if (event.start.isSame(view.intervalStart, "month")) {
                        const turn_current = ((event.title).split("-"))[0].toUpperCase();
                        const id_program = event.id;
                        
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
                                    $("#modalEvent-label").html("<h4>ACTUALIZAR PROGRAMACION - "+turn_current+"</h4>");
                                    $("#modalContent").html(html.viewDataProgram);
                                }
                            }
                        });
                    }else{
                        alert("Este día no está disponible para la selección.");//poner un mejor alert en javascript :)
                    }
                }
            JS;

            $createEvent = <<< JS
                function(date, jsEvent, view) {

                    if (date.isSame(view.intervalStart, "month")) {
                        const events = [...$("#fullcalendar-programation").fullCalendar("clientEvents")];
                        const nEvents = events.reduce((acumulator, event) => {
                            if(event.start.isSame(date, "day")) acumulator.push(event);
                            return acumulator
                        },[]);
                        
                        const date_ = date.format();
                        let turn=999;

                        if (nEvents.length == 1) {
                            const turn_current = ((nEvents[0].title).split("-"))[0];
                            turn = "{$tm}" == turn_current ? 1 : 0 ;
                        }

                        if (nEvents.length < 2) {
                            $.ajax({
                                url: "{$urlDataProgram}",
                                global: false,
                                cache: false,
                                type: "POST",
                                dataType:"json",
                                data: {
                                    date: date_,
                                    idService: $idService,
                                    idStaff: $idStaff,
                                    id_turn: turn
                                },
                                success: function(html)
                                {
                                    if(html.status == "ok"){
                                        $("#modalEvent").modal("show");
                                        $("#modalEvent-label").html("<h4>AGREGAR PROGRAMACION</h4>");
                                        $("#modalContent").html(html.viewDataProgram);
                                    }
                                }
                            });

                    }else {
                        alert("La programacion esta completa");//poner un mejor alert en javascript :)
                    }
                    } else {
                        alert("Este día no está disponible para la selección.");//poner un mejor alert en javascript :)
                    }
                }
            JS;

            $urldeleteProgram = Yii::$app->urlManager->createUrl(['programation/delete']);
            $deleteEvent =  <<< JS
            
                function (event, element) {
                    var deleteButton = '<div class=\"delete-event-button\"><i class=\"fas fa-times\"></i></div>';
                    element.append(deleteButton);
                    element.find('.delete-event-button').css({
                        'position': 'absolute',
                        'top': '0px',
                        'right': '0px',
                        'margin-inline-end': '2px',
                        'z-index': '999'
                    });
                    
                    element.find('.fas').hover(function() {
                        $(this).css('color', '#ff5722');
                    }, function() {
                        $(this).css('color', '');
                    });
                    element.find('.delete-event-button').click(function(e) {
                        if (confirm('¿Estás seguro que deseas eliminar este evento?')) {
                            const id_program = event.id;
                            $.ajax({
                                url: "{$urldeleteProgram}" + "&id=" + id_program,
                                global: false,
                                cache: false,
                                type: "POST",
                                dataType:"json",
                                success: function(html)
                                {
                                    if(html.status == "ok"){
                                        $('#fullcalendar-programation').fullCalendar('removeEvents', id_program);
                                    }
                                }
                            });
                        }
                        e.stopPropagation();
                        
                    });
                }
            
            JS;

        ?>
        <?= yii2fullcalendar\yii2fullcalendar::widget([
                'header' => [
                    'left' => '',
                    'center' => 'title',
                    'right' => 'prev,next today'
                    // 'right' => 'month,agendaWeek,agendaDay'
                ],
                'options' => [
                    'id' => 'fullcalendar-programation',
                    'lang' => 'es',
                    //... more options to be defined here!
                ],
                
                'clientOptions' => [
                    'eventLimit' => 2,
                    'eventLimitClick' => 'popover', // mostrar los eventos adicionales en un popover
                    'eventLimitText' => 'Existen mas programaciones de lo habitual', // texto del enlace "más"
                    'eventLimitTextColor' => '#fff', // color del texto del enlace "más"
                    'eventLimitBackground' => '#007bff',
                    //'editable' => true,
                    'selectable' => true,
                    //'selectHelper' => true,
                    'droppable' => true,
                    'eventClick' => new JsExpression($updateEvent),
                    'dayClick' => new JsExpression($createEvent),
                    'eventRender' => new JsExpression($deleteEvent),
                ],
                'events' => Yii::$app->urlManager->createUrl(['programation/calendar-programation', 'idService' => $idService, 'idStaff' => $idStaff])

            ]);
        ?>
    </div>
  <!-- /.card-body -->
</div>

<style>
    .modalEvent .modal-header {
        background-color: #0d6efd; 
        color: white;
    }
    .fc-event-container:hover{
        font-size: 25px;
        cursor: pointer;
    }
    .fc-view-container{
        cursor: pointer;
    }
    .fc-today {
        background: rgba(93, 234, 249, 0.6) !important;
        border: none !important;
    } 
    
</style>

<?php

Modal::begin([
    'title'=>"",
    'id'=> 'modalEvent',
    'size' => 'modal-lg',
    'options' => ['class' => 'modalEvent']
]);

echo '<div id="modalContent"></div>';

Modal::end();

?>

<?php


// $js='';

// $js.=<<<EOT

// $(document).on('mouseover','.fc-event-container',function() {
//     $(this).css('cursor', 'pointer');

// });

// EOT;

// $this->registerJs(
//     $js,
//     yii\web\View::POS_END,
//     'calendar-programation');
?>
