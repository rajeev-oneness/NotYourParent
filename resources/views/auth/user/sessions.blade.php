@extends('layouts.dashboard.master')
@section('title','Video sessions')

@section('content')

<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-12">
            <div class="card text-left">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6"><h5 class="mb-0">Purchased Video Sessions</h5></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-sm table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Timing</th>
                                    <th>Details</th>
                                    <th>Note</th>
                                    <th>Action</th>
                                    <th>Purchased at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>
                                        <p class="small text-muted" style="white-space: nowrap">
                                            DATE :
                                            <span class="text-dark">{{ $item->slotDetails->date ? date('j F, Y', strtotime($item->slotDetails->date)) : '' }}</span>
                                        </p>
                                        <p class="small text-muted">
                                            TIME :
                                            <span class="text-dark">{{ date('g:i A', strtotime($item->slotDetails->time)) }}</span>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="small text-muted">
                                            EXPERT :
                                            <span class="text-dark">{{ $item->slotDetails->expertDetails->name }}</span>
                                        </p>
                                        <p class="small text-muted">
                                            USER :
                                            <span class="text-dark">{{ $item->userDetails->name }}</span>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="small text-muted">
                                            <span class="text-dark">{{$item->slotDetails->note}}</span>
                                        </p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="{{$item->join_url}}" class="btn btn-sm btn-primary" style="white-space: nowrap" target="_blank">Start Video <i class="fa fa-video"></i></a>
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