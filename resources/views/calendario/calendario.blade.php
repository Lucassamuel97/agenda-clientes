@extends('layouts.calendar') 

@section('content')
  
<div class="container">
    <br />
    <h1 class="text-center text-primary"><u>Agenda</u></h1>
    <br />

    <div id="calendar"></div>

</div>

@include('calendario/modalAdd',['clientes' => $clientes])
@include('calendario/modalEdit')

<script type="text/javascript">

$(document).ready(function () {

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    var calendar = $('#calendar').fullCalendar({
        editable:true,
        header:{
            left:'prev,next today',
            center:'title',
            right:'agendaDay,month,agendaWeek,listYear'
        },
        events:'/full-calender',
        selectable:true,
        selectHelper: true,
        select:function(start, end, allDay)
        {
            var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

                $('#ModalAdd #start').val(start);
			      $('#ModalAdd #end').val(end);
			      $('#ModalAdd #type').val('add');
			      $('#ModalAdd').modal('show');
        },
        editable:true,
        eventResize: function(event, delta)
        {
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
            var title = event.title;
            var id = event.id;
            $.ajax({
                url:"/full-calender/action",
                type:"POST",
                data:{
                    title: title,
                    start: start,
                    end: end,
                    id: id,
                    type: 'update'
                },
                success:function(response)
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Evento atualizado com sucesso");
                }
            })
        },
        eventDrop: function(event, delta)
        {
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
            var title = event.title;
            var id = event.id;
            $.ajax({
                url:"/full-calender/action",
                type:"POST",
                data:{
                    title: title,
                    start: start,
                    end: end,
                    id: id,
                    type: 'update'
                },
                success:function(response)
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Evento atualizado com sucesso");
                }
            })
        },

        eventClick:function(calEvent)
        {
            $('#ModalEdit #title').val(calEvent.title);
            $('#ModalEdit #start').val(calEvent.start.format('YYYY-MM-DD HH:mm:ss'));
			$('#ModalEdit #end').val(calEvent.end.format('YYYY-MM-DD HH:mm:ss'));
			$('#ModalEdit #id').val(calEvent.id);
			$('#ModalEdit #description').val(calEvent.description);
			$('#ModalEdit #client').val(calEvent.client);
			$('#ModalEdit #color').val(calEvent.color);
			$('#ModalEdit').modal('show');      
        }
    });

});

</script>
@endsection