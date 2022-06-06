@extends('layouts.dashboard.master')
@section('title','Transactions')

@section('content')

<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-12">
            <div class="card text-left">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6"><h5 class="mb-0">Transactions</h5></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-sm table-striped table-bordered" style="width:100%">
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
                                        <p class="small text-muted">
                                            <span class="text-dark">{{ $item->userDetail->name }}</span>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="small text-muted">
                                            <span class="text-dark">#{{ $item->transaction }}</span>
                                        </p>
                                    </td>
                                    <td>
                                        @if ($item->purchaseType == 'course_purchases')
                                            <a href="{{route('user.caseStudy.index')}}">Case study</a>
                                        @else
                                            <a href="{{route('user.sessions.index')}}">Video session</a>
                                        @endif
                                    </td>
                                    <td>
                                        <p class="small text-muted">
                                            <span class="text-dark">{{currencySymbol($item->currency)}}{{$item->amount}}</span>
                                        </p>
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