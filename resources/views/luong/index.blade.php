@extends('layouts.main')

@section('title')
Danh sách lương
@stop

@php 

$monthNow = date('m'); 
$months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
$yearNow = date('Y');
$years = [$yearNow, $yearNow-1, $yearNow-2];

@endphp

@section('content')
<section class="panel">
<header class="panel-heading">Quản lý lương</header>
<div class="panel-body">
<form class="form-horizontal bucket-form" role="form" method="POST" action="{{ route('luong.upload') }}" enctype="multipart/form-data">
{{ csrf_field() }}
  <div class="form-group col-lg-12">
    <div class="form-group">
      <label class="col-sm-2 control-label">File chấm công</label>
      <div class="col-sm-4">
        <div class="row">
          <div class="col-lg-2">
            <label class="col-md-1 control-label">Tháng</label>
          </div>
          <div class="col-lg-4">
            <select name="ChamCongThang" class="form-control">
              @foreach($months as $month)
                <option value="{{ $month }}" {{ $month == $monthNow ? "selected" : "" }}> {{ $month }} </option>
              @endforeach
            </select>
          </div>
          <div class="col-lg-2">
            <label class="col-md-1 control-label">Năm</label>
          </div>
          <div class="col-lg-4">
            <select name="ChamCongNam" class="form-control">
              @foreach($years as $year)
                <option value="{{ $year }}" {{ $year == $yearNow ? "selected" : "" }}> {{ $year }} </option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="col-sm-6 ">
        <div class="fileupload fileupload-new" data-provides="fileupload">
          <span class="btn btn-white btn-file">
              <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Chọn file</span>
              <span class="fileupload-exists"><i class="fa fa-undo"></i> Chọn file khác</span>
              <input type="file" name="filechamcong" class="default" required="">

              </span>
            <span class="fileupload-preview" style="margin-left:5px;"></span>
          <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
          <input class="btn btn-info" type="submit" name="yt0" value="Tải lên">
      </div>
      </div>
    </div>
  </div>
  </form>
</div>
</section>
<section class="panel">
<header class="panel-heading">Xem thông tin bảng lương</header>
<div class="panel-body">
<form class="form-horizontal bucket-form" role="form" method="GET" action="{{ route('luong.home') }}" enctype="multipart/form-data">
  <div class="form-group col-lg-12">
    <div class="form-group">
      <label class="col-sm-2 control-label">Bảng lương</label>
      <div class="col-sm-4">
        <div class="row">
          <div class="col-lg-2">
            <label class="col-md-1 control-label">Tháng</label>
          </div>
          <div class="col-lg-4">
            <select name="Thang" class="form-control">
              @foreach($months as $month)
                <option value="{{ $month }}" {{ $month === $monthSearch ? "selected" : "" }}> {{ $month }} </option>
              @endforeach
            </select>
          </div>
          <div class="col-lg-2">
            <label class="col-md-1 control-label">Năm</label>
          </div>
          <div class="col-lg-4">
            <select name="Nam" class="form-control">
              @foreach($years as $year)
                <option value="{{ $year }}" {{ $year === $yearSearch ? "selected" : "" }}> {{ $year }} </option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <input class="btn btn-info" type="submit" name="yt0" value="Xem">
        <!-- <input class="btn btn-info" type="submit" name="ChamCong[excel]" value="Xuất Excel"> -->
      </div>
    </div>
  </div>
</form>

<div class="adv-table" id="yw0">
<table class="table table-striped table-bordered">
<thead>
<tr>
  <th id="yw0_c0" align="center">Họ tên</th>
  <th id="yw0_c1">Lương cơ bản</th>
  <th id="yw0_c2">Công chính</th>
  <th id="yw0_c3">Nghỉ phép</th>
  <th id="yw0_c4">Nghỉ không phép</th>
  <th id="yw0_c5">Trợ cấp</th>
  <th id="yw0_c6">Tổng lương nhận</th>
  <th class="button-column" id="yw0_c7"></th>
</tr>
</thead>
<tbody>

@forelse ($showluong as $luong)
<tr role='row'>
  <td align="center">{{ $nhanvien->where('manv', $luong['manv'])->value('hoten') }}</td>
  <td align="center">{{ $luong['luongcoban'] }}</td>
  <td align="center">{{ $luong['ngaycong'] }}</td>
  <td align="center">{{ $luong['ngayphep'] }}</td>
  <td align="center">{{ $luong['ngaynghi'] }}</td>
  <td align="center">{{ $luong['trocap'] }}</td>
  <td align="center">{{ $luong['luongthucnhan'] }}</td>
  <td align="center">
    <a class="view" title="View" style="text-decoration:none" href="{{ route('luong.view', $luong['id']) }}"><i class="fa fa-eye"></i></a>
    <a class="update" title="Update" style="text-decoration:none" href="{{ route('luong.edit', $luong['id']) }}"><i class="fa fa-edit"></i></a>
    <a class="delete" title="Delete" style="text-decoration:none" href="{{ route('luong.delete', $luong['id']) }}"><i class="fa fa-trash-o"></i></a>
  </td>
</tr>
@empty
<tr><td colspan="11" class="empty"><span class="empty">No results found.</span></td></tr>
@endforelse
</tbody>
</table>
</div>
</div>


</section>  
@endsection
