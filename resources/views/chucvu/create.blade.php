@extends('layouts.main')

@section('title')
Tạo mới bằng cấp
@stop

@section('content')
<div class="portlet" id="yw3">
<div class="portlet-content">
<ul id="footer-side">
<li class="btn btn-primary"><a href="{{ route('bangcap.home') }}">Quản lý</a></li>
</ul></div>
</div>
<section class="panel">
<header class="panel-heading">Tạo mới</header>
<div class="panel-body">
<div class="panel-body">
  <form class="form-horizontal bucket-form" id="bangcap-form" action="{{ route('bangcap.create') }}" method="post" _lpchecked="1">

    {{ csrf_field() }}
    <div class="form-group col-lg-12">
      <p class="note">Những mục đánh dấu <span class="required">*</span> không được để trống.</p>
    </div>
    <div class="form-group col-lg-12">
    <label class="col-sm-3 control-label" encodelabel="" for="mabc">Mã Bằng Cấp</label>   
    <div class="col-sm-6">
      <input class="form-control" name="mabc" id="mabc" type="text" maxlength="255" placeholder="Mã bằng cấp">     
    </div>
    </div>

    <div class="form-group col-lg-12">
    <label class="col-sm-3 control-label" encodelabel="" for="bangcap">Bằng Cấp</label>   
    <div class="col-sm-6">
      <input class="form-control" name="bangcap" id="bangcap" type="text" maxlength="255" placeholder="Bằng cấp">     
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
