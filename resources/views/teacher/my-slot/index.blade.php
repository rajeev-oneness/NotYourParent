@extends('layouts.dashboard.master')
@section('title','My Slots')
@section('css')
<link rel="stylesheet" href="{{asset('design/vendor/full-calendar/css/fullcalendar.css')}}">
<link rel="stylesheet" href="{{asset('design/vendor/datepicker/tempusdominus-bootstrap-4.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/jquery.qtip.css" />
    <style>
        #calendar {
		max-width: 100%;
		margin: 0 auto;
	}
    </style>
@endsection
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">My Slots
                        <button type="button" class="btn btn-primary headerbuttonforAdd addBlogCategory" data-toggle="modal" data-target="#slotModal">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                          </button>
                    </h5>
                    <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
                </div>

                <!-- Modal for add-->
                <div class="modal fade" id="slotModal" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="title">Add new Slot</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form id="form">
                                <div class="form-group">
                                    <label for="datetimepicker4">Select Date </label>
                                    <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                        <input type="text" name="date" class="form-control datetimepicker-input" data-target="#datetimepicker4" required/>
                                        <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="datetimepicker3">Select Time </label>
                                    <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                        <input type="text" name="time" class="form-control datetimepicker-input" data-target="#datetimepicker3" required/>
                                        <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="note">Note </label>
                                    <div class="input-group" id="note" data-target-input="nearest">
                                        <input type="text" class="form-control" name="note" required/>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="save-btn" class="btn btn-primary slot-book">Save</button>
                        </div>
                    </div>
                    </div>
                </div>
                {{-- modal for edit and delete --}}
                <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="title">Update Slot</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form id="form">
                                <div class="form-group">
                                    <label for="datetimepicker6">Select Date </label>
                                    <div class="input-group date" id="datetimepicker6" data-target-input="nearest">
                                        <input type="text" id="date" name="date" class="form-control datetimepicker-input" data-target="#datetimepicker6" required/>
                                        <div class="input-group-append" data-target="#datetimepicker6" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="datetimepicker5">Select Time </label>
                                    <div class="input-group date" id="datetimepicker5" data-target-input="nearest">
                                        <input type="text" id="time" name="time" class="form-control datetimepicker-input" data-target="#datetimepicker5" required/>
                                        <div class="input-group-append" data-target="#datetimepicker5" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="note">Note </label>
                                    <div class="input-group" id="note" data-target-input="nearest">
                                        <input type="text" class="form-control" id="noteValue" name="note" required/>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="update-btn" data-id="" class="btn btn-primary slot-update">Update</button>
                            <button type="button" id="delete-btn" data-id="" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('script')
<script src="{{asset('design/vendor/full-calendar/js/fullcalendar.js')}}"></script>
<script src="{{asset('design/vendor/datepicker/tempusdominus-bootstrap-4.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/jquery.qtip.min.js" ></script>
<script type="text/javascript">
    //fullcallender
    $(document).ready(function() {

        var SITEURL = "{{ url('/') }}";
        $.ajaxSetup({
            headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
        });
        var calendar = $('#calendar').fullCalendar({
            defaultView: 'month',
            header: {
                left: 'month,agendaWeek,agendaDay',
                center: 'title',
                right:  'today prev,next'
                },
            buttonText : {
                today:    'today',
                month:    'month',
                week:     'week',
                day:      'day',
                list:     'list'
                },
            events: SITEURL + "/teacher/my-slot/list",
            eventClick: function(info) {
                console.log(info);
                let day = (new Date(info.start)).getDate();
                let month = (new Date(info.start)).getMonth() + 1;
                let year = (new Date(info.start)).getFullYear();
                let time = new Date(info.start._i).toLocaleTimeString();
                let date = month + "/" + day + "/" + year;
                let id = info.id;
                $('#date').val(date);
                $('#time').val(time);
                $('#noteValue').val(info.title);
                $('#update-btn, #delete-btn').attr('data-id',id);
                $('#updateModal').modal('toggle');
            },
            eventRender: function(event, element) {
                element.qtip({
                    content: {
                    title: { text: event.title },
                    text:
                        '<span class="title">Start: </span>' +
                        $.fullCalendar.formatDate(event.start, 'h(:mm)t') +
                        '<br><span class="title">Description: </span>' +
                        event.title
                    },
                    hide: {
                    delay: 200,
                    fixed: true
                    },
                    position: {
                    target: "mouse", // Use the mouse position as the position origin
                    adjust: {
                        // Don't continuously  the mouse, just use initial position
                        mouse: false
                    }
                    }
                });
            },
        });
    });

    //datepicker time only
    $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });
    $('#datetimepicker5').datetimepicker({
        format: 'LT'
    });
    //datepicker date only
    $('#datetimepicker4').datetimepicker({
                format: 'L',
                minDate:new Date()
            });
    $('#datetimepicker6').datetimepicker({
                format: 'L',
                minDate:new Date()
            });

    //reset form
    $('.headerbuttonforAdd').on('click', function(){
        $('#form')[0].reset();
    });
    // update
    $('#update-btn').on('click', function(){
        event.preventDefault();
        let id = $('#update-btn').attr('data-id');
        console.log(id);
        let url = "/teacher/my-slot/update/" + id;
        let date = $("#date").val();
        console.log(date);
        let time = $("#time").val();
        console.log(time);
        let note = $("#noteValue").val();
        $.ajax({
            type:'POST',
            url:url,
            data:{id:id,date:date, time: time, note: note},
            success:function(data){
                $('#updateModal').modal('toggle');
                location.reload();
                console.log(data);
            }
        });
    });
    //slot-booking
    $('.slot-book').on('click', function (event) {
        event.preventDefault();
        let url = "/teacher/my-slot/add/";
        let date = $("input[name=date]").val();
        console.log(date);
        let time = $("input[name=time]").val();
        console.log(time);
        let note = $("input[name=note]").val();
        console.log(note);
        $.ajax({
            type:'POST',
            url:url,
            data:{date:date, time: time, note: note},
            success:function(data){
                $('#slotModal').modal('toggle');
                location.reload();
                console.log(data);
            }
        });
    });

    //confirm delete
    $('#delete-btn').on('click', function (event) {
        event.preventDefault();
        let url = "my-slot/delete/";
        let id = $('#delete-btn').attr('data-id');
        swal({
            title: 'Are you sure?',
            text: 'This record will be permanantly deleted!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
            if (value) {
                swal("Deleted!", "Successful!", "success");
                window.location.href = url + id;
                }
            });
        });


</script>
@stop
@endsection
