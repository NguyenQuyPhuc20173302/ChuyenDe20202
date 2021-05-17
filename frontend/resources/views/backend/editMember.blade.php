@extends('backend.master')
@section('content')
<h2>Cập nhật thông tin</h2>
<form action="{{ url('admin/edit-member/'.$member->member_id.'/'.$member->race_id.'/'.$member->member_race_id) }}" method="POST">
{{ csrf_field()}}
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" disabled="disabled" value="{{ $member->username }}" name="username">
   </div>
   <div class="form-group">
      <label for="age">Tuổi:</label>
      <input type="text" class="form-control" id="age" disabled="disabled" value="{{ $member->age }}" name="age">
   </div>
   <div class="form-group">
      <label for="gender">Giới tính:</label>
      <input type="text" class="form-control" id="gender" disabled="disabled" value="{{ $member->gender }}" name="gender">
   </div>
   <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="email" disabled="disabled" name="email" value="{{ $member->email }}">
   </div>
   <div class="form-group">
      <label for="name">Tên cuộc thi:</label>
      <input type="text" class="form-control" id="name" disabled="disabled" name="name" value="{{ $member->name }}">
   </div>
   <div class="form-group">
      <label for="run_time">Thời gian chạy:</label>
      <input type="time" class="form-control" id="run_time" name="run_time" placeholder="{{ $member->run_time }}">
   </div>
   <div class="form-group">
      <label for="rank">Xếp hạng:</label>
      <input type="text" class="form-control" id="rank" name="rank" placeholder="{{ $member->rank }}">
   </div>
   <button type="submit" class="btn btn-danger">Submit</button>
</form>
@endsection