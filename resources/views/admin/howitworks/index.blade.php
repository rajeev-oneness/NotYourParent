@extends('layouts.dashboard.master')
@section('title','How it works')

@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">How it works
                    </h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Key</th>
                                    <th>Details</th>
                                    <th>Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($howitworks as $key => $item)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>
                                        @if ($item->key == 'how_it_works_main')
                                        <span class="badge badge-primary rounded-0">MAIN content</span>
                                        @else
                                        <span class="badge badge-info rounded-0">CHILD content</span> 
                                        @endif
                                    </td>
                                    <td>
                                        <div class="media">
                                            <img src="{{asset($item->image)}}" class="mr-3" alt="content-image" style="height: 100px">
                                            <div class="media-body">
                                                <h5 class="mt-0">{{$item->heading}}</h5>
                                                <p class="small">{{$item->description}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if (!empty($item->link))
                                        <a href="{{$item->link}}" target="_blank" class="badge badge-light">Visit link</a>
                                        @else
                                        <span class="badge badge-danger rounded-0"><i class="fas fa-info-circle"></i> No link</span> 
                                        @endif
                                    </td>
                                    <td><a href="{{route('admin.howitworks.edit',['id' => $item->id])}}">Edit</a></td>
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
