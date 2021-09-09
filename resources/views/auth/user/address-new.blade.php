@extends('layouts.dashboard.master')
@section('title','Address')

@section('content')

<style>
    input[type=radio] {
        display: inline-block;
    }
</style>

<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-12">
            <div class="card text-left">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6"><h5 class="mb-0">Add new address</h5></div>
                        <div class="col-6 text-right"><a href="{{route('user.profile')}}" class="btn btn-sm"> <i class="fa fa-chevron-left"></i> Back to Settings</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('user.address.save')}}" method="post">
                    @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="street_address">Street address</label>
                                <input type="text" placeholder="Street address" name="street_address" id="street_address" class="form-control" value="{{old('street_address')}}">
                                @error('street_address') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="landmark">Landmark</label>
                                <input type="text" placeholder="Landmark" name="landmark" id="landmark" class="form-control" value="{{old('landmark')}}">
                                @error('landmark') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="pincode">Pincode</label>
                                <input type="text" placeholder="Pincode" name="pincode" id="pincode" class="form-control" value="{{old('pincode')}}">
                                @error('pincode') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="city">City</label>
                                <input type="text" placeholder="City" name="city" id="city" class="form-control" value="{{old('city')}}">
                                @error('city') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="state">State</label>
                                <input type="text" placeholder="State" name="state" id="state" class="form-control" value="{{old('state')}}">
                                @error('state') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="country">Country</label>
                                <input type="text" placeholder="Country" name="country" id="country" class="form-control" value="{{old('country')}}">
                                @error('country') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="type_home">Address type</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="type_home" value="1" checked>
                                        <label class="form-check-label" for="type_home">Home</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="type_work" value="2">
                                        <label class="form-check-label" for="type_work">Office</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script type="text/javascript"></script>
@stop
@endsection