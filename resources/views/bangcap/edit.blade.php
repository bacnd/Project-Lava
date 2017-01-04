@extends('layouts.main')

@section('title')
Sửa bằng cấp
@stop

@section('content')
<div class="portlet" id="yw3">
<div class="portlet-content">
<ul id="footer-side">
<li class="btn btn-primary"><a href="{{ url('bangcap/create') }}">Tạo mới</a></li>
<li class="btn btn-primary"><a href="{{ route('bangcap.home') }}">Quản lý</a></li>
</ul></div>
</div>
<section class="panel">
<header class="panel-heading">Cập nhật: {{ $bc->bangcap }}</header>
<div class="panel-body">
<div class="panel-body">
  <form class="form-horizontal bucket-form" id="bangcap-form" action="{{ route('bangcap.update', $bc->mabc) }}" method="post" _lpchecked="1">

    {{ csrf_field() }}
    <div class="form-group col-lg-12">
      <p class="note">Những mục đánh dấu <span class="required">*</span> không được để trống.</p>
    </div>
    <div class="form-group col-lg-12">
    <label class="col-sm-3 control-label" encodelabel="" for="bangcap">Bằng Cấp</label>   
    <div class="col-sm-6">
      <input class="form-control" name="bangcap" id="bangcap" type="text" maxlength="255" value="{{ $bc->bangcap }}">     
    </div>
    </div>
  
  <div class="form-group col-lg-12">
    <label class="col-sm-3 control-label" for="bangcapcapnhat"></label>   
    <div class="col-sm-6">
      <input class="btn btn-info" type="submit" name="yt0" value="Cập nhật">    
    </div>
  </div>

</form>
</div></div>
</section>
@endsection
