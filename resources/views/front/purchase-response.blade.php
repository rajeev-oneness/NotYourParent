@extends('front.layouts.master')

@section('head-script-style')    
@endsection

@section('title')
    Purchase response
@endsection

@section('content')

<section class="privacy_policy_section my-5" id="">
    <div class="container">
        <div class="section_heading how_it_wrok_heading text-center">
            <h2 class="proxima_black text-uppercase white">Choose the best Experts for you</h2>
            <p class="white proxima_light">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>

        <div class="mentor_tab_content_wrap">
            <div class="row">
                <div class="col-md-12">
                    @if (Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>Thank you for your purchase</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
    
@endsection