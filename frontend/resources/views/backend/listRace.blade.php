@extends('backend.master')
@section('back-crumb', "Danh sách cuộc thi")
@section('content')
    @if(Session::has('success'))
      	<h1 style="color : red; text-align: center">{{ Session::get('success') }}</h1>
    @endif
    <h2>Danh sách cuộc thi</h2>
    <button class="btn btn-success"> <a href="{{ url('/admin/add-race') }}">Thêm cuộc thi</a> </button>
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Tên cuộc thi</th>
        <th scope="col">Giải thưởng</th>
        <th scope="col">Thời gian diễn ra</th>
        <th scope="col">Người chiến thắng</th>
        <th scope="col">Thao tác</th>
        <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($races as $race)
        <tr>
        <th scope="row">{{ $race->race_id }}</th>
        <td>{{ $race->name }}</td>
        <td>{{ $race->prize }}</td>
        <td>{{ $race->time }}</td>
        <td>{{ $race->winner }}</td>
        <td><button class="btn btn-primary"> <a href="{{ url('admin/edit-race/'.$race->race_id) }}">Sửa</a> </button></td>
        <td><button class="btn btn-danger"><a href="{{ url('admin/delete-race/'.$race->race_id) }}">Xóa</a></button></td>
        </tr>
        @endforeach
    </tbody>
    </table>
    {{ $races->links() }}
@endsection