<div class="sidebar" data-color="orange">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            QL
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Học sinh
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="active ">
                <a href="{{route('dashboard')}}">
                    <i class="now-ui-icons design_app"></i>
                    <p>Trang chủ</p>
                </a>
            </li>
            <li>
                <a href="{{route('students.index')}}">
                    <i class="now-ui-icons education_atom"></i>
                    <p>Danh sách học sinh</p>
                </a>
            </li>
            <li>
                <a href="{{route('learn_classes.index')}}">
                    <i class="now-ui-icons location_map-big"></i>
                    <p>Danh sách lớp</p>
                </a>
            </li>
            <li>
                <a href="{{route('users.index')}}">
                    <i class="now-ui-icons ui-1_bell-53"></i>
                    <p>Thông tin người dùng</p>
                </a>
            </li>
            <li>
                <a href="{{route('showLogin')}}">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>Dăng suất</p>
                </a>
            </li>
        </ul>
    </div>
</div>
