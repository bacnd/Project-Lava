@extends('layouts.main')

@section('title')
Thông tin nhân viên: {{ $nhanvien->hoten }}
@stop


@section('content')
<div class="row">
        <div class="col-md-12">
          <section class="panel">
            <div class="panel-body profile-information">
              <div class="col-md-3">
                <div class="profile-pic text-center"> 
                  <img src="{{ asset('/asset/images/avatar/'.$nhanvien->avatar) }}" alt="" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="profile-desk">
                  <h1>{{ $nhanvien->hoten }}</h1>
                  <span class="text-muted">{{ $chucvu::find($nhanvien->macv)->chucvu }} - Phòng {{ $phongban }}</span>
                  <h5><i class="fa fa-credit-card"></i>CMND: {{ $nhanvien->cmnd }}</h5>
                  <h5><i class="fa fa-phone"></i>Điện thoại: {{ $nhanvien->dienthoai }}</h5>
                  <h5><i class="fa fa-paper-plane"></i>Email: {{ $nhanvien->email }}</h5>
                  <h5><i class="fa fa-map-marker"></i>Địa chỉ: {{ $nhanvien->diachi }}</h5>
                </div>
              </div>
              <div class="col-md-3">
                <div class="profile-statistics">
                  <h1>{{ $nhanvien->nghiphep }} ngày</h1>
                  <p>Nghỉ phép</p>
                  <h5><i class="fa fa-birthday-cake"></i>Ngày Sinh: {{ date('d-m-Y', strtotime($nhanvien->ngaysinh)) }}</h5>
                  <h5><i class="fa fa-calendar"></i>Ngày bắt đầu làm việc: {{ date('d-m-Y', strtotime($nhanvien->ngaybatdaulamviec)) }}</h5>
                  <h5><i class="fa fa-money"></i>Lương cơ bản: {{ $nhanvien->luongcoban }} </h5>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="col-md-12">
          <section class="panel">
            <header class="panel-heading tab-bg-dark-navy-blue">
              <ul class="nav nav-tabs nav-justified ">
                <li class="active"> <a data-toggle="tab" href="#job-history"> Thông báo </a> </li>
                <li> <a data-toggle="tab" href="#overview"> Thành viên cùng phòng ban</a> </li>
                <li> <a data-toggle="tab" href="#settings"> Thiết lập </a> </li>
              </ul>
            </header>
            <div class="panel-body">
              <div class="tab-content tasi-tab">
              
              <!-- tab thong bao cong viec -->
                <div id="job-history" class="tab-pane active">
                  <div class="position-center">
                    <div class="prf-contacts sttng">
                      <h2>Thông báo công việc</h2>
                    </div>
                    Thong bao cong viec
                  </div>
                </div>

                <!-- tab thanh vien cung phong ban -->
                

                <div id="overview" class="tab-pane">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="prf-box">
                        <h3 class="prf-border-head">Thành viên</h3>

                        <div class=" wk-progress tm-membr">
                          <table class="table table-striped">
                            <tbody>
                            @forelse ($nvcphongban as $nvcpb)
                              <tr>
                                <td align="center"><div class="tm-avatar"> <img src="{{ asset('/asset/images/avatar/'.$nvcpb->avatar) }}" alt=""> </div></td>
                                <td align="center"><span class="tm">{{ $nvcpb->hoten }}</span></td>
                                <td align="center"><span class="tm">{{ $chucvu::find($nvcpb->macv)->chucvu }}</span></td>
                                <td align="center"><span class="tm">{{ $nvcpb->dienthoai }}</span></td>
                                <td align="center"><a href="#" class="btn btn-white">{{ $nvcpb->email }}</a></td>
                              </tr>
                              @empty
                                  <p>Không có nhân viên nào cùng phòng {{ $phongban }}!</p>
                              @endforelse
                            </tbody>
                          </table>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
                

                <!-- tab thiet lam -->
                <div id="settings" class="tab-pane ">
                  <div class="position-center">
                    <div class="prf-contacts sttng">
                      <h2> Thông tin nhân viên</h2>
                    </div>

<!-- Bat dau thiet lap -->
<form class="form-horizontal" role="form" method="POST" action="{{ route('nhanvien.updateshow', $nhanvien->manv) }}" enctype="multipart/form-data">
                
                {{ csrf_field() }}

                <div class="form-group col-lg-12">
                    <label for="avatar" class="col-sm-2 control-label">Avatar</label>
                    <div class="col-sm-6">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <img class="thumb_img" src="{{ asset('/asset/images/avatar/'.$nhanvien->avatar) }}" alt="your image">
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
                    <label for="hoten" class="col-sm-2 control-label">Họ tên <span class="required">*</span></label>
                    <div class="col-sm-6">
                        <input id="hoten" type="text" value="{{ $nhanvien->hoten }}" class="form-control" name="hoten" placeholder="Họ tên" />
                    </div>
                </div>

                <div class="form-group col-lg-12">
                    <label for="ngaysinh" class="col-sm-2 control-label">Ngày sinh <span class="required">*</span></label>
                    <div class="col-sm-6">
                        <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?php echo date('Y-m-d')?>"  class="input-append date dpYears">
                        <input type="text" id="ngaysinh" value="{{ $nhanvien->ngaysinh }}" name="ngaysinh" class="form-control" placeholder="Ngày sinh" />
                        <span class="input-group-btn add-on">
                        <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-lg-12">
                  <label for="email" class="col-sm-2 control-label">Email <span class="required">*</span></label>
                    <div class="col-sm-6">
                        <input id="email" type="email" value="{{ $nhanvien->email }}" class="form-control" name="email" placeholder="Email" />
                    </div>
                </div>

                <div class="form-group col-lg-12">
                  <label for="cmnd" class="col-sm-2 control-label">CMND <span class="required">*</span></label>
                    <div class="col-sm-6">
                        <input id="cmnd" type="text" class="form-control" value="{{ $nhanvien->cmnd }}" name="cmnd" placeholder="CMND" />
                    </div>
                </div>

                <div class="form-group col-lg-12">
                  <label for="dienthoai" class="col-sm-2 control-label">Điện thoại </label>
                    <div class="col-sm-6">
                        <input id="dienthoai" type="text" value="{{ $nhanvien->dienthoai }}" class="form-control" name="dienthoai" placeholder="Điện thoại" />
                    </div>
                </div>

                <div class="form-group col-lg-12">
                  <label for="diachi" class="col-sm-2 control-label">Địa chỉ </label>
                    <div class="col-sm-6">
                        <input id="diachi" type="text" value="{{ $nhanvien->diachi }}" class="form-control" name="diachi" placeholder="Địa chỉ" />
                    </div>
                </div>
                
                <div class="form-group col-lg-12">
                    <label class="col-sm-3 control-label" for="btnCapNhat">&nbsp;</label>
                    <div class="col-sm-6">
                      <input class="btn btn-info" type="submit" name="btnCapNhat" value="Cập nhật"> </div>
                  </div>
      </form>
<!-- Ket thuc thiet lap-->

                  </div>
                </div>

              </div>
            </div>
          </section>
        </div>
      </div>
@endsection
