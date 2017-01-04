<aside>
	<div id="sidebar" class="nav-collapse">
		<div class="leftside-navigation">

			<ul class="sidebar-menu" id="nav-accordion">
				<li class="sub-menu">
					<a href="{{ url('user') }}"> <i class="fa fa-share-square-o"></i>
						<span>User</span>
					</a>
				</li>
				
				<li class="sub-menu">
					<a href="#"> <i class="fa fa-users"></i>
						<span>QL Nhân viên</span>
					</a>
					<ul class="sub">
						<li class="sub-menu">
							<a href="{{ url('nhanvien') }}">Nhân viên</a>
						</li>
						<li class="sub-menu">
							<a href="{{ url('luong') }}">Lương</a>
						</li>
					</ul>
				</li>
				<li class="sub-menu">
					<a href="#">
						<i class="fa fa-cog"></i>
						<span>Setup</span>
					</a>
					<ul class="sub">
						<li class="sub-menu">
							<a href="{{ url('bangcap') }}">Bằng cấp</a>
						</li>
						<li class="sub-menu">
							<a href="{{ url('phongban') }}">Phòng ban</a>
						</li>
						<li class="sub-menu">
							<a href="{{ url('chucvu') }}">Chức vụ</a>
						</li>
						<li class="sub-menu">
							<a href="{{ url('ttlv') }}">TT làm việc</a>
						</li>
					</ul>
				</li>
			</ul>

		</div>
	</div>
</aside>