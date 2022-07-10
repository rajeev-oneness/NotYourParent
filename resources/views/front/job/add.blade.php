
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
                                           <a href="javascript: void(0)"><span>Headline</span></a>
                                            <a href="javascript: void(0)"><span>Skills</span></a>
                                            <a href="javascript: void(0)"><span>Scope</span></a>
                                            <a href="javascript: void(0)"><span>Budget</span></a>
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
                                           
                                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title"   onblur="validateInput(this.value)">
                                            <p class="small text-danger" id="titleErr"></p>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Write Description for your job post</label>
                                           
                                            <textarea class="form-control" rows="4" name="description" id="description" onblur="validateDes(this.value)" value="{{ old('description') }}"/>@error('description') {{ $message ?? '' }} @enderror</textarea>
                                             <p class="small text-danger" id="DescServiceErr"></p>
                                        </div>
                                    </div>
                                    <div class="exampleHeading">
                                        <!-- <h6>Example titles</h6>
                                        <ul>
                                            <li>Build responsive WordPress site with booking/payment functionality</li>
                                            <li>Graphic designer needed to design ad creative for multiple campaigns</li>
                                            <li>Facebook ad specialist needed for product launch</li>
                                        </ul> -->
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
                                             <a href="javascript: void(0)"><span>Headline</span></a>
                                            <a href="javascript: void(0)"><span>Skills</span></a>
                                            <a href="javascript: void(0)"><span>Scope</span></a>
                                            <a href="javascript: void(0)"><span>Budget</span></a>
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
                                            
                                            <textarea class="form-control" rows="4" name="skill" id="skill" onblur="validateSkill(this.value)" value="{{ old('skill') }}"/>@error('skill') {{ $message ?? '' }} @enderror</textarea>
                                   
                                           <p class="small text-danger" id="skillErr"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Write expertise for your job post</label>
                                            
                                            <textarea class="form-control" rows="4" name="experience" id="experience" onblur="validateExp(this.value)" value="{{ old('experience') }}"/>@error('experience') {{ $message ?? '' }} @enderror</textarea>
                                   
                                           <p class="small text-danger" id="ExperienceErr"></p>
                                        </div>
                                    </div>
                                    <div class="exampleHeading">
                                       <!--  <h6>Example titles</h6>
                                        <ul>
                                            <li>Build responsive WordPress site with booking/payment functionality</li>
                                            <li>Graphic designer needed to design ad creative for multiple campaigns</li>
                                            <li>Facebook ad specialist needed for product launch</li>
                                        </ul> -->
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
                                            <a href="javascript: void(0)"><span>Headline</span></a>
                                            <a href="javascript: void(0)"><span>Skills</span></a>
                                            <a href="javascript: void(0)"><span>Scope</span></a>
                                            <a href="javascript: void(0)"><span>Budget</span></a>
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
                                           <textarea class="form-control" rows="4" name="scope" id="scope" onblur="validateScope(this.value)" value="{{ old('scope') }}"/>@error('scope') {{ $message ?? '' }} @enderror</textarea>
                                             <p class="small text-danger" id="ScopeErr"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Write Project Duration for your job post</label>
                                           <textarea class="form-control" rows="4" name="time" id="time" onblur="validateTime(this.value)" value="{{ old('time') }}"/>@error('time') {{ $message ?? '' }} @enderror</textarea>
                                             <p class="small text-danger" id="TimeErr"></p>
                                        </div>
                                    </div>
                                    <div class="exampleHeading">
                                      <!--   <h6>Example titles</h6>
                                        <ul>
                                            <li>Build responsive WordPress site with booking/payment functionality</li>
                                            <li>Graphic designer needed to design ad creative for multiple campaigns</li>
                                            <li>Facebook ad specialist needed for product launch</li>
                                        </ul> -->
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
                                            <a href="javascript: void(0)"><span>Headline</span></a>
                                            <a href="javascript: void(0)"><span>Skills</span></a>
                                            <a href="javascript: void(0)"><span>Scope</span></a>
                                            <a href="javascript: void(0)"><span>Budget</span></a>
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
                                            <textarea class="form-control" rows="4" name="budget" id="budget" onblur="validateBudget(this.value)" value="{{ old('budget') }}"/>@error('budget') {{ $message ?? '' }} @enderror</textarea>
                                             <p class="small text-danger" id="BudgetErr"></p>

                                        </div>
                                        <div class="form-group">
                                            <label>Write Duration for your job post</label>
                                            <textarea class="form-control" rows="4" name="duration" id="duration" onblur="validateDuration(this.value)" value="{{ old('duration') }}"/>@error('duration') {{ $message ?? '' }} @enderror</textarea>
                                             <p class="small text-danger" id="DurationErr"></p>

                                        </div>
                                            <div class="form-group">
                                            <label>Write Sample Question for your job post</label>
                                            <textarea class="form-control" rows="4" name="sample_question" id="sample_question" onblur="validateDuration(this.value)" value="{{ old('sample_question') }}"/>@error('sample_question') {{ $message ?? '' }} @enderror</textarea>
                                             <p class="small text-danger" id="DurationErr"></p>

                                        </div>
                                        <div class="form-group">
                                            <label>Write end date for your job post</label>
                                           <input type="date" class="form-control" rows="4" name="end_date" id="end_date" onblur="validateDate(this.value)" value="{{ old('end_date') }}"/>@error('end_date') {{ $message ?? '' }} @enderror
                                             <p class="small text-danger" id="DateErr"></p>

                                        </div>
                                        <div class="form-group">
                                            <label>Write Location for your job post</label>
                                           <input type="text" class="form-control" rows="4" name="location" id="location" onblur="validateLocation(this.value)" value="{{ old('location') }}"/>@error('location') {{ $message ?? '' }} @enderror
                                             <p class="small text-danger" id="locationErr"></p>
                                        </div>
                                    </div>
                                    <div class="exampleHeading">
                                        <!-- <h6>Example titles</h6>
                                        <ul>
                                            <li>Build responsive WordPress site with booking/payment functionality</li>
                                            <li>Graphic designer needed to design ad creative for multiple campaigns</li>
                                            <li>Facebook ad specialist needed for product launch</li>
                                        </ul> -->
                                    </div>

                                    <div class="row justify-content-end post_job_form_foot">
                                        <div class="col-auto">
                                            <button type="submit" class="continue_btn" >Submit</button>
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
                  <script>
                function validateInput(val) {
                    console.log(val)
                    if (val.length < 2) {
                        $("#titleErr").html('Value must be at least three letters');
                        $("#title").removeClass('mobile-valide');
                        $("#title").addClass('mobile-novalide');

                        console.log(val);
                    } else {
                        $("#titleErr").html('');
                        $("#title").addClass('mobile-valide');
                        $("#title").removeClass('mobile-novalide');
                    }


                }
                function validateNumber(e) {
                    console.log(e.charCode);
                    if (!(e.charCode > 96 && e.charCode < 123)) {
                        $("#titleErr").html('Value must be a letter');
                        $("#title").removeClass('mobile-valide');
                        $("#title").addClass('mobile-novalide');
                        return false
                    } else {
                        $("#titleErr").html('');
                        $("#title").addClass('mobile-valide');
                        $("#title").removeClass('mobile-novalide');
                    }
                }

                
                function validateDes(val) {
                    console.log(val);
                    if (val.length < 2) {
                        $("#DescServiceErr").html('Your Description should be at least 2 characters');
                        $("#description").removeClass('mobile-valide');
                        $("#description").addClass('mobile-novalide');
                    } else {
                        $("#DescServiceErr").html('')
                        $("#description").addClass('mobile-valide');
                        $("#description").removeClass('mobile-novalide');
                    }

                }
               

                function validateSkill(val) {
                    console.log(val);
                    if (val.length < 2) {
                        $("#SkillErr").html('Value must be at least three letters');
                        $("#skill").removeClass('mobile-valide');
                        $("#skill").addClass('mobile-novalide');
                    }
                    else {
                        $("#SkillErr").html('');
                        $("#skill").addClass('mobile-valide');
                        $("#skill").removeClass('mobile-novalide');
                    }
                }
                 function validateExp(val) {
                    console.log(val);
                    if (val.length < 2) {
                        $("#ExperienceErr").html('Value must be at least three letters');
                        $("#experience").removeClass('mobile-valide');
                        $("#experience").addClass('mobile-novalide');
                    }
                    else {
                        $("#ExperienceErr").html('');
                        $("#experience").addClass('mobile-valide');
                        $("#experience").removeClass('mobile-novalide');
                    }
                }

                function validateScope(val) {
                    console.log(val);
                    if (val.length < 2) {
                        $("#ScopeErr").html('Value must be at least three letters');
                        $("#scope").removeClass('mobile-valide');
                        $("#scope").addClass('mobile-novalide');
                    } else {
                        $("#ScopeErr").html('')
                        $("#scope").addClass('mobile-valide');
                        $("#scope").removeClass('mobile-novalide');
                    }

                }
                function validateTime(val) {
                    console.log(val);
                    if (val.length < 2) {
                        $("#TimeErr").html('Value must be at least three letters');
                        $("#time").removeClass('mobile-valide');
                        $("#time").addClass('mobile-novalide');
                    } else {
                        $("#TimeErr").html('')
                        $("#time").addClass('mobile-valide');
                        $("#time").removeClass('mobile-novalide');
                    }

                }

                function validateBudget(val) {
                    console.log(val);
                    if (val.length < 2) {
                        $("#BudgetErr").html('Value must be at least three letters');
                        $("#budget").removeClass('mobile-valide');
                        $("#budget").addClass('mobile-novalide');
                    } else {
                        $("#BudgetErr").html('')
                        $("#budget").addClass('mobile-valide');
                        $("#budget").removeClass('mobile-novalide');
                    }

                }
                function validateDuration(val) {
                    console.log(val);
                    if (val.length < 2) {
                        $("#DurationErr").html('Value must be at least three letters');
                        $("#duration").removeClass('mobile-valide');
                        $("#duration").addClass('mobile-novalide');
                    } else {
                        $("#DurationErr").html('')
                        $("#duration").addClass('mobile-valide');
                        $("#duration").removeClass('mobile-novalide');
                    }

                }
                function validateDate(val) {
                    console.log(val);
                    if (val.length < 2) {
                        $("#DateErr").html('Value must be proper');
                        $("#end_date").removeClass('mobile-valide');
                        $("#end_date").addClass('mobile-novalide');
                    } else {
                        $("#DateErr").html('')
                        $("#end_date").addClass('mobile-valide');
                        $("#end_date").removeClass('mobile-novalide');
                    }

                }
                function validateLocation(val) {
                    console.log(val);
                    if (val.length < 2) {
                        $("#locationErr").html('Value must be at least three letters');
                        $("#location").removeClass('mobile-valide');
                        $("#location").addClass('mobile-novalide');
                    } else {
                        $("#locationErr").html('')
                        $("#location").addClass('mobile-valide');
                        $("#location").removeClass('mobile-novalide');
                    }

                }
               
                // function validateNumber(e) {
                //     console.log(e.charCode);
                //     if (!(e.charCode > 96 && e.charCode < 123)) {
                //         $("#ServiceErr").html('Value must be a letter');
                //     }
                // }
            
        $("#showSkills").click(function(){
            //console.log('hi');
        // validation
        if($('#title').val() == "") {
            $('#titleErr').text('Please enter Job Title');
        } else if ($('#description').val() == "") {
            $('#DescServiceErr').text('Please enter Description');
        
        } else {
            $("#skills_step").show();
            $('html, body').animate({
            scrollTop: $("#skills_step").offset().top - 50
            }, 1000);
            $(this).attr('disabled', true);
            $(".registerWizard li").removeClass("active");
            $(".registerWizard li:nth-child(2)").addClass("active");
        }
    })
     $("#showScope").click(function(){
        // validation
        if($('#skill').val() == "") {
            $('#SkillErr').text('Please enter Skill');
          } else if($('#experience').val() == "") {
            $('#ExperienceErr').text('Please enter Experience');
        
        } else {
            $("#scope_step").show();
            $('html, body').animate({
            scrollTop: $("#scope_step").offset().top - 50
            }, 1000);
            $(this).attr('disabled', true);
            $(".registerWizard li").removeClass("active");
            $(".registerWizard li:nth-child(2)").addClass("active");
        }
    })
    $("#showBudget").click(function(){
        if($('#scope').val() == "") {
            $('#ScopeErr').text('Please enter Business Phone');
        } else if($('#time').val() == "") {
            $('#TimeErr').text('Please enter Time ');
       
        // } else if($('#description').val() == "") {
        //     $('#DescServiceErr').text('Please enter Business Description');
        // } else if($('#service_description').val() == "") {
        //     $('#ServiceErr').text('Please enter Service Description');
        } else {
            $("#budget_step").show();
            $('html, body').animate({
            scrollTop: $("#budget_step").offset().top - 50
            }, 1000);
            $(this).attr('disabled', true);
            $(".registerWizard li").removeClass("active");
            $(".registerWizard li:last-child").addClass("active");
        }
    });

    
   $('input[name="title"]').on('keyup', function() {
            var $this = 'input[name="title"]'

            if ($($this).val().length > 0) {
                $.ajax({
                    url: '{{ route('user.category') }}',
                    method: 'post',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        code: $($this).val(),
                    },
                    success: function(result) {
                        var content = '';
                        if (result.error === false) {
                            content += `<div class="dropdown-menu show w-100 postcode-dropdown" aria-labelledby="dropdownMenuButton">`;

                            $.each(result.data, (key, value) => {
                                content += `<a class="dropdown-item" href="javascript: void(0)" onclick="fetchCode(${value.pin})">${value.state}, ${value.suburb}, ${value.pin}</a>`;
                            })
                            content += `</div>`;
                            // $($this).parent().after(content);
                        } else {
                            content += `<div class="dropdown-menu show w-100 postcode-dropdown" aria-labelledby="dropdownMenuButton"><li class="dropdown-item">${result.message}</li></div>`;
                        }
                        $('.respDrop').html(content);
                    }
                });
            } else {
                $('.respDrop').text('');
            }
        });

        function fetchCode(code) {
            $('.postcode-dropdown').hide()
            $('input[name="address"]').val(code)
        }
  
    </script>
@endsection


