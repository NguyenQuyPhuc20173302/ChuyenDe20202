@extends('backend.master')
@section('content')
<h2>Sửa đường đua</h2>
<form action="{{ url('admin/edit-track/'.$track->track_id) }}" method="POST">
{{ csrf_field()}}
   <div class="form-group">
      <label for="name">Tên đường đua:</label>
      <input type="text" class="form-control" id="name" placeholder="{{ $track->name }}" name="name">
   </div>
   <div class="form-group">
      <label for="location">Địa điểm:</label>
      <input type="text" class="form-control" id="location" placeholder="{{ $track->location }}" name="location">
   </div>
   <div class="form-group">
      <label for="long">Độ dài:</label>
      <input type="text" class="form-control" id="long" placeholder="{{ $track->long }}" name="long">
   </div>
   <button type="submit" class="btn btn-danger">Submit</button>
</form>
@endsection