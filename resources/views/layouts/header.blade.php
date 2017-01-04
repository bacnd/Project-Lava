<header class="header fixed-top clearfix">
  <div class="brand">
    <a href="#" class="logo">
      <img src="{{ url('/asset/images/logo.jpg') }}" alt=""></a>
    <div class="sidebar-toggle-box">
      <div class="fa fa-bars"></div>
    </div>
  </div>
  <div class="nav notify-row" id="top_menu"></div>
  <div class="top-nav clearfix">

    <ul class="nav pull-right top-menu">
      <li class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
          <img src="{{ asset('/asset/images/avatar/') }}/{{ App\NhanVien::find(Auth::User()->id)->avatar }}" alt="">
          <span class="username">{{ App\NhanVien::find(Auth::User()->id)->hoten }}</span> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu extended logout" id="yw0">
          <li>
            <a href="{{ route('nhanvien.show', Auth::User()->id) }}"> <i class="fa fa-suitcase"></i>
              Thông tin
            </a>
          </li>
          <li>
            <a href="{{ url('/user/edit/') }}/{{ Auth::user()->id }}"> <i class="fa fa-compass"></i>
              Đổi mật khẩu
            </a>
          </li>
          <li>
            <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fa fa-key"></i>
              Thoát
            </a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
          </li>
        </ul>
      </li>
      <li>
        <div class="toggle-right-box">
          <div class="fa fa-bars"></div>
        </div>
      </li>
    </ul>
  </div>
</header>