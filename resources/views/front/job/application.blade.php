@extends('front.layouts.master')
@section('head-script-style')
@endsection

@section('title')
    Proposal
@endsection

@section('content')
<section class="job_listing header_padding">
<div class="container dashboard-content">
    <div class="row m-0 justify-content-center">
        <div class="col-12 col-lg-12 col-md-12 nyt_table">
                 <h5 class="mb-0">Proposal</h5>
                    <div class="table-responsive">
                        <table id="example4" class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Bio</th>
                                    <th>Contact</th>
                                   <!-- <th>Resume</th>-->
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($job as $key => $item)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td style="height: 100px; width: 100px"><img height="100px" width="100px" src="{{asset($item->user->image)}}"></td>
                                    <td>
                                        {{$item->user->name}}
                                        
                                    </td>
                                    <td>
                                        {{$item->user->bio}}
                                        
                                    </td>
                                    <td>
                                        <p class="small text-muted">
                                            Email :
                                            <span class="text-dark"> {{$item->user->email}}</span>
                                        </p>
                                        <p class="small text-muted">
                                            Mobile :
                                            <span class="text-dark"> {{$item->user->mobile}}</span>
                                        </p>
                                    </td>
                                   <!-- <td>
                                       <a href="{{($item->user->resume)}}">{{$item->user->resume}}</a>
                                    </td>-->
                                   
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
        </div>
    </div>
</div>
</section>
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example4').DataTable();
        });
    </script>
@stop
@endsection