@extends('layouts.dashboard.master')
@section('title','Slot')
@section('css')
<link rel="stylesheet" href="{{asset('design/vendor/full-calendar/css/fullcalendar.css')}}">
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
                    <h5 class="mb-0">Teacher Slot</h5>
                </div>
                <div class="card-body">
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Available Slots</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    @csrf
                                    <table class="table table-striped table-bordered">
                                    <thead>
                                      <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Note</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody id="my-table">

                                    </tbody>
                                  </table>
                                </form>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary add-slot">Save changes</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    {{-- fullcalendar --}}
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{asset('design/vendor/full-calendar/js/fullcalendar.js')}}"></script>
    <script>
        $(document).ready(function() {
            const SITEURL = "{{ url('/') }}";
            $.ajaxSetup({
                headers:{
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    }
            });
            const calendar = $('#calendar').fullCalendar({
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
                dayClick  : function(info){
                        console.log(info);
                        $('#exampleModal').modal('toggle');
                        let date = moment(info).format("YYYY-MM-DD");
                        console.log(date);
                        $("input[name*='date']").val(date);
                        $.ajax({
                            url: 'single/' + date,
                            success: function(result){
                                $('#my-table').empty();
                                let row = '';
                                console.log(result);
                                if (result.length > 0) {

                                result.forEach(function(item){
                                    console.log(item);
                                    row += '<tr data-id="'+ item.id +'"><td><input type="date" name="date[]" value="'+ item.date + '" disabled class="date"></td><td><input type="time" class="time" name="time[]" value="'+ item.time + '"></td>';
                                    row += '<td><input type="note" class="note" name="note[]" value="'+ item.note + '"></td>'
                                    row += '<td><a href="javascript:void(0)" class="text-danger actionbtn remove"><i class="fas fa-times"></i></a></td></tr>';
                                    row+= '<br>';
                                })
                                } else {

                                row += '<tr data-id=""><td><input type="date" name="date[]" value="'+date+'" disabled class="date"></td><td><input type="time"  name="time[]" value="" class="time"></td><td><input type="text" name="note[]" value="" class="note"></td><td><a href="javascript:void(0)" class="actionbtn addNew"><span class="text-success"><i class="fas fa-plus"></i></span></a></td></tr>';
                                }
                                $('#my-table').append(row);
                            }
                        });
                },
                events : [
                    @foreach($mySlots as $slot)
                    {
                        title : '{{ $slot->note}}',
                        start : '{{ $slot->date }}',
                    },
                    @endforeach
                ],
            });
            $(document).on('click','.addNew',function(){
                let lastRow = $("#my-table tr:last");
                let cloneRow = lastRow.clone();
                lastRow.after(cloneRow);
            });
            $(document).on('click','.remove',function(){
                var whichtr = $(this).closest("tr");
                let id = whichtr.attr('data-id');
                console.log(id);
                swal({
                    title: 'Are you sure?',
                    text: 'This record will be permanantly deleted!',
                    icon: 'warning',
                    buttons: ["Cancel", "Yes!"],
                    }).then(function(value) {
                    if (value) {
                        whichtr.remove();
                        swal("Deleted!", "Successful!", "success");
                        window.location.href = SITEURL +"/teacher/my-slot/delete/" + id;
                        }
                    });
		    });
            //slot-booking
            $('.add-slot').on('click', function (event) {
                event.preventDefault();
                let date = $("input[name='date[]']").map(function () {
                                return this.value;
                            }).get();
                console.log(date);
                let time = $("input[name='time[]']").map(function () {
                                return this.value;
                            }).get();
                console.log(time);
                let note = $("input[name='note[]']").map(function () {
                                return this.value;
                            }).get();
                console.log(note);
                $.ajax({
                    type:'POST',
                    url:SITEURL + '/teacher/my-slot/update/' + date[0],
                    data:{date:date, time: time, note: note},
                    success:function(data){
                        $('#exampleModal').modal('toggle');
                        location.reload();
                        console.log(data);
                    }
                });
            });
            //last-column of the row
            $("#my-table tr:last-child td:last-child")
            // disable on submit
            $('form').submit(function(){
                $(this).children('button[type=submit]').prop('disabled', true);
            });
        });
    </script>
@endsection
