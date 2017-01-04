@extends('layouts.main')

@section('title')
Cập nhật lương
@stop

@section('content')
<div class="portlet" id="yw2">
	<div class="portlet-content">
		<ul id="footer-side">
			<li class="btn btn-primary"><a href="{{ route('luong.home') }}">Danh sách</a></li>
			<li class="btn btn-primary"><a href="{{ route('luong.view', $id) }}">Xem chi tiết</a></li>
		</ul>
	</div>
</div>
<section class="panel">
	<header class="panel-heading">Cập nhật lương : {{ $tennhanvien }}</header>
	<div class="panel-body">
		<div class="form-group col-lg-12">
			<p class="note">Những mục đánh dấu <span class="required">*</span> không được để trống.</p>
		</div>
		<form class="form-horizontal" role="form" method="POST" action="{{ route('luong.update', $id) }}" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group col-lg-12">
			<label class="col-sm-3 control-label">Họ tên:</label>
			<div class="col-sm-6">
				<label class="control-label">{{ $tennhanvien }}</label>
			</div>
		</div>

		<div class="form-group col-lg-12">
			<label class="col-sm-3 control-label" for="Luong_Ngay">Lương tháng</label>
			<div class="col-sm-6">
				<label class="col-sm-3 control-label" for="Luong_Ngay">{{ date('m-Y',strtotime($luong->ngay)) }}</label>
			</div>
		</div>
		
		<div class="form-group col-lg-12">
			<label class="col-sm-3 control-label" for="Luong_LuongCanBan">Lương cơ bản</label>
			<div class="col-sm-6">
				<input class="form-control" readonly="1" name="Luong[LuongCanBan]" id="Luong_LuongCanBan" type="text" value="{{ $luong->luongcoban }}">
			</div>
		</div>

		<div class="form-group col-lg-12">
			<label class="col-sm-3 control-label" for="Luong_LuongCanBan">Trợ cấp</label>
			<div class="col-sm-6">
				<input class="form-control" readonly="1" name="Luong[LuongCanBan]" id="Luong_LuongCanBan" type="text" value="{{ $luong->trocap }}">
			</div>
		</div>

		<div class="form-group col-lg-12">
			<label class="col-sm-3 control-label" for="Luong_LuongCanBan">Tổng lương</label>
			<div class="col-sm-6">
				<input class="form-control" readonly="1" name="Luong[LuongCanBan]" id="Luong_LuongCanBan" type="text" value="{{ $luong->luongcoban + $luong->trocap }}">
			</div>
		</div>

		<div class="form-group col-lg-12">
			<label class="col-sm-3 control-label" for="Luong_LuongCanBan">Ngày công:</label>
			<div class="col-sm-6">
				<input class="form-control" readonly="1" name="Luong[LuongCanBan]" id="Luong_LuongCanBan" type="text" value="{{ $luong->ngaycong }}">
			</div>
		</div>

		<div class="form-group col-lg-12">
			<label class="col-sm-3 control-label" for="Luong_LuongCanBan">Ngày nghỉ:</label>
			<div class="col-sm-6">
				<input class="form-control" readonly="1" name="Luong[LuongCanBan]" id="Luong_LuongCanBan" type="text" value="{{ $luong->ngaynghi }}">
			</div>
		</div>

		<div class="form-group col-lg-12">
			<label class="col-sm-3 control-label" for="Luong_LuongCanBan">Ngày phép:</label>
			<div class="col-sm-6">
				<input class="form-control" readonly="1" name="Luong[LuongCanBan]" id="Luong_LuongCanBan" type="text" value="{{ $luong->ngayphep }}">
			</div>
		</div>

		<div class="form-group col-lg-12">
			<label class="col-sm-3 control-label" for="Luong_LuongCanBan">Ngày công hưởng lương:</label>
			<div class="col-sm-6">
				<input class="form-control" readonly="1" name="Luong[LuongCanBan]" id="Luong_LuongCanBan" type="text" value="{{ $luong->ngaycong - $luong->ngaynghi + $luong->ngayphep }}">
			</div>
		</div>

		<div class="form-group col-lg-12">
			<label class="col-sm-3 control-label" for="Luong_LuongCanBan">Lương bình quân ngày:</label>
			<div class="col-sm-6">
				<input class="form-control" readonly="1" name="Luong[LuongCanBan]" id="Luong_LuongCanBan" type="text" value="{{ ($luong->luongcoban + $luong->trocap)/26 }}">
			</div>
		</div>

		<div class="form-group col-lg-12">
			<label class="col-sm-3 control-label" for="Luong_LuongCanBan">Lương tăng ca ngày thường:</label>
			<div class="col-sm-6">
				<input class="form-control" readonly="1" name="Luong[LuongCanBan]" id="Luong_LuongCanBan" type="text" value="{{ $luong->tangcathuong }}">
			</div>
		</div>

		<div class="form-group col-lg-12">
			<label class="col-sm-3 control-label" for="Luong_LuongCanBan">Lương tăng ca ngày lễ:</label>
			<div class="col-sm-6">
				<input class="form-control" readonly="1" name="Luong[LuongCanBan]" id="Luong_LuongCanBan" type="text" value="{{ $luong->tangcale }}">
			</div>
		</div>

		<div class="form-group col-lg-12">
			<label class="col-sm-3 control-label" for="Luong_LuongCanBan">Lương tăng ca chủ nhật:</label>
			<div class="col-sm-6">
				<input class="form-control" readonly="1" name="Luong[LuongCanBan]" id="Luong_LuongCanBan" type="text" value="{{ $luong->tangcacn }}">
			</div>
		</div>

		<div class="form-group col-lg-12">
			<label class="col-sm-3 control-label" for="Luong_LuongCanBan">Lương nhận:</label>
			<div class="col-sm-6">
				<input class="form-control" readonly="1" name="Luong[LuongCanBan]" id="Luong_LuongCanBan" type="text" value="{{ $luong->luongthucnhan }}">
			</div>
		</div>
		<div class="form-group">
		    <div class="col-md-6 col-md-offset-4">
		        <button type="submit" class="btn btn-info">
		            Cập nhật
		        </button>
		    </div>
		</div>
	</form>
	</div>
</section>

@endsection