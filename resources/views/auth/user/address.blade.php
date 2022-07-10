@extends('front.layouts.master')
@section('head-script-style')
@endsection

@section('title')
    Transaction
@endsection

@section('content')
<section class="job_listing header_padding">
    <div class="row">
        <div class="col-12">
            <div class="card text-left">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6"><h5 class="mb-0">Address</h5></div>
                        <div class="col-6 text-right"><a href="{{route('user.profile')}}" class="btn btn-sm"> <i class="fa fa-chevron-left"></i> Back to Settings</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <span class="badge badge-dark rounded-0">{{ ($address->type == 1) ? 'Home' : 'Office' }}</span>
                    <h5 class="card-title mt-3">{{$address->address}}</h5>
                    <p class="card-text text-muted mb-1">{{$address->pincode.', '.$address->city.', '.$address->state.', '.$address->country}}</p>
                    <p class="card-text text-muted">Landmark : {{$address->landmark}}</p>

                    <a href="{{route('user.address.edit')}}" class="btn btn-sm btn-primary">Edit this address</a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@section('script')
    <script type="text/javascript"></script>
@stop
@endsection