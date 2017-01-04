@extends('layouts.main')

@section('title')
Lương nhân viên {{ $tennhanvien }}
@stop

@section('content')
<div class="portlet" id="yw2">
	<div class="portlet-content">
		<ul id="footer-side">
			<li class="btn btn-primary"><a href="{{ route('luong.edit', $id) }}">Cập nhật</a></li>
			<li class="btn btn-primary"><a href="{{ route('luong.delete', $id) }}">Xóa</a></li>
			<li class="btn btn-primary"><a href="{{ route('luong.home') }}">Quản lý</a></li>
			<!-- <li class="btn btn-primary"><a href="">Xuất Excel</a></li> -->
		</ul>
	</div>
</div>

<section class="panel">
	<header class="panel-heading">Nhân viên : <strong>{{ $tennhanvien }}</strong></header>
	<div class="panel-body">
		<table class="table table-striped">
			<tbody>
				<tr><th>Họ tên:</th><td>{{ $tennhanvien }}</td></tr>
				<tr><th>Mã NV:</th><td>{{ $luong->manv }}</td></tr>
				<tr><th>Lương tháng:</th><td>{{ date('m-Y',strtotime($luong->ngay)) }}</td></tr>
				<tr><th>Lương cơ bản:</th><td>{{ $luong->luongcoban }}</td></tr>
				<tr><th>Trợ cấp:</th><td>{{ $luong->trocap }}</td></tr>
				<tr><th>Tổng lương: </th><td>{{ $luong->luongcoban + $luong->trocap }}</td></tr>
				<tr><th>Ngày công</th><td>{{ $luong->ngaycong }}</td></tr>
				<tr><th>Ngày nghỉ</th><td>{{ $luong->ngaynghi }}</td></tr>
				<tr><th>Ngày nghỉ phép</th><td>{{ $luong->ngayphep }}</td></tr>
				<tr><th>Ngày công hưởng lương:</th><td>{{ $luong->ngaycong - $luong->ngaynghi + $luong->ngayphep }}</td></tr>
				<tr><th>Lương bình quân ngày:</th><td>{{ ($luong->luongcoban + $luong->trocap)/26 }}</td></tr>
				<tr><th>Lương tăng ca ngày thường:</th><td>{{ $luong->tangcathuong }}</td></tr>
				<tr><th>Lương tăng ca ngày lễ:</th><td>{{ $luong->tangcale }}</td></tr>
				<tr><th>Lương tăng ca chủ nhật:</th><td>{{ $luong->tangcacn }}</td></tr>
				<tr><th>Lương nhận:</th><td>{{ $luong->luongthucnhan }}</td></tr>
			</tbody>
		</table>
	</div>
</section>

@endsection