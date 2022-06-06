<!-- Expert session booking modal -->
<div class="modal fade" id="bookSessionModal" tabindex="-1" role="dialog" aria-labelledby="bookSessionModalTitle"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Book session</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-sm alert-success p-1">
                    <p class="small mb-0">Book <strong>15 minutes</strong> video session with {{$teacher->name}}</p>
                </div>
                <p class="text-muted small">
                    Date : 
                    <strong>
                        <span class="text-dark" id="sessionDate"></span>
                        <span class="text-dark" id="sessionTime"></span>
                    </strong>
                </p>
                <p class="text-muted small">
                    Note : 
                    <span class="text-dark" id="sessionNote"></span>
                </p>
                <p class="text-muted small">
                    Amount : 
                    <strong><span class="text-dark" id="sessionAmount">${{$teacher->hourly_rate/4}}</span></strong>
                </p>
                {{-- <form action="{{ route('payment.session.video') }}" method="POST" id="videoSessionForm"> --}}
                <form action="javascript: void(0)" method="GET">
                @csrf
                    @error('userId') <small class="text-danger">{{$message}}</small> @enderror
                    @auth
                        <input type="hidden" name="slotId" id="sessionslotId">
                        <input type="hidden" name="amount" id="videoSessionExpertRate" value="{{$teacher->hourly_rate/4}}">
                        <button id="videoSessionForm" type="submit" class="btn btn-primary btn-sm btn-block" onclick="stripePaymentStart('{{$teacher->hourly_rate/4}}', '{{ route('payment.session.video') }}', 'usd', 'video')">Pay ${{$teacher->hourly_rate/4}}</button>
                    @endauth
                    @guest
                        <p class="small mb-0 text-danger">You have to login first</p>
                        <a href="{{url('login')}}" class="btn btn-danger btn-sm btn-block">Login now</a>
                    @endguest
                </form>
                <p class="small mb-0 mt-2 text-muted"><i class="fa fa-lock"></i> This payment is secured</p>
            </div>
        </div>
    </div>
</div>