
@extends('front.layouts.master')

@section('head-script-style')
@endsection

@section('title')
    Saved Jobs
@endsection

@section('content')



<section class="post_job_section header_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <form method="POST" action="{{ route('front.jobs.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="start_date" value="{{ date('Y-m-d') }}">
                    <div class="jobPost_get_started" id="jobPostGetStarted">
                        <div class="jobPost_get_started_top">
                            <h3 class="mb-0">Getting started</h3>
                        </div>

                        <div class="jobPost_get_started_body">
                            <div class="jobPost_get_started_body_top">
                                <h4>What would you like to do?</h4>
                                <label>
                                    <input checked type="radio" name="">
                                    <span></span>
                                    Create a new job post
                                </label>
                            </div>

                            <div class="jobPost_get_started_body_bottom">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="jobPost_get_started_body_box">
                                            <i class="fal fa-clock"></i>
                                            <label>
                                                <input class="jobliketoDo" type="radio" name="type" value="Short term or part time work">
                                                <span></span>
                                            </label>
                                            <div class="jobPost_get_started_body_box_text">
                                                <h5>Short term or part time work</h5>
                                                {{-- <p class="m-0">Less than 30 hrs/week</p>
                                                <p class="m-0">Less than 30 hrs/week</p> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="jobPost_get_started_body_box">
                                            <i class="fal fa-calendar-alt"></i>
                                            <label>
                                                <input class="jobliketoDo" type="radio" name="type" value="Designated, longer term work">
                                                <span></span>
                                            </label>
                                            <div class="jobPost_get_started_body_box_text">
                                                <h5>Designated, longer term work</h5>
                                                {{-- <p class="m-0">More than 30 hrs/week</p>
                                                <p class="m-0">3+ months</p> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="jobPost_get_started_foot">
                            <div class="row justify-content-end">
                                <a href="#" class="cancle_btn mr-3">Cancel</a>
                                <button type="button" class="continue_btn btn-disable" disabled id="continueBtn">Continue</button>
                            </div>
                        </div>
                    </div>

                    <div class="post_job_box" id="headline_step">
                        <div class="row">
                            <div class="col-6">
                                <div class="post_job_form_left">
                                    <div class="post_job_progress">
                                        <div class="post_job_progress_bar">
                                            <span></span>
                                        </div>

                                        <div class="post_job_progress_text">
                                            <span>Headline</span>
                                            <span>Skills</span>
                                            <span>Scope</span>
                                            <span>Budget</span>
                                        </div>
                                    </div>


                                    <div class="">
                                        <h3>Let's start with a strong headline.</h3>
                                        <p>This helps your job post stand out to the right candidates. It’s the first thing they’ll see, so make it count!</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 align-slef-center">
                                <div class="post_job_form_right">
                                    <div class="mb-5">
                                        <div class="form-group">
                                            <label>Write a headline for your job post</label>
                                            <input type="text" class="form-control" name="title">
                                        </div>

                                        <div class="form-group">
                                            <label>Write Description for your job post</label>
                                            <textarea type="text" class="form-control" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="exampleHeading">
                                        <h6>Example titles</h6>
                                        <ul>
                                            <li>Build responsive WordPress site with booking/payment functionality</li>
                                            <li>Graphic designer needed to design ad creative for multiple campaigns</li>
                                            <li>Facebook ad specialist needed for product launch</li>
                                        </ul>
                                    </div>

                                    <div class="row justify-content-end post_job_form_foot">
                                        <div class="col-auto">
                                            <button type="button" class="continue_btn" id="showSkills">Next: Skills</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="post_job_box" id="skills_step">
                        <div class="row">
                            <div class="col-6">
                                <div class="post_job_form_left">
                                    <div class="post_job_progress">
                                        <div class="post_job_progress_bar">
                                            <span></span>
                                        </div>

                                        <div class="post_job_progress_text">
                                            <span>Headline</span>
                                            <span>Skills</span>
                                            <span>Scope</span>
                                            <span>Budget</span>
                                        </div>
                                    </div>


                                    <div class="">
                                        <h3>Let's start with a strong headline.</h3>
                                        <p>This helps your job post stand out to the right candidates. It’s the first thing they’ll see, so make it count!</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 align-slef-center">
                                <div class="post_job_form_right">
                                    <div class="mb-5">
                                        <div class="form-group">
                                            <label>Write a skills for your job post</label>
                                            <textarea type="text" class="form-control" name="skill"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Write expertise for your job post</label>
                                            <textarea type="text" class="form-control" name="experience"></textarea>
                                        </div>
                                    </div>
                                    <div class="exampleHeading">
                                        <h6>Example titles</h6>
                                        <ul>
                                            <li>Build responsive WordPress site with booking/payment functionality</li>
                                            <li>Graphic designer needed to design ad creative for multiple campaigns</li>
                                            <li>Facebook ad specialist needed for product launch</li>
                                        </ul>
                                    </div>

                                    <div class="row justify-content-end post_job_form_foot">
                                        <div class="col-auto">
                                            <button type="button" class="continue_btn" id="showScope">Next: Scope</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="post_job_box" id="scope_step">
                        <div class="row">
                            <div class="col-6">
                                <div class="post_job_form_left">
                                    <div class="post_job_progress">
                                        <div class="post_job_progress_bar">
                                            <span></span>
                                        </div>

                                        <div class="post_job_progress_text">
                                            <span>Headline</span>
                                            <span>Skills</span>
                                            <span>Scope</span>
                                            <span>Budget</span>
                                        </div>
                                    </div>


                                    <div class="">
                                        <h3>Let's start with a strong headline.</h3>
                                        <p>This helps your job post stand out to the right candidates. It’s the first thing they’ll see, so make it count!</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 align-slef-center">
                                <div class="post_job_form_right">
                                    <div class="mb-5">
                                        <div class="form-group">
                                            <label>Write a scope for your job post</label>
                                            <textarea type="text" class="form-control" name="scope"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Write Project Duration for your job post</label>
                                            <textarea type="text" class="form-control" name="time"></textarea>
                                        </div>
                                    </div>
                                    <div class="exampleHeading">
                                        <h6>Example titles</h6>
                                        <ul>
                                            <li>Build responsive WordPress site with booking/payment functionality</li>
                                            <li>Graphic designer needed to design ad creative for multiple campaigns</li>
                                            <li>Facebook ad specialist needed for product launch</li>
                                        </ul>
                                    </div>

                                    <div class="row justify-content-end post_job_form_foot">
                                        <div class="col-auto">
                                            <button type="button" class="continue_btn" id="showBudget">Next: Budget</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="post_job_box" id="budget_step">
                        <div class="row">
                            <div class="col-6">
                                <div class="post_job_form_left">
                                    <div class="post_job_progress">
                                        <div class="post_job_progress_bar">
                                            <span></span>
                                        </div>

                                        <div class="post_job_progress_text">
                                            <span>Headline</span>
                                            <span>Skills</span>
                                            <span>Scope</span>
                                            <span>Budget</span>
                                        </div>
                                    </div>


                                    <div class="">
                                        <h3>Let's start with a strong headline.</h3>
                                        <p>This helps your job post stand out to the right candidates. It’s the first thing they’ll see, so make it count!</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 align-slef-center">
                                <div class="post_job_form_right">
                                    <div class="mb-5">
                                        <div class="form-group">
                                            <label>Write budget for your job post</label>
                                            <input type="text" class="form-control" name="budget">

                                        </div>
                                        <div class="form-group">
                                            <label>Write Duration for your job post</label>
                                            <input type="text" class="form-control" name="duration">

                                        </div>

                                        <div class="form-group">
                                            <label>Write end date for your job post</label>
                                            <input type="text" class="form-control" name="end_date">

                                        </div>
                                        <div class="form-group">
                                            <label>Write Location for your job post</label>
                                            <input type="text" class="form-control" name="location">
                                        </div>
                                    </div>
                                    <div class="exampleHeading">
                                        <h6>Example titles</h6>
                                        <ul>
                                            <li>Build responsive WordPress site with booking/payment functionality</li>
                                            <li>Graphic designer needed to design ad creative for multiple campaigns</li>
                                            <li>Facebook ad specialist needed for product launch</li>
                                        </ul>
                                    </div>

                                    <div class="row justify-content-end post_job_form_foot">
                                        <div class="col-auto">
                                            <button type="submit" class="continue_btn" id="showSkills">Submit</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    var swiper = new Swiper(".job_skill_slider", {
      slidesPerView: "auto",
      centeredSlides: false,
      dots:false,
      spaceBetween: 10,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>
  <script type="text/javascript">
            $(".jobliketoDo").change(function(){
                $("#continueBtn").attr('disabled', false);
                $('.jobliketoDo:not(:checked)').parents(".jobPost_get_started_body_box").removeClass("is_active");
                $('.jobliketoDo:checked').parents(".jobPost_get_started_body_box").addClass("is_active");
            });

            $("#continueBtn").click(function(){
                $("#headline_step").show();
                $("#jobPostGetStarted").hide();
            });
            $("#showSkills").click(function(){
                $("#skills_step").show();
                $("#headline_step").hide();
            });
            $("#showScope").click(function(){
                $("#scope_step").show();
                $("#skills_step").hide();
            });
            $("#showBudget").click(function(){
                $("#budget_step").show();
                $("#scope_step").hide();
            });
        </script>
@endsection
