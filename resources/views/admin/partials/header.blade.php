<div class="main-header-logo">
    <div class="logo-header" data-background-color="dark">
        <a href="{{ url('admin/dashboard') }}" class="logo">
            <img src="{{ asset('img/Clinicalog.png') }}" alt="navbar brand" class="navbar-brand" height="60" />
        </a>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="fas fa-bars"></i>
            </button>
            <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
            </button>
        </div>
        <button class="topbar-toggler more">
            <i class="fas fa-ellipsis-v"></i>
        </button>
    </div>
</div>

<nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
    <div class="container-fluid">
        <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
            <div class="input-group">
                <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pe-1">
                        <i class="fa fa-search search-icon"></i>
                    </button>
                </div>
                <input type="text" placeholder="Search ..." class="form-control" />
            </div>
        </nav>

        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
            <!-- Small screen search -->
            <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                    <i class="fa fa-search"></i>
                </a>
                <ul class="dropdown-menu dropdown-search animated fadeIn">
                    <li>
                        <form class="navbar-left navbar-form nav-search">
                            <div class="input-group ">
                                <input type="text" placeholder="Search ..." class="form-control" />
                            </div>
                        </form>
                    </li>
                </ul>
            </li>

            <!-- Notification dropdown -->
            <li class="nav-item topbar-icon dropdown hidden-caret">
                <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    <span class="notification"></span>
                </a>
                <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                    <li class="dropdown-title px-3 py-2">You have new notifications</li>
                    <li>
                        <div class="notif-scroll scrollbar-outer">
                            <div class="notif-center">
                                <a href="{{ url('admin/notif-table') }}">
                                    <div class="notif-icon notif-info">
                                        <i class="fa fa-info-circle"></i>
                                    </div>
                                    <div class="notif-content">
                                        <span class="block">Sample Notification</span>
                                        <span class="time">Just now</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a class="see-all dropdown-item text-center" href="{{ url('admin/notif-table') }}">
                            See all notifications <i class="fa fa-angle-right ms-1"></i>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- User dropdown -->
            <li class="nav-item topbar-user dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <img src="{{ asset('img/default.jpg') }}" alt="Profile Picture" class="avatar-img rounded-circle" />
                    </div>
                    <span class="profile-username">
                        <span class="op-7">Hi,</span>
                        <span class="fw-bold">Admin</span>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                  <div class="dropdown-user-scroll scrollbar-outer">
                    <li>
                        <div class="user-box">
                            <div class="avatar-lg">
                                <img src="{{ asset('img/profile.jpg') }}" alt="image profile" class="avatar-img rounded" />
                            </div>
                            <div class="u-text">
                                <h4 class="mb-0">Admin</h4>
                                <p class="text-muted">admin@example.com</p>
                                <a href="viewprofile.php" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        {{-- <div class="dropdown-divider"></div>
                        <div class="dropdown-item"><a href="{{ url('admin/setting') }}">Account Setting</a></div>
                        <div class="dropdown-item"><a href="{{ url('admin/backuprestore') }}">System Backup & Restore</a></div>
                        <div class="dropdown-item"><a href="{{ url('logout') }}">Logout</a></div> --}}
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-item"><a href="">Account Setting</a></div>
                        <div class="dropdown-item"><a href="">System Backup & Restore</a></div>
                        <div class="dropdown-item"><a href="">Logout</a></div>
                    </li>
                  </div>
                </ul>
            </li>


        </ul>
    </div>
</nav>
