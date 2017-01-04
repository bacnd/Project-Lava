@extends('layouts.main')

@section('title')
Danh sách User
@stop


@section('content')
<div class="portlet">
	<div class="portlet-content">
		<ul id="footer-side">
		<li class="btn btn-primary"><a href="{{ url('/user/create') }}">Tạo mới</a></li>
		</ul>
	</div>
</div>

<section class="panel">
<header class="panel-heading">Quản lý User</header>
<div class="panel-body">



<table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Quyền</th>
        <th>Ngày đăng ký</th>
        <th>Tuỳ chọn</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role }}</td>
        <td>{{ $user->ngaydangky }}</td>
        <td>
        	<a title="Update" href="{{ url('/user/edit/') }}/{{ $user->id }}"><i class="fa fa-edit"></i></a> 
        	<a title="Delete" href="{{ url('/user/delete/') }}/{{ $user->id }}"><i class="fa fa-trash-o"></i></a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  {{ $users->links() }}

</div>
</section>
@endsection
