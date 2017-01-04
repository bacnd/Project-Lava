@extends('layouts.main')

@section('title')
Bằng cấp
@stop

@section('content')
<div class="portlet" id="yw3">
<div class="portlet-content">
<ul id="footer-side">
<li class="btn btn-primary"><a href="{{ url('bangcap/create') }}">Tạo mới</a></li>
</ul></div>
</div>
<section class="panel">
<header class="panel-heading">Quản lý</header>
<div class="panel-body">    
<div id="statusMsg"></div>
<div class="adv-table" id="yw0">
<table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>MaBC</th>
        <th>Bằng cấp</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($bangcaplist as $bangcap)
      <tr>
        <td>{{ $bangcap->mabc }}</td>
        <td>{{ $bangcap->bangcap }}</td>
        <td align="center">
          <a class="update" title="Update" style="text-decoration:none" href="{{ route('bangcap.edit', $bangcap->mabc) }}"><i class="fa fa-edit"></i></a>
          <a class="delete" title="Delete" style="text-decoration:none" href="{{ route('bangcap.delete', $bangcap->mabc) }}"><i class="fa fa-trash-o"></i></a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  </div>
  </div>
</section>
@endsection
