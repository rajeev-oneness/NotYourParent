@extends('layouts.dashboard.master')
@section('title','My Slots')
@section('css')
<link rel="stylesheet" href="{{asset('design/vendor/datepicker/tempusdominus-bootstrap-4.css')}}">
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

                <!-- Modal -->
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
                            <form>
                                <div class="form-group">
                                    <label for="datetimepicker4">Select Date </label>
                                    <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                        <input type="text" id="date" name="date" class="form-control datetimepicker-input" data-target="#datetimepicker4" required/>
                                        <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="datetimepicker3">Select Time </label>
                                    <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                        <input type="text" id="time" name="time" class="form-control datetimepicker-input" data-target="#datetimepicker3" required/>
                                        <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="note">Note </label>
                                    <div class="input-group" id="note" data-target-input="nearest">
                                        <input type="text" class="form-control" id="note" name="note" required/>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary slot-book">Save</button>
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
<script src="{{asset('design/vendor/datepicker/tempusdominus-bootstrap-4.js')}}"></script>
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
                let day = (new Date(info.start)).getDate();
                let month = (new Date(info.start)).getMonth() + 1;
                let year = (new Date(info.start)).getFullYear();
                let date = month + "/" + day + "/" + year;
                $('#date').val(date);
                console.log( (new Date(info.start)).toTimeString());

                $('#slotModal').modal('toggle');
            },
            dayClick: function(info) {
                },
        });
    });

    //datepicker time only
    $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });
    //datepicker date only
    $('#datetimepicker4').datetimepicker({
                format: 'L',
                minDate:new Date()
            });


    //slot-booking
    $('.slot-book').on('click', function (event) {
        event.preventDefault();
        const url = "/teacher/my-slot/add/";
        const date = $("input[name=date]").val();
        console.log(date);
        const time = $("input[name=time]").val();
        console.log(time);
        const note = $("input[name=note]").val();
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


</script>
@stop
@endsection
