@extends('master.master')
@section('content')
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
			<ul>
				<li>Mã cuộc thi:{{ $race->race_id }}</li>
				<li>Thời gian:{{ $race->time }}</li>
				<li>Giải thưởng:{{ $race->prize }}</li>
				<li>Người thắng cuộc:{{ $race->winner }}</li>
			</ul>
		</div>
	</div>
@endsection
