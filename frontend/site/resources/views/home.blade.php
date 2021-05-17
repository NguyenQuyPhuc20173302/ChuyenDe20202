@extends('master.master')
@section('content')
			<div class="slider_wrapper">
				<div id="camera_wrap" class="">
					<div data-src="images/slide.jpg">
						<div class="caption fadeIn">
							Run for Your Health
						</div>
					</div>
					<div data-src="images/slide1.jpg">
						<div class="caption fadeIn">
							Fast as Wind
						</div>
					</div>
					<div data-src="images/slide2.jpg">
						<div class="caption fadeIn">
							Never Stop
						</div>
					</div>
				</div>
			</div>
<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - April 21, 2014!</div>
	<div class="container_12">
		<div class="grid_12">
			
			<div class="container next-race">
				<!-- <h1>Countdown to my birthday:</h1> -->
				<h2 class="center">Cuộc đua tiếp theo </h2>
				<ul>
					<li><span id="days"></span>days</li>
					<li><span id="hours"></span>Hours</li>
					<li><span id="minutes"></span>Minutes</li>
					<li><span id="seconds"></span>Seconds</li>
				</ul>
			</div>
		</div>
		<div class="clear"></div>
		<div class="grid_4">
			<div class="box">
				<div class="box_title">Cuộc thi</div>
				<div class="box_bot">
					<div class="maxheight">
						<img src="images/page1_img1.jpg" alt=""><a href="race">Chi tiết</a>
					</div>
				</div>
			</div>
		</div>
		<div class="grid_4">
			<div class="box">
				<div class="box_title">Kết quả</div>
				<div class="box_bot">
					<div class="maxheight">
						<img src="images/page1_img2.jpg" alt=""><a href="achivements">Chi tiết</a>
					</div>
				</div>
			</div>
		</div>
		<div class="grid_4">
			<div class="box">
				<div class="box_title">Đăng ký</div>
				<div class="box_bot">
					<div class="maxheight">
						<img src="images/page1_img3.jpg" alt=""><a href="join">Tham gia ngay</a>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>

		<div class="clear"></div>
		<div class="grid_12">
			<div class="hor_separator"></div>
			<h3 class="head1 center">Các cuộc đua sắp diễn ra</h3>
		</div>
		<div class="clear"></div>
		<div class="grid_12">
			<div id="grid" class="main">
			@foreach($incompletedRace as $race)
					<ul>
						<div class= "row">
							<div class = "col-sm-6">
								<li>Mã cuộc thi:{{ $race->race_id }}</li>
								<li>Thời gian:{{ $race->time }}</li>
								<li>Giải thưởng:{{ $race->prize }}</li>
							</div>
							<div class = "col-sm-6">
								<button type="submit" class="btn btn-defauld" onclick="registerRace({{ $race->race_id }})"><a href = "{{ url('detail/'.$race->race_id) }}">Chi tiết</a></button>
							</div>
						</div>	
					</ul>
			@endforeach
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<script>
	var second = 1000,
		minute = second * 60,
		hour = minute * 60,
		day = hour * 24;

	var countDown = new Date('{{ $nextRaceTime }}').getTime();
    x = setInterval(function() {    

      let now = new Date().getTime(),
          distance = countDown - now;

      document.getElementById('days').innerText = Math.floor(distance / (day)),
        document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
        document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
        document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);

      //do something later when date is reached
      //if (distance < 0) {
      //  clearInterval(x);
      //  'IT'S MY BIRTHDAY!;
      //}

    }, second)
</script>
@endsection

