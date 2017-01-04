@extends('layouts.main')

@section('title')
Tạo nhân viên
@stop


@section('content')
<div class="portlet" id="yw1">
	<div class="portlet-content">
	<ul id="footer-side">
	<li class="btn btn-primary"><a href="{{ url('/nhanvien') }}">Quản lý</a></li>
	</ul>
	</div>
</div>
<section class="panel">
	<header class="panel-heading">Tạo mới nhân viên</header>
	<div class="panel-body">
		<div class="panel-body">
			<div class="form-group col-lg-12">
				<p class="note">Những mục đánh dấu <span class="required">*</span> không được để trống.</p>
			</div>
            
            <div class="form-group col-md-6 col-md-offset-3">
                @if($errors->count())

                    @foreach($errors->all() as $error)
                        <div class="errorMessage">
                            {{ $error }}
                        </div>
                    @endforeach            

                @endif
            </div>

			<form class="form-horizontal" role="form" method="POST" action="{{ route('nhanvien.store') }}" enctype="multipart/form-data">
                
                {{ csrf_field() }}

                <div class="form-group col-lg-12">
				<label for="userid" class="col-md-4 control-label">Username <span class="required">*</span></label>
                    <div class="col-sm-6">
                    <select class="form-control" name="userid">
                        @foreach($users as $user)
                          <option value="{{$user->id}}" {{ $user->id == $userIDcurrent ? "selected":"" }}>{{$user->name}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>

                <div class="form-group col-lg-12">
				<label for="avatar" class="col-md-4 control-label">Avatar </label>
                    <div class="col-sm-6">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <img class="thumb_img" src="{{ asset('/asset/images/avatar/noimage.gif') }}" alt="your image">
                        <br>
                        <span class="btn btn-white btn-file">
                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Chọn file</span>
                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Chọn file khác</span>
                            <input class="default" name="NhanvienAvatar" id="NhanvienAvatar" type="file">
                       </span>
                        <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                    </div>
                    </div>
                </div>
                <div class="form-group col-lg-12">
				<label for="hoten" class="col-md-4 control-label">Họ tên <span class="required">*</span></label>
                    <div class="col-sm-6">
                        <input id="hoten" type="text" value="{{ old('hoten') }}" class="form-control" name="hoten" placeholder="Họ tên" required />
                    </div>
                </div>
                <div class="form-group col-lg-12">
                <label for="gioitinh" class="col-md-4 control-label">Giới tính <span class="required">*</span></label>
                    <div class="col-sm-6">
                        <select class="form-control" name="gioitinh" id="gioitinh">
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-lg-12">
				<label for="ngaysinh" class="col-md-4 control-label">Ngày sinh <span class="required">*</span></label>
                    <div class="col-sm-6">
                        <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?php echo date('Y-m-d')?>"  class="input-append date dpYears">
                        <input type="text" id="ngaysinh" value="{{ old('ngaysinh') }}" name="ngaysinh" class="form-control" placeholder="Ngày sinh" required />
                        <span class="input-group-btn add-on">
                        <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                <label for="email" class="col-md-4 control-label">Email </label>
                    <div class="col-sm-6">
                        <input id="email" type="email" value="{{ old('email') }}" class="form-control" name="email" placeholder="Email" />
                    </div>
                </div>
                <div class="form-group col-lg-12">
                <label for="cmnd" class="col-md-4 control-label">CMND <span class="required">*</span></label>
                    <div class="col-sm-6">
                        <input id="cmnd" type="text" class="form-control" value="{{ old('cmnd') }}" name="cmnd" placeholder="CMND" required />
                    </div>
                </div>
                <div class="form-group col-lg-12">
                <label for="dienthoai" class="col-md-4 control-label">Điện thoại <span class="required">*</span></label>
                    <div class="col-sm-6">
                        <input id="dienthoai" type="text" value="{{ old('dienthoai') }}" class="form-control" name="dienthoai" placeholder="Điện thoại" required />
                    </div>
                </div>
                <div class="form-group col-lg-12">
                <label for="diachi" class="col-md-4 control-label">Địa chỉ </label>
                    <div class="col-sm-6">
                        <input id="diachi" type="text" value="{{ old('diachi') }}" class="form-control" name="diachi" placeholder="Địa chỉ" />
                    </div>
                </div>
                <div class="form-group col-lg-12">
                <label for="ngaybatdaulamviec" class="col-md-4 control-label">Ngày bắt đầu làm việc <span class="required">*</span></label>
                    <div class="col-sm-6">
                        <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?php echo date('Y-m-d')?>"  class="input-append date dpYears">
                        <input type="text" id="ngaybatdaulamviec" value="{{ old('ngaybatdaulamviec') }}" name="ngaybatdaulamviec" class="form-control" placeholder="Ngày bắt đầu làm việc" required />
                        <span class="input-group-btn add-on">
                        <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                <label for="tinhtrang" class="col-md-4 control-label">Tình trạng làm việc <span class="required">*</span></label>
                    <div class="col-sm-6">
                        <select class="form-control" name="tinhtrang">
                            @foreach($tinhtranglamviec as $ttlv)
                              <option value="{{$ttlv->matt}}">{{$ttlv->tinhtranglamviec}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                <label for="bangcap" class="col-md-4 control-label">Bằng cấp <span class="required">*</span></label>
                    <div class="col-sm-6">
                        <select class="form-control" name="bangcap">
                            @foreach($bangcap as $bc)
                              <option value="{{$bc->mabc}}">{{$bc->bangcap}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                <label for="phongban" class="col-md-4 control-label">Phòng ban <span class="required">*</span></label>
                    <div class="col-sm-6">
                        <select class="form-control" name="phongban">
                            @foreach($phongban as $pb)
                              <option value="{{$pb->mapb}}">{{$pb->tenphongban}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                <label for="chucvu" class="col-md-4 control-label">Chức vụ <span class="required">*</span></label>
                    <div class="col-sm-6">
                        <select class="form-control" name="chucvu">
                            @foreach($chucvu as $cv)
                              <option value="{{$cv->macv}}">{{$cv->chucvu}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                <label for="chucvu" class="col-md-4 control-label">Lương cơ bản <span class="required">*</span></label>
                    <div class="col-sm-6">
                        <input id="luongcoban" type="text" value="{{ old('luongcoban') }}" class="form-control" name="luongcoban" placeholder="Lương cơ bản" required />
                    </div>
                </div>
                <div class="form-group col-lg-12">
                <label for="chucvu" class="col-md-4 control-label">Trợ cấp <span class="required">*</span></label>
                    <div class="col-sm-6">
                        <input id="trocap" type="text" value="{{ old('trocap') }}" class="form-control" name="trocap" placeholder="Trợ cấp" required />
                    </div>
                </div>
                <div class="form-group col-lg-12">
                <label for="chucvu" class="col-md-4 control-label">Nghỉ phép <span class="required">*</span></label>
                    <div class="col-sm-6">
                        <input id="nghiphep" type="text" value="{{ old('nghiphep') }}" class="form-control" name="nghiphep" placeholder="Nghỉ phép" required />
                    </div>
                </div>
                <div class="form-group col-lg-12">
                <label for="ghichu" class="col-md-4 control-label">Ghi chú </label>
                    <div class="col-sm-6">
                    <textarea class="form-control" rows="5" value="{{ old('ghichu') }}" id="ghichu" name="ghichu"> </textarea>
                    </div>
                </div>
				<div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-info">
                            Đăng ký
                        </button>
                    </div>
                </div>
			</form>

		</div>
	</div>
</section>

@endsection