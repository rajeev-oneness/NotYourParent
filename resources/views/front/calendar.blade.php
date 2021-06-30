<div class="calender">
    <div class="calender_left">
        <div class="calender_heading">
            <h4 class="proxima_exbold black" id="month_heading">{{date('M')}} <span class="green" id="year_heading">{{date('Y')}}</span></h4>
            <ul>
                <li><a href="javascript:void(0);" id="pMonth" ><img src="{{asset('front/images/blue-arrow-left.png')}}" alt=""></a></li>
                <li><a href="javascript:void(0);" id="nMonth"><img src="{{asset('front/images/blue-arrow-right.png')}}" alt=""></a></li>
            </ul>
        </div>
        <div class="calendar-table" id="calendar_table">
            <div class="weeks" id="weeks">
                @php
                    $firstDay = date('Y-m-01');
                @endphp
                @for($day=0;$day<7;$day++)
                    <div class="days">{{date('D',strtotime($firstDay.'+'.$day.' days'))}}</div>
                @endfor
            </div>
            <div class="dates" id="dates">
                @php
                    $totalDays = date('t');
                @endphp
                @for ($i = 1; $i <= $totalDays; $i++)
                <div class="date-boxes">{{$i}}</div>
                @endfor 
                {{-- <div class="date-boxes inactive">29</div>
                <div class="date-boxes">30</div> --}}
            </div>
        </div>
    </div>
    <div class="calender_right" id="slot_timing">
        <h5 class="white">WEDNESDAY MAY 15<sup>th</sup></h5>
        <ul class="times">
            <li>7:00am - 7:15am</li>
            <li>7:30am - 7:45am</li>
            <li>8:15am - 8:30am</li>
            <li>9:00am - 9:15am</li>
            <li>9:45am - 10:00am</li>
            <li>4:00pm - 4:15pm</li>
            <li>4:45pm - 5:00pm</li>
        </ul>
    </div>
</div>

