<!DOCTYPE html>
<html>
<head>
    <title>Emploie du temps</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
    @include('layoutsProf.head')

</head>
<style>
      body{
        justify-content: center;
        margin-left: 10%;
      }
</style>
<body>
  
<div class="wrapper">

    <!--=================================
    preloader -->

    <div id="pre-loader">
        <img src="/assets/images/pre-loader/loader-01.svg" alt="">
    </div>

    <!--=================================
    preloader -->

    @include('layoutsProf.main-header')

    @include('layoutsProf.main-sidebar')

    <!--=================================
    Main content -->
   
    <div class="container">
      <br />
      <h1 class="text-center text-primary"><u>Emploie du temps</u></h1>
      <br />

      <div id="calendar"></div>

    </div>


    <!-- main-content -->
    <!--=================================
     footer -->
    @include('layoutsProf.footer')
</div>
   
<script>
    $(document).ready(function () {
        var calendar = $('#calendar').fullCalendar({
            editable: true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: function (start, end, timezone, callback) {
                $.ajax({
                    url: "{{ route('calendar.fetchseances') }}",
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                        callback(response);
                    },
                    error: function (error) {
                        console.log(error);
                    },
                });
            },
            selectable: true,
            selectHelper: true,
            select: function (start_date, end_date, allDay) {
                var title = prompt('seance Title:');
                if (title) {
                    var start_date = moment(start_date).format('YYYY-MM-DD HH:mm:ss');
                    var end_date = moment(end_date).format('YYYY-MM-DD HH:mm:ss');
                    $.ajax({
                        url: "{{ route('calendar.action') }}",
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            title: title,
                            start_date: start_date,
                            end_date: end_date,
                            type: 'add'
                        },
                        success: function (data) {
                            calendar.fullCalendar('refetchEvents');
                            alert("seance Created Successfully");
                        }
                    });
                }
            },
            eventResize: function (seance, delta, revertFunc) {
                var title = seance.title;
                var start_date = moment(seance.start).format('YYYY-MM-DD HH:mm:ss');
                var end_date = moment(seance.end).format('YYYY-MM-DD HH:mm:ss');
                var id = seance.id;
                $.ajax({
                    url: "{{ route('calendar.action') }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        title: title,
                        start_date: start_date,
                        end_date: end_date,
                        id: id,
                        type: 'update'
                    },
                    success: function (response) {
                        calendar.fullCalendar('refetchEvents');
                        alert("seance Updated Successfully");
                    },
                    error: function (error) {
                        revertFunc();
                        console.log(error);
                    }
                });
            },
            eventDrop: function (seance, delta, revertFunc) {
                var title = seance.title;
                var start_date = moment(seance.start).format('YYYY-MM-DD HH:mm:ss');
                var end_date = moment(seance.end).format('YYYY-MM-DD HH:mm:ss');
                var id = seance.id;
                $.ajax({
                    url: "{{ route('calendar.action') }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        title: title,
                        start_date: start_date,
                        end_date: end_date,
                        id: id,
                        type: 'update'
                    },
                    success: function (response) {
                        calendar.fullCalendar('refetchEvents');
                        alert("seance Updated Successfully");
                    },
                    error: function (error) {
                        revertFunc();
                        console.log(error);
                    }
                });
            },
            eventClick: function (seance) {
                if (confirm("Are you sure you want to remove it?")) {
                    var id = seance.id;
                    $.ajax({
                        url: "{{ route('calendar.action') }}",
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            id: id,
                            type: "delete"
                        },
                        success: function (response) {
                            calendar.fullCalendar('refetchEvents');
                            alert("seance Deleted Successfully");
                        }
                    });
                }
            }
        });
    });
</script>
@include('layoutsProf.footer-scripts')
</body>
</html>



