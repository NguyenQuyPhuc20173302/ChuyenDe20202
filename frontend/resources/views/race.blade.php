@extends('master.master')
@section('content')
<!--==============================Content=================================-->
			@if(Session::has('success'))
      			<h1 style="color : red; text-align: center">{{ Session::get('success') }}</h1>
    		@endif
			<h3 style="margin-left: 200px; color : red">Các cuộc thi sắp diễn ra</h3>
			
			@foreach($incompletedRace as $result)
			<div style="margin-top: 20px" class="container">
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $result->race_id }}">{{ $result->name }}</a>
					</h3>
				</div>
				<div id="collapse{{ $result->race_id }}" class="panel-collapse in">
					<div class="panel-body">
					<ul>
						<div class= "row">
							<div class = "col-sm-10">
								<li>Mã cuộc thi:{{ $result->race_id }}</li>
								<li>Thời gian:{{ $result->time }}</li>
								<li>Giải thưởng:{{ $result->prize }}</li>
							</div>
							<div class = "col-sm-2">
								<button type="submit" class="btn btn-defauld" onclick="registerRace({{ $result->race_id }})"><a href = "join">Đăng ký tham gia</a></button>
							</div>
						</div>	
					</ul>
					</div>
				</div>
				</div>
				
			</div> 
			</div>
			@endforeach
			<div>
			{{ $incompletedRace->links() }}
			</div>
			<h3 style="margin-left: 200px; color : red">Các cuộc thi đã diễn ra</h3>
			@foreach($completedRace as $result)
			<div style="margin-top: 20px" class="container">
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $result->race_id }}">{{ $result->name }}</a>
					</h3>
				</div>
				<div id="collapse{{ $result->race_id }}" class="panel-collapse in">
					<div class="panel-body">
					<ul>
						<div class= "row">
							<div class = "col-sm-10">
								<li>Mã cuộc thi:{{ $result->race_id }}</li>
								<li>Thời gian:{{ $result->time }}</li>
								<li>Giải thưởng:{{ $result->prize }}</li>
							</div>
							<div class = "col-sm-2">
								<button type="submit" class="btn btn-defauld" onclick="registerRace({{ $result->race_id }})"><a href = "{{ url('member') }}">Chi tiết</a></button>
							</div>
						</div>	
					</ul>
					</div>
				</div>
				</div>
				
			</div> 
			</div>
			@endforeach
			<div>
			{{ $completedRace->links() }}
			</div>
		</div>
		@endsection