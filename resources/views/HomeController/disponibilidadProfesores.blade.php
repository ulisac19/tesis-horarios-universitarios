@extends('layouts.uikit')

@section('head')
<link rel='stylesheet' href='../css/fullcalendar.css' />
<script src='../js/moment.min.js'></script>
<script src='../js/fullcalendar.js'></script>
<title>Cargar Materias de Profesor</title>
@stop

@section('content')
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-1-1">
        <h1 class="uk-h1">Disponibilidad de <span class="uk-text-success">{{ $cursor->nombre }}</span></h1>
       <blockquote>Cargar las materias que da cada profesor</blockquote>
    </div>
</div>
<br>
<div id='calendar'></div>
<script>
$(document).ready(function() {

    $('#calendar').fullCalendar({

        eventClick: function(event)
        {
            $.ajax({
                url: '{{URL::to("deleteEventoData")}}'+'/'+event.id+'/<?= $cursor->id ?>',
                data: {"id": event.id, "profesor":<?= $cursor->id ?>},
                type: "GET",
                success: function(json) 
                {
                    $('#calendar').fullCalendar('removeEvents',event.id);
                },
             });  
           
        },

        selectable: true,
        selectHelper: true,
        eventStartEditable: true,
        
        select: function(start, end, allDay) {

        var title = "No Disponible";

            start = start.format("YYYY-MM-DD HH:00:00");        
            end = end.format("YYYY-MM-DD HH:00:00");        
    
             $.ajax({
                url: '{{URL::to("setEventosData")}}'+'/'+start+'/'+end+'/{{$cursor->id}}',
                data: {"start": start, "end":end, "profesor":<?= $cursor->id ?> },
                type: "GET",
                success: function(json) 
                {
                        $('#calendar').fullCalendar('renderEvent',
                         {
                         title: "No disponible",
                         start: start,
                         end: end,
                         }, true );

                        $('#calendar').fullCalendar('unselect');

                },
             });       

        },


        eventResize: function(event) {  
        start = event.start.format("YYYY-MM-DD HH:00:00");        
        end = event.end.format("YYYY-MM-DD HH:00:00");   

             $.ajax({
             url: '{{URL::to("updateEventosData")}}'+'/'+start+'/'+end+'/'+event.id+"/<?= $cursor->id ?>",
             data: {"start": start, "end": end, "id":event.id, "profesor":<?= $cursor->id ?> },
             type: "GET",
                 success: function(json) 
                 {
                   // $('#calendar').fullCalendar('updateEvent', event);

                 },
                 complete: function(json) 
                 {
                    $('#calendar').fullCalendar('updateEvent', event);

                 },
             
             });
        },

        eventDrop: function(event) {  
        start = event.start.format("YYYY-MM-DD HH:00:00");        
        end = event.end.format("YYYY-MM-DD HH:00:00");   
             $.ajax({
             url: '{{URL::to("updateEventosData")}}'+'/'+start+'/'+end+'/'+event.id+'/<?= $cursor->id ?>',
             data: {"start": start, "end": end, "id":event.id, "profesor":<?= $cursor->id ?>},
             type: "GET",
                 success: function(json) 
                 {
                   
                    //$('#calendar').fullCalendar('updateEvent', event);

                 },
                 complete: function(json) 
                 {
                    $('#calendar').fullCalendar('updateEvent', event);

                 },
             
             });
        },


        defaultView: 'agendaWeek',
        eventColor: '#CD4836',
        dayNames: ['Domingo', 'Lunes','Martes','Miercoles','Jueves','Viernes', 'Sabado'],
        dayNamesShort: ['Domingo', 'Lunes','Martes','Miercoles','Jueves','Viernes', 'Sabado'],
        hiddenDays: [ 0, 6 ],
        editable: true,
        views: 
        {
            basic: {
                // options apply to basicWeek and basicDay views
            },
            agenda: {
                // options apply to agendaWeek and agendaDay views
            },
            week: {
                // options apply to basicWeek and agendaWeek views
                columnFormat: 'ddd',
            },
            day: {
                // options apply to basicDay and agendaDay views
            }
        },
        businessHours:
        	{
        		start: '7:00', 
    			end: '22:00',
        	},
        header: {
			     left   : false,
			     center : false,
			     right  : false,
			    },
        events: "{{ URL::to('getEventosData') }}/{{ $cursor->id }}"
    })

});
</script>
@stop

@section('submenu')
<li class="uk-active"><a href="#"><i class="uk-icon-calendar-o"></i> horarios profesores</a></li>
<li class="uk-nav-header">Operaciones</li>
<li><a href="{{URL::to('listaMateriasProfesor')}}"><i class="uk-icon-bars"></i> Listas Profesores</a></li>
<li><a href="{{URL::to('cargarMateriasProfesor')}}"><i class="uk-icon-plus"></i> Profesores</a></li>                                
<li class="uk-nav-divider"></li>
<li><a data-uk-modal="{target:'#modalCargarMateriasProfesor'}" href="#"><i class="uk-icon-question-circle"></i> Ayuda</a></li>
@stop