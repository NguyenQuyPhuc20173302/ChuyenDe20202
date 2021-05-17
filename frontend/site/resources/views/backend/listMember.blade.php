@extends('backend.master')
@section('back-crumb', "Thành viên tham gia cuộc thi")
@section('content')
@if(Session::has('success'))
<h1 style="color : red; text-align: center">{{ Session::get('success') }}</h1>
@endif
<h2>Danh sách thành viên tham gia cuộc thi</h2>
<div style="margin-bottom: 20px">Tìm kiếm : <input type="text" id="search"></div>
<table class="table table-striped">
   <thead>
      <tr>
         <th scope="col">ID</th>
         <th scope="col">Username</th>
         <th scope="col">Tuổi</th>
         <th scope="col">Xếp hạng</th>
         <th scope="col">Email</th>
         <th scope="col">Tên cuộc thi</th>
         <th scope="col">Thời gian chạy</th>
         <th scope="col">Thao tác</th>
      </tr>
   </thead>
   <tbody class="elements-list">
      @foreach($members as $member)
      <tr>
         <th scope="row">{{ $member->member_id }}</th>
         <td>{{ $member->username }}</td>
         <td>{{ $member->age }}</td>
         <td>{{ $member->rank }}</td>
         <td>{{ $member->email }}</td>
         <td>{{ $member->name }}</td>
         <td>{{ $member->run_time }}</td>
         <td><button class="btn btn-primary"> <a href="{{ url('admin/edit-member/'.$member->member_id.'/'.$member->race_id.'/'.$member->member_race_id) }}">Sửa</a> </button></td>      </tr>
      @endforeach
   </tbody>
</table>
<script>
   $(document).ready(function(){
       var data = [];
       $.ajax({
               type: 'GET',
               url: 'http://127.0.0.1:8000/admin/data',
               contentType: "application/json; charset=utf-8",
               success: function(datas) {
                // console.log(datas);
                    window.data = datas;
               }
        });
        //Tìm kiếm
        $("#search").change(function () {
            var valueSearch = $(this).val();
            // console.log(valueSearch);
            search(window.data, valueSearch);
        });
        //Hàm tìm kiếm
        function search(data, valueSearch) {
            $(".paginate").empty();
            // console.log(valueSearch);
            console.log(data);
            $(".elements-list").empty();
            listUrlChange = []
            for (var i = 0; i < data.length; i++) {
                // console.log(data[i]["name"]);
                if (data[i]["name"].includes(valueSearch) || data[i]["username"].includes(valueSearch)) {
                    console.log(data[i]["name"]);
                    // listUrlChange.push(data[i]);
                    $(".elements-list").append(`<tr>
                        <th scope="row">` + data[i]["member_id"] + `</th>
                        <td>` + data[i]["username"] + `</td>
                        <td>` + data[i]["age"] + `</td>
                        <td>` + data[i]["gender"] + `</td>
                        <td>` + data[i]["email"] + `</td>
                        <td>` + data[i]["name"] + `</td>
                        <td>` + data[i]["run_time"] + `</td>
                        <td><button class="btn btn-primary"> <a href=admin/edit-member/`+ parseInt(data[i]["member_id"]) + `/` + data[i]["race_id"] + data[i]["member_race_id"] +`>Sửa</a> </button></td>
                        <td><button class="btn btn-danger"><a href=admin/delete-member/`+ parseInt(data[i]["member_id"]) + `/` + data[i]["race_id"] + data[i]["member_race_id"] +`>Xóa</a></button></td>
                    </tr>`);
                }
            }
        }
   });
</script>
@endsection