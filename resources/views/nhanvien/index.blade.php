@extends('layouts.main')

@section('title')
Danh sách nhân viên
@stop


@section('content')
<div class="portlet">
	<div class="portlet-content">
		<ul id="footer-side">
		<li class="btn btn-primary"><a href="{{ url('/nhanvien/create') }}">Tạo mới</a></li>
		</ul>
	</div>
</div>

<section class="panel">
<header class="panel-heading">Quản lý Nhân Viên</header>
<div class="panel-body">

<table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>MaNV</th>
        <th>User</th>
        <th>Họ tên</th>
        <th>Giới tính</th>
        <th>Ngày sinh</th>
        <th>Chức vụ</th>
        <th>Phòng ban</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($nhanvienlist as $nhanvien)
      <tr>
        <td>{{ $nhanvien->manv }}</td>
        <td>{{ $user::find($nhanvien->userid)['name'] }}</td>
        <td>{{ $nhanvien->hoten }}</td>
        <td>{{ $nhanvien->gioitinh ? "Nam" : "Nữ" }} </td>
        <td>{{ date('d-m-Y', strtotime($nhanvien->ngaysinh)) }}</td>
        <td>{{ $chucvu::find($nhanvien->macv)->chucvu }}</td>
        <td>{{ $phongban::find($nhanvien->mapb)->tenphongban }}</td>
        <td align="center">
          <a class="view" title="View" href="{{ url('/nhanvien') }}/{{$nhanvien->manv}}"><i class="fa fa-eye"></i></a>
          <a class="update" title="Update" href="{{ url('/nhanvien/edit') }}/{{$nhanvien->manv}}"><i class="fa fa-edit"></i></a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  {{ $nhanvienlist->links() }}

</div>
</section>
@endsection
