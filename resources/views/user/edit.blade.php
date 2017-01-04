@extends('layouts.main')

@section('title')
Cập nhật thông tin thành viên {{ $user->name }}
@stop


@section('content')
<div class="portlet" id="yw1">
	<div class="portlet-content">
	<ul id="footer-side">
	<li class="btn btn-primary"><a href="{{ url('/user') }}">Quản lý</a></li>
	</ul>
	</div>
</div>
<section class="panel">
	<header class="panel-heading">Cập nhật: {{ $user->name }}</header>
	<div class="panel-body">
		<div class="panel-body">
			<div class="form-group col-lg-12">
				<p class="note">Những mục đánh dấu <span class="required">*</span> không được để trống.</p>
			</div>
			<form class="form-horizontal" role="form" method="POST" action="{{ route('user.update', $user->id) }}">
                
                {{ csrf_field() }}

                <div class="form-group col-lg-12">
				<label for="name" class="col-md-4 control-label">Username <span class="required">*</span></label>
                    <div class="col-sm-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus />
                    </div>
                </div>

                <div class="form-group col-lg-12">
				<label for="password" class="col-md-4 control-label">Password <span class="required">*</span></label>
                    <div class="col-sm-6">
                        <input id="password" type="password" class="form-control" name="password" value="{{ $user->password }}" required />
                    </div>
                </div>
                <div class="form-group col-lg-12">
				<label for="email" class="col-md-4 control-label">Email <span class="required">*</span></label>
                    <div class="col-sm-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required />
                    </div>
                </div>
                <div class="form-group col-lg-12">
				<label for="role" class="col-md-4 control-label">Role <span class="required">*</span></label>
                    <div class="col-sm-6">
                        <input id="role" type="text" class="form-control" name="role" value="{{ $user->role }}" required />
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

			@if($errors->count())

                @foreach($errors->all() as $error)
                    <div class="errorMessage">
                        {{ $error }}
                    </div>
                @endforeach            

            @endif
		</div>
	</div>
</section>

@endsection