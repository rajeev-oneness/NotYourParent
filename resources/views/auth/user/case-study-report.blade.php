@extends('front.layouts.master')
@section('head-script-style')
@endsection

@section('title')
    Case Study
@endsection

@section('content')
<section class="job_listing header_padding">
<div class="container dashboard-content">
    <div class="row m-0 justify-content-center">
        <div class="col-12 col-lg-12 col-md-12 nyt_table">
            <h5 class="mb-0">Purchased Case study</h5>
            
                    <div class="table-responsive">
                        <table id="example4" class="table table-sm table-hover">
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
                                        
                                            EXPERT :
                                            <span class="text-dark">{{ $item->courseDetails->teacherDetail->name }}</span>
                                            
                                        
                                            USER :
                                            <span class="text-dark">{{ $item->userDetails->name }}</span>
                                            
                                        @endif
                                        @if (Auth::user()->id == 2)
                                        
                                            USER :
                                            <span class="text-dark">{{ $item->userDetails->name }}</span>
                                            
                                        @endif
                                        @if (Auth::user()->id == 3)
                                            
                                            EXPERT :
                                            <span class="text-dark">{{ $item->courseDetails->teacherDetail->name }}</span> 
                                            
                                        @endif
                                    </td>
                                    <td>
                                            
                                        {{$item->courseDetails->name}}
                                    </td>
                                    <td>
                                        <video controls muted height="60" width="60">
                                            <source src="{{asset($item->courseDetails->original_video_url)}}" type="video/mp4">
                                        </video>
                                    </td>
                                    <td>
                                        {{$item->created_at}}
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
</section>
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example4').DataTable();
        });
    </script>
@stop
@endsection