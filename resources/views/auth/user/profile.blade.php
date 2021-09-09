{{-- @extends('layouts.master')
@section('title','Profile') --}}

@extends('layouts.dashboard.master')
@section('title','Settings')

@section('content')
<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6"><h5 class="mb-0">Settings</h5></div>
                        <div class="col-6 text-right">
                            <a href="{{route('user.address.index')}}" class="btn btn-sm btn-primary">Address</a>
                            <a href="{{route('user.language.index')}}" class="btn btn-sm btn-primary">Language</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('user.profile.save')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{$user->image}}" height="200" width="200" class="rounded-circle img-thumbnail">
                            </div>
                            <div class="col-md-6 text-right">
                                @if (!empty($user->review))
                                    <p class="font-weight-bold mb-0">Review</p>
                                    <span class="badge badge-{{custom_review($user->review)}} badge-pill" title="K2 review is {{$user->review}}">{{$user->review}} <i class="fa fa-star"></i> </span>
                                    <span title="No. of ratings">({{$user->rating_count}})</span>
                                @endif
                                <p class="font-weight-bold mb-0">Member since</p>
                                <p class="text-muted">{{$user->created_at->diffForHumans()}}</p>
                                <p class="font-weight-bold mb-0">Last Profile update</p>
                                <p class="text-muted">{{$user->updated_at->diffForHumans()}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="image" class="col-form-label">Image:</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="name" class="col-form-label">Name:</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{(old('name') ? old('name') : $user->name)}}" autofocus="">
                                @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>    
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email" class="col-form-label">Email:</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email eg: abc@xyz.com" value="{{(old('email') ? old('email') : $user->email)}}">
                                @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile" class="col-form-label">Mobile:</label>
                                <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="Mobile" value="{{(old('mobile') ? old('mobile') : $user->mobile)}}" onkeypress="return isNumberKey(event);" maxlength="20">
                                @error('mobile')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="referral" class="col-form-label">Referral Code:</label>
                                <input type="text" name="referral" class="form-control @error('referral') is-invalid @enderror" value="{{$user->referral_code}}" readonly disabled>
                                @error('referral')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="gender" class="col-form-label">Gender:</label>
                                <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                    <option value="" selected="" hidden="">Select Gender</option>
                                    <option value="Male" @if($user->gender=='Male'){{('selected')}}@endif>Male</option>
                                    <option value="Female" @if($user->gender=='Female'){{('selected')}}@endif>Female</option>
                                    <option value="Not specified" @if($user->gender=='Not specified'){{('selected')}}@endif>Not specified</option>
                                </select>
                                @error('gender')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="dob" class="col-form-label">Date of Birth:</label>
                                <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{(old('dob') ? old('dob') : $user->dob)}}">
                                @error('dob')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="marital" class="col-form-label">Marital:</label>
                                <select name="marital" class="form-control @error('marital') is-invalid @enderror">
                                    <option value="" selected="" hidden="">Select Marital</option>
                                    <option value="Single" @if($user->marital=='Single'){{('selected')}}@endif>Single</option>
                                    <option value="Married" @if($user->marital=='Married'){{('selected')}}@endif>Married</option>
                                    <option value="Divorced" @if($user->marital=='Divorced'){{('selected')}}@endif>Divorced</option>
                                </select>
                                @error('marital')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="aniversary" class="col-form-label">Anniversary:</label>
                                <input type="date" name="aniversary" class="form-control @error('aniversary') is-invalid @enderror" value="{{(old('aniversary') ? old('aniversary') : $user->aniversary)}}">
                                @error('aniversary')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hourly_rate" class="col-form-label">Rate/ hr:</label>
                                <input type="number" name="hourly_rate" class="form-control @error('hourly_rate') is-invalid @enderror" value="{{(old('hourly_rate') ? old('hourly_rate') : $user->hourly_rate)}}" placeholder="Enter rate only" onkeypress="return isNumberKey(event);" maxlength="10">
                                @error('hourly_rate')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="short_description" class="col-form-label">Short description:</label>
                                <input type="text" name="short_description" class="form-control @error('short_description') is-invalid @enderror" placeholder="Short description" value="{{(old('short_description') ? old('short_description') : $user->short_description)}}">
                                @error('short_description')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bio" class="col-form-label">Quote:</label>
                                <input type="text" name="bio" class="form-control @error('bio') is-invalid @enderror" placeholder="Quote" value="{{(old('bio') ? old('bio') : $user->bio)}}">
                                @error('bio')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="fb_url" class="col-form-label">Facebook URL:</label>
                                <input type="text" name="fb_url" class="form-control @error('fb_url') is-invalid @enderror" placeholder="Facebook URL" value="{{(old('fb_url') ? old('fb_url') : $user->short_description)}}">
                                @error('fb_url')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="twitter_url" class="col-form-label">Twitter URL:</label>
                                <input type="text" name="twitter_url" class="form-control @error('twitter_url') is-invalid @enderror" placeholder="Twitter URL" value="{{(old('twitter_url') ? old('twitter_url') : $user->twitter_url)}}">
                                @error('twitter_url')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="linkedin_url" class="col-form-label">Linkedin URL:</label>
                                <input type="text" name="linkedin_url" class="form-control @error('linkedin_url') is-invalid @enderror" placeholder="Linkedin URL" value="{{(old('linkedin_url') ? old('linkedin_url') : $user->linkedin_url)}}">
                                @error('linkedin_url')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="instagram_url" class="col-form-label">Instagram URL:</label>
                                <input type="text" name="instagram_url" class="form-control @error('instagram_url') is-invalid @enderror" placeholder="Instagram URL" value="{{(old('instagram_url') ? old('instagram_url') : $user->instagram_url)}}">
                                @error('instagram_url')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Password</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('user.changepassword.save')}}">
                        @csrf
                        
                        <div class="form-group col-md-6">
                            <label for="old_password" class="col-form-label">Old Password</label>
                            <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" autofocus="" placeholder="Old password" value="{{old('old_password')}}">
                            @error('old_password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="password" class="col-form-label">New Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="New password">
                            @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="password_confirmation" class="col-form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                        </div>

                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">Update</button>
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
