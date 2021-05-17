@extends('backend.master')
@section('content')
    @if(Session::has('success'))
      	<h1 style="color : red; text-align: center">{{ Session::get('success') }}</h1>
    @endif
    <h2>Danh sách đường đua</h2>
    <button class="btn btn-success"> <a href="{{ url('/admin/add-track') }}">Thêm đường đua</a> </button>
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Tên đường đua</th>
        <th scope="col">Địa điểm</th>
        <th scope="col">Độ dài</th>
        <th scope="col">Thao tác</th>
        <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tracks as $track)
        <tr>
        <th scope="row">{{ $track->track_id }}</th>
        <td>{{ $track->name }}</td>
        <td>{{ $track->location }}</td>
        <td>{{ $track->long }} (m)</td>
        <td><button class="btn btn-primary"> <a href="{{ url('admin/edit-track/'.$track->track_id) }}">Sửa</a> </button></td>
        <td><button class="btn btn-danger"><a href="{{ url('admin/delete-track/'.$track->track_id) }}">Xóa</a></button></td>
        </tr>
        @endforeach
    </tbody>
    </table>
    {{ $tracks->links() }}
@endsection