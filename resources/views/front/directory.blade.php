@extends('front.layouts.master')

@section('head-script-style')    
@endsection

@section('title')
    Directory
@endsection

@section('content')
<section class="inner_banner_section resource_banner directory_banner" style="background-image: url({{asset('front/images/directory-banner.jpg')}});">
    <div class="container">					
        <div class="resource_banner_content directory_banner_content">
            <h1 class="text-uppercase darkblue proxima_bold text-center">Find an <span class="proxima_black golden">Expert</span></h1>
            <div class="expart_search_wrap">
                <form action="{{route('front.search.expert')}}">
                    <input type="hidden" value="" name="search" id="search_field">
                    <div class="expart_search_top">
                        <div class="expart_search_grid">
                            <label>Category</label>
                            <select id="category" name="category">
                                <option value="" hidden>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" 
                                    @php
                                        if (!empty($_GET['category'])) {
                                            if ($_GET['category'] == $category->id) {
                                                echo 'selected';
                                            }
                                        }
                                    @endphp
                                    >{{$category->name}}</option>
                                @endforeach
                                <option value="">Remove category</option>
                            </select>
                        </div>
                        <div class="expart_search_grid">
                            <label>Available</label>
                            <select id="availability" name="availability">
                                <option value="" hidden>Select Availability</option>
                                @foreach ($availability as $item)
                                    <option value="{{$item->id}}"@php
                                        if (!empty($_GET['availability'])) {
                                            if ($_GET['availability'] == $item->id) {
                                                echo 'selected';
                                            }
                                        }
                                    @endphp>{{$item->name}}</option>
                                @endforeach
                                <option value="">Remove availability</option>
                            </select>
                        </div>
                        <div class="expart_search_grid">
                            <label>Language</label>
                            <select id="language" name="language">
                                <option value="" hidden>Select Language</option>
                                @foreach ($language as $item)
                                    <option value="{{$item->id}}"@php
                                        if (!empty($_GET['language'])) {
                                            if ($_GET['language'] == $item->id) {
                                                echo 'selected';
                                            }
                                        }
                                    @endphp>{{$item->name}}</option>
                                @endforeach
                                <option value="">Remove language</option>
                            </select>
                        </div>
                        <button class="search_icon_top" type="submit">
                            <img src="{{asset('front/images/search_icon.png')}}" alt="">
                        </button>
                    </div>
                </form>
                {{-- <form action="{{route('front.directory')}}" autocomplete="off"> --}}
                    <div class="expart_search_bottom">
                        <span class="proxima_black darkblue text-uppercase">or</span>
                        <input type="text" placeholder="Search an Expert via Name" name="expert" id="expert_input">
                        {{-- <button class="search_icon_bottom" type="submit">
                            <img src="{{asset('front/images/search_icon.png')}}" alt="">
                        </button> --}}
                        <div id="search_result" class="dir__search_right" style="display: none;"></div>
                    </div>
                {{-- </form> --}}
            </div>		
        </div>
    </div>
</section>
<!-- banner_section -->



<section class="mentors_section directory_mentors_section">
    <div class="container">
        <div class="section_heading how_it_wrok_heading text-center">
            <h2 class="proxima_black text-uppercase darkblue">Experts</h2>
            <p class="darkgray proxima_light">Greater Pittsburgh's Expert Basement Waterproofing & Foundation Repair Contractor</p>
        </div>

        <div class="available_sessions">
            <h3 class="proxima_normal darkblue" id="count_section"></h3>
        </div>
        <div class="row" id="course_list"></div>
        <div class="text-center view_all_mentor">
            <a href="javascript:void(0);" class="green_btn parimary_btn" id="load_more">Load More</a>
        </div>
        {{-- <div class="text-center view_all_mentor">
            <a href="{{route('front.experts')}}" class="green_btn parimary_btn" id="load_more">View all Experts</a>
        </div> --}}
    </div>
    <div class="mentors_section_plane">
        <img class="img-fluid" src="{{asset('front/images/how_it_work_plane.png')}}">
    </div>
</section>
<!-- mentors_section -->

@endsection

@include('front.ajax.course-search-data')