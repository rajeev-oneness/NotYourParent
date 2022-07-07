@section('script')
<script>
$(document).ready(function() {

    var test = 'test';
    var page = 0;
    $('#load_more').click(function() {
        page += 1;
        getCourses();
    });

    getCourses();

    function getCourses() {
        // getting parameters
        let params = {page:page};
        @foreach($request as $key => $req)
            params['{{$key}}'] = '{{$req}}';
        @endforeach
        // console.log(params);
        // getting Data as per the parameters
        $.ajax({
            url: "{{route('directory.search.ajax')}}",
            type: "POST",
            dataType:'JSON',
            data: params,
            success:function(data) {
                console.log(data);

                if (data.total > 1) {
                    count = '<span class="text-uppercase proxima_exbold">'+data.total+'</span> Results found';
                } else {
                    count = '<span class="text-uppercase proxima_exbold">'+data.total+'</span> Result found';
                }
                $("#count_section").html(count);
                var courses = '';
                var expert_profile_route = '';

                if(data.error == false) {
                    if(data.data.length > 0) {
                        $.each(data.data, function(i, val) {
                            expert_profile_route = "{{route('front.experts.single', ['expertId' => 'expertIdVal'])}}";
                            expert_profile_route = expert_profile_route.replace('expertIdVal', val.id);

                            courses += '<div class="col-md-4 mb-3">';
                            courses += '<div class="mentor_course">';
                            courses += '<div class="mentor_course_content">';
                            courses += '<div class="mentor_course_review">';
                            courses += '<div class="mentor_course_review_img">';
                            courses += '<img src="'+val.image+'">';
                            // courses += '<img src="{{asset("")}}'+val.image+'">';
                            courses += '</div>';
                            courses += '<div class="mentor_course_review_name">';
                            courses += '<h5 class="mb-0">'+val.name+'</h5>';
                            courses += '<p class="mb-0">Expert in '+val.primary_category+'</p>';
                            courses += '</div></div>';
                            // courses += '<p class="small mt-3 mb-0" style="max-height: 60px;overflow: hidden">'+val.bio+'</p>';
                            courses += '<div class="d-flex mb-2 mt-3">';

                            courses += '<div class="availability_section"><span class="badge badge-light badge-pill" title="Expert is '+val.availability_name+'"> <i class="fa fa-circle text-'+val.availability_type+'"></i> '+val.availability_name.toUpperCase()+'</span></div>';

                            if (val.hourly_rate) {
                                courses += '<div class="rate_section"><span class="badge badge-light badge-pill" title="Hourly rate of Expert is $'+val.hourly_rate+'">$'+val.hourly_rate+'/ hr</span></div>';
                            }
                            if (val.review) {
                                courses += '<div class="rating_section"><span class="badge badge-pill" title="K2 review is '+val.review+'">'+val.review+' <i class="fa fa-star"></i> </span></div>';
                            }
                            courses += '</div>';
                            if (val.country) {
                                courses += '<div class="address_section"><span class="badge badge-pill" title="Address"><i class="fa fa-map-marker"></i> '+val.city.toUpperCase()+', '+val.state.toUpperCase()+', '+val.country.toUpperCase()+' </span></div>';
                            }
                            if (val.lang_name) {
                                courses += '<div class="address_section"><span class="badge badge-pill" title="Languages"> '+val.lang_name+' </span></div>';
                            }

                            courses += '<ul class="mt-4">';
                            courses += '<li><a href="'+expert_profile_route+'">Visit Profile</a></li>';
                            courses += '</ul></div></div></div>';
                        });
                        $('#course_list').append(courses);
                    } else {
                        $('#course_list').html('');
                        $("#load_more").css('display', 'none');
                    }
                    $('#search_field').val(data.requests.search);
                }

                // if(data.error == false) {
                //     if(data.requests.expert){
                //         $('#expert_input').val(data.requests.expert);
                //     }
                //     // if(data.requests.topic){
                //     //     $('#expert_input').val(data.requests.expert);
                //     // }
                //     if(data.data.length > 0) {
                //         $.each(data.data, function(i, val) {
                //             expert_href = "{{route('front.experts', ['expertId' => 'expert_id'])}}";
                //             expert_href = expert_href.replace('expert_id', val.teacher_detail.id);
                //             courses += '<div class="col-lg-4"><div class="mentor_course"><div class="mentor_course_img">';
                //             courses += '<img src="{{asset("")}}'+val.course_img+'"><div class="mentor_course_overlay">';
                //             courses += '<h4 class="white proxima_exbold text-uppercase"><sub class="proxima_normal">'+val.course_name.substr(0,6)+'</sub> '+val.course_name.substr(6,11)+'</h4><h3 class="green proxima_exbold text-uppercase">'+val.course_name.substr(17,13)+'</h3>';
                //             courses += '<ul><li class="mentor_time"><img src="{{asset("front/images/time_icon.png")}}"> '+val.duration+' minutes</li><li class="mentor_price">'+val.price+'$ <span>Only</span></li></ul></div></div>';
                //             courses += '<div class="mentor_course_content"><div class="mentor_course_review"><div class="mentor_course_review_img">';
                //             courses += '<img src="{{asset("")}}'+val.teacher_detail.image+'"></div>';
                //             courses += '<div class="mentor_course_review_name"><h5>'+val.teacher_detail.name+'</h5><h6>'+val.teacher_detail.short_description+'</h6></div></div><p>'+val.course_desc+'</p><ul><li><a href="#">Consult Now</a></li><li><a href="'+expert_href+'">Visit Profile</a></li></ul></div></div></div>';
                //         });
                //         $('#course_list').append(courses);
                //     } else {
                //         $('#course_list').append('<div class="col-12 text-center"><h4 class="proxima_black text-uppercase darkblue">No More Data!</h4></div>');
                //         $("#load_more").css('display', 'none');
                //     }
                // }
            }
        })
    }
})
</script>
@endsection