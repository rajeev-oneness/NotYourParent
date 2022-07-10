@extends('front.layouts.master')
@section('head-script-style')
@endsection

@section('title')
    Transaction
@endsection

@section('content')
<section class="job_listing header_padding">
<div class="container dashboard-content">
    <div class="row m-0 justify-content-center">
        <div class="col-12 col-lg-12 col-md-12 nyt_table">
                <h5>Transactions</h5>
                    <div class="table-responsive">
                        <table id="example4" class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Purchased by</th>
                                    <th>TXN_ID</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Purchased at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>
                                        {{ $item->userDetail->name }}
                                    </td>
                                    <td>
                                        #{{ $item->transaction }}
                                    </td>
                                    <td>
                                        @if ($item->purchaseType == 'course_purchases')
                                            <a href="{{route('user.caseStudy.index')}}">Case study</a>
                                        @else
                                            <a href="{{route('user.sessions.index')}}">Video session</a>
                                        @endif
                                    </td>
                                    <td>
                                        {{currencySymbol($item->currency)}}{{$item->amount}}
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