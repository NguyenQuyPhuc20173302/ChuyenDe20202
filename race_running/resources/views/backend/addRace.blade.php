@extends('backend.master')
@section('content')
<h2>Thêm cuộc thi</h2>
<form action="{{ url('admin/add-race') }}" method="POST">
{{ csrf_field()}}
   <div class="form-group">
      <label for="name">Tên cuộc thi:</label>
      <input type="text" class="form-control" id="name" placeholder="Nhập tên cuộc thi" name="name">
   </div>
   <div class="form-group">
      <label for="prize">Giải thưởng:</label>
      <input type="text" class="form-control" id="prize" placeholder="Giải thưởng" name="prize">
   </div>
   <div class="form-group">
      <label for="time">Thời gian diễn ra:</label>
      <input type="datetime-local" class="form-control" id="time" placeholder="Thời gian diễn ra" name="time">
   </div>
   <div class="form-group">
      <label for="track_id">Đường đua:</label>
      <select class="form-control" id="track_id" name="track_id">
         <option>1</option>
         <option>2</option>
         <option>3</option>
         <option>4</option>
      </select>
   </div>
   <button type="submit" class="btn btn-danger">Submit</button>
</form>
@endsection