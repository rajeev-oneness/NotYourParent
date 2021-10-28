<!-- Case study purchase modal -->
<div class="modal fade" id="coursePurchaseModal" tabindex="-1" role="dialog" aria-labelledby="coursePurchaseModalTitle"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="coursePurchaseModalTitle">Purchase Case study</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="w-100">
                    @if(!empty($course->preview_video_url))
                    <video class="mb-3" controls muted>
                        <source src="{{$course->preview_video_url}}" type="video/mp4">
                    </video>
                    @else
                    <div class="w-100 text-center mb-3" style="height: 150px;">
                        <img src="{{asset($course->image)}}" alt="course-image" class="img-thumbnail h-100">
                    </div>
                    @endif
                </div>
                <h6 class="">{{$course->name}}</h6>
                <hr>
                <p class="text-muted small">
                    Expert : 
                    <span class="text-dark">{{$course->teacherDetail->name}}</span>
                </p>
                <p class="text-muted small">
                    Duration : 
                    <span class="text-dark">{{$course->duration}} minutes</span>
                </p>
                <p class="text-muted small">
                    Amount : 
                    <strong><span class="text-dark">$<span class="courseAmount"></span></span></strong>
                </p>
                <form action="{{ route('payment.casestudy') }}" method="POST">
                @csrf
                    @error('userId') <small class="text-danger">{{$message}}</small> @enderror
                    @auth
                        <input type="hidden" name="courseId" id="courseId" value="{{$course->id}}">
                        <input type="hidden" name="amount" id="courseFormAmountId" value="">
                        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                        <button type="submit" class="btn btn-primary btn-sm btn-block">Pay $<span class="courseAmount"></span></button>
                    @endauth
                    @guest
                        <p class="small mb-0 text-danger">You have to login first</p>
                        <a href="{{url('login')}}" class="btn btn-danger btn-sm btn-block">Login now</a>
                    @endguest
                </form>
                <p class="small mb-0 mt-2 text-muted"><i class="fa fa-lock"></i> This payment is secured</p>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>