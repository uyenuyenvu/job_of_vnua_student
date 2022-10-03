<header class="app-header app-header-dark">
    <!-- .top-bar -->
    <div class="top-bar">
        <!-- .top-bar-brand -->
        <div class="top-bar-brand">
            <!-- toggle aside menu -->
            <button class="hamburger hamburger-squeeze mr-2" type="button" data-toggle="aside-menu"
                    aria-label="toggle aside menu"><span class="hamburger-box"><span
                        class="hamburger-inner"></span></span></button> <!-- /toggle aside menu -->
            <img src="{{asset('backend/image/logo_vcms.png')}}" alt="" style="width: 110px;
    position: relative;
    top: 8px;
    left: 18px;
}">
        </div><!-- /.top-bar-brand -->
        <!-- .top-bar-list -->
        <div class="top-bar-list">
            <!-- .top-bar-item -->
            <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
                <!-- toggle menu -->
                <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu">
                    <span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
                <!-- /toggle menu -->
            </div><!-- /.top-bar-item -->
            <!-- .top-bar-item -->
            <div class="top-bar-item top-bar-item-full">
                <!-- .top-bar-search -->
                <form class="top-bar-search">
                    <!-- .input-group -->
                    <div class="input-group input-group-search dropdown">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                        </div>
                        <input type="text" class="form-control" data-toggle="dropdown" aria-label="Search"
                               placeholder="Search"> <!-- .dropdown-menu -->
                        <div class="dropdown-menu dropdown-menu-rich dropdown-menu-xl ml-n4 mw-100">
                            <div class="dropdown-arrow ml-3"></div><!-- .dropdown-scroll -->
                            <div class="dropdown-scroll perfect-scrollbar h-auto" style="max-height: 360px">

                            </div><!-- /.dropdown-menu -->
                        </div><!-- /.input-group -->
                    </div>
                </form><!-- /.top-bar-search -->
            </div><!-- /.top-bar-item -->
            <!-- .top-bar-item -->
            <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
                <!-- .nav -->
                @auth('employer')
                    <div class="dropdown d-none d-md-flex">
                        <button class="btn-account" type="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"><span class="user-avatar user-avatar-md"><img
                                    src="{{ asset('backend') }}/assets/images/avatars/profile.jpg" alt=""></span> <span
                                class="account-summary pr-lg-4 d-none d-lg-block"><span
                                    class="account-name">{{Auth::guard('student')->user()->name}}</span> <span
                                    class="account-description">Sinh viên</span></span></button>
                        <!-- .dropdown-menu -->
                        <div class="dropdown-menu">
                            <div class="dropdown-arrow d-lg-none" x-arrow=""></div>
                            <div class="dropdown-arrow ml-3 d-none d-lg-block"></div>

                            <h6 class="dropdown-header d-none d-md-block d-lg-none"> Beni Arisandi </h6><a
                                class="dropdown-item" href="user-profile.html"><span
                                    class="dropdown-icon oi oi-person"></span> Profile</a> <a class="dropdown-item"
                                                                                              href="{{route('employers.logout')}}"><span
                                    class="dropdown-icon oi oi-account-logout"></span> Đăng xuất</a>

                        </div><!-- /.dropdown-menu -->
                    </div><!-- /.btn-account -->
                @endauth
            </div><!-- /.top-bar-item -->
        </div><!-- /.top-bar-list -->
    </div><!-- /.top-bar -->
</header><!-- /.app-header -->
<!-- .app-aside -->
<aside class="app-aside app-aside-expand-md app-aside-light">
    <!-- .aside-content -->
    <div class="aside-content">
        <!-- .aside-header -->
    {{--          <header class="aside-header d-block d-md-none">--}}
    {{--            <!-- .btn-account -->--}}
    {{--            <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside"><span class="user-avatar user-avatar-lg"><img src="{{ asset('backend') }}/assets/images/avatars/profile.jpg" alt=""></span> <span class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span> <span class="account-summary"><span class="account-name">{{Auth::guard('user')->user()->name}}</span> <span class="account-description">Marketing Manager</span></span></button> <!-- /.btn-account -->--}}
    {{--            <!-- .dropdown-aside -->--}}
    {{--            <div id="dropdown-aside" class="dropdown-aside collapse">--}}
    {{--              <!-- dropdown-items -->--}}
    {{--              <div class="pb-3">--}}
    {{--                <a class="dropdown-item" href="user-profile.html"><span class="dropdown-icon oi oi-person"></span> Profile</a> <a class="dropdown-item" href="{{route('logout')}}"><span class="dropdown-icon oi oi-account-logout"></span> Đăng xuất</a>--}}
    {{--                <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Help Center</a> <a class="dropdown-item" href="#">Ask Forum</a> <a class="dropdown-item" href="#">Keyboard Shortcuts</a>--}}
    {{--              </div><!-- /dropdown-items -->--}}
    {{--            </div><!-- /.dropdown-aside -->--}}
    {{--          </header><!-- /.aside-header -->--}}
    <!-- .aside-menu -->

        <div class="aside-menu overflow-hidden">
            <!-- .stacked-menu -->

            <nav id="stacked-menu" class="stacked-menu">
                <!-- .menu -->
                <ul class="menu">
                    <!-- .menu-item -->
                        <li class="menu-header">Sinh viên</li>
                        <!-- .menu-item -->
                        <li class="menu-item">
                            <a href="{{route('students.dashboard')}}" class="menu-link"><span
                                    class="menu-icon far fa-file"></span> <span
                                    class="menu-text">Hồ sơ sinh viên</span></a> <!-- child menu -->
                        </li><!-- /.menu-item -->
                <!-- .menu-item -->
                </ul><!-- /.menu -->
            </nav><!-- /.stacked-menu -->
        </div><!-- /.aside-menu -->


        <!-- Skin changer -->
        <footer class="aside-footer border-top p-2">
            <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span class="d-compact-menu-none">Chế độ ban đêm</span>
                <i class="fas fa-moon ml-1"></i></button>
        </footer><!-- /Skin changer -->
    </div><!-- /.aside-content -->
</aside><!-- /.app-aside -->
