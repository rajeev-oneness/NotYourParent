@extends('layouts.dashboard.master')
@section('title','Case study report')

@section('content')

<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-12">
            <div class="card text-left">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6"><h5 class="mb-0">Purchased Case study</h5></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-sm table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>User</th>
                                    <th>Course</th>
                                    <th>Watch</th>
                                    <th>Purchased at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>
                                        @if (Auth::user()->id == 1)
                                        <p class="small text-muted">
                                            EXPERT :
                                            <span class="text-dark">{{ $item->courseDetails->teacherDetail->name }}</span>
                                        </p>
                                        <p class="small text-muted">
                                            USER :
                                            <span class="text-dark">{{ $item->userDetails->name }}</span>
                                        </p>
                                        @endif
                                        @if (Auth::user()->id == 2)
                                        <p class="small text-muted">
                                            USER :
                                            <span class="text-dark">{{ $item->userDetails->name }}</span>
                                        </p>
                                        @endif
                                        @if (Auth::user()->id == 3)
                                        <p class="small text-muted">
                                            EXPERT :
                                            <span class="text-dark">{{ $item->courseDetails->teacherDetail->name }}</span>
                                        </p>
                                        @endif
                                    </td>
                                    <td>
                                        <p class="small text-muted">
                                            <span class="text-dark">{{$item->courseDetails->name}}</span>
                                        </p>
                                    </td>
                                    <td>
                                        <video controls muted height="100">
                                            <source src="{{asset($item->courseDetails->original_video_url)}}" type="video/mp4">
                                        </video>
                                    </td>
                                    <td>
                                        <p class="small text-muted">{{$item->created_at}}</p>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example4').DataTable();
        });
    </script>
@stop
@endsection