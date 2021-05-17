@extends('backend.master')
@section('content')
<h2>Thêm đường đua</h2>
<form action="{{ url('admin/add-track') }}" method="POST">
{{ csrf_field()}}
   <div class="form-group">
      <label for="name">Tên đường đua:</label>
      <input type="text" class="form-control" id="name" placeholder="Tên đường đua" name="name">
   </div>
   <div class="form-group">
      <label for="location">Địa điểm:</label>
      <input type="text" class="form-control" id="location" placeholder="Địa điểm" name="location">
   </div>
   <div class="form-group">
      <label for="long">Độ dài:</label>
      <input type="text" class="form-control" id="long" placeholder="Độ dài" name="long">
   </div>
   <button type="submit" class="btn btn-danger">Submit</button>
</form>
@endsection