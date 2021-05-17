@extends('backend.master')
@section('content')
<h2>Sửa cuộc thi</h2>
<form action="{{ url('admin/edit-race/'.$race->race_id) }}" method="POST">
{{ csrf_field()}}
   <div class="form-group">
      <label for="name">Tên cuộc thi:</label>
      <input type="text" class="form-control" id="name" placeholder="{{ $race->name }}" name="name">
   </div>
   <div class="form-group">
      <label for="prize">Giải thưởng:</label>
      <input type="text" class="form-control" id="prize" placeholder="{{ $race->prize }}" name="prize">
   </div>
   <div class="form-group">
      <label for="time">Thời gian diễn ra:</label>
      <input type="datetime-local" class="form-control" id="time" value="{{ $race->time }}.format('YYYY-MM-DDTkk:mm')" name="time">
   </div>
   <div class="form-group">
      <label for="track_id">Đường đua:</label>
      <select class="form-control" id="track_id" name="track_id" value="{{ $race->track_id }}">
         <option>1</option>
         <option>2</option>
         <option>3</option>
         <option>4</option>
      </select>
   </div>
   <div class="form-group">
      <label for="winner">Người chiến thắng:</label>
      <input type="text" class="form-control" id="winner" name="winner" placeholder="{{ $race->winner }}">
   </div>
   <button type="submit" class="btn btn-danger">Submit</button>
</form>
@endsection