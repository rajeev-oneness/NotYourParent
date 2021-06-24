@section('script')
<script>
$(document).ready(function() {
    var page = 0;
    $('#load_more').click(function() {
        page += 1;
        getCourses();
    });
    getCourses();

    function getCourses() {
        // getting parameters
        let params = {_token:'{{csrf_token()}}',page:page};
        @foreach($request as $key => $req)
            params['{{$key}}'] = '{{$req}}';
        @endforeach
        // console.log(params);
        // getting Data as per the parameters
        $.ajax({
            url: "{{route('directory.search.ajax')}}",
            type: "POST",
            data: params,
            success:function(data) {
                console.log(data.data);
                count = '<span class="text-uppercase proxima_exbold">'+data.total+' SESSIONS</span> Available Now';
                $("#count_section").html(count);
                courses = '';
                
                if(data.error == false) {
                    if(data.requests.expert){
                        $('#expert_input').val(data.requests.expert);
                    }
                    // if(data.requests.topic){
                    //     $('#expert_input').val(data.requests.expert);
                    // }
                    if(data.data.length > 0) {
                        $.each(data.data, function(i, val) {
                            expert_href = "{{route('front.experts', ['expertId' => 'expert_id'])}}";
                            expert_href = expert_href.replace('expert_id', val.teacher_detail.id);
                            courses += '<div class="col-lg-4"><div class="mentor_course"><div class="mentor_course_img">';
                            courses += '<img src="{{asset("")}}'+val.course_img+'"><div class="mentor_course_overlay">';
                            courses += '<h4 class="white proxima_exbold text-uppercase"><sub class="proxima_normal">'+val.course_name.substr(0,6)+'</sub> '+val.course_name.substr(6,11)+'</h4><h3 class="green proxima_exbold text-uppercase">'+val.course_name.substr(17,13)+'</h3>';
                            courses += '<ul><li class="mentor_time"><img src="{{asset("front/images/time_icon.png")}}"> '+val.duration+' minutes</li><li class="mentor_price">'+val.price+'$ <span>Only</span></li></ul></div></div>';
                            courses += '<div class="mentor_course_content"><div class="mentor_course_review"><div class="mentor_course_review_img">';
                            courses += '<img src="{{asset("")}}'+val.teacher_detail.image+'"></div>';
                            courses += '<div class="mentor_course_review_name"><h5>'+val.teacher_detail.name+'</h5><h6>'+val.teacher_detail.short_description+'</h6></div></div><p>'+val.course_desc+'</p><ul><li><a href="#">Consult Now</a></li><li><a href="'+expert_href+'">Visit Profile</a></li></ul></div></div></div>';
                        });
                        $('#course_list').append(courses);
                    } else {
                        $('#course_list').append('<div class="col-12 text-center"><h4 class="proxima_black text-uppercase darkblue">No More Data!</h4></div>');
                        $("#load_more").css('display', 'none');
                    }
                }
                
            }
        })
    }
})
</script>
@endsection