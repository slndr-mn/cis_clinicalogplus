<div class="main-header" id="header">
    <div class="main-header-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ url('admin/dashboard') }}" class="logo">
                <img src="{{ asset('img/Clinicalog.png') }}" alt="navbar brand" class="navbar-brand" height="60" />
            </a>
            <div class="nav-toggle">
                <!-- Desktop toggle -->
                <button class="btn btn-toggle toggle-sidebar d-none d-lg-inline-block">
                    <i class="gg-menu-right"></i>
                </button>
                <!-- Mobile toggle (hamburger) -->
                <button class="btn btn-toggle sidenav-toggler d-inline-block d-lg-none">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
    </div>

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
        <div class="container-fluid">
            <!-- Desktop Search -->
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
                <!-- Mobile Search -->
                <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button">
                        <i class="fa fa-search"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-search animated fadeIn">
                        <form class="navbar-left navbar-form nav-search">
                            <div class="input-group">
                                <input type="text" placeholder="Search ..." class="form-control" />
                            </div>
                        </form>
                    </ul>
                </li>

                <!-- Notifications -->
                <li class="nav-item topbar-icon dropdown hidden-caret">
                    <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                        <span class="notification">3</span>
                    </a>
                    <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                        <li><div class="dropdown-title">You have 3 new notifications</div></li>
                        <li>
                            <div class="notif-scroll scrollbar-outer">
                                <div class="notif-center">
                                    <a href="#"><div class="notif-icon notif-success"><i class="fa fa-user-plus"></i></div>
                                        <div class="notif-content">
                                            <span class="block">Juan Dela Cruz - New appointment booked</span>
                                            <span class="time">2 mins ago</span>
                                        </div>
                                    </a>
                                    <a href="#"><div class="notif-icon notif-danger"><i class="fa fa-heart"></i></div>
                                        <div class="notif-content">
                                            <span class="block">Maria Santos - Missed appointment</span>
                                            <span class="time">1 hour ago</span>
                                        </div>
                                    </a>
                                    <a href="#"><div class="notif-icon notif-primary"><i class="fa fa-comment"></i></div>
                                        <div class="notif-content">
                                            <span class="block">Mark Reyes - Sent a message</span>
                                            <span class="time">Yesterday</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li><a class="see-all" href="#">See all notifications<i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </li>

                <!-- User Dropdown -->
                <li class="nav-item topbar-user dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#">
                        <div class="avatar-sm">
                            <img src="{{ asset('img/profile.jpg') }}" alt="Profile Picture" class="avatar-img rounded-circle" />
                        </div>
                        <span class="profile-username">
                            <span class="op-7">Hi,</span>
                            <span class="fw-bold">Admin User</span>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg">
                                        <img src="{{ asset('img/profile.jpg') }}" alt="Profile Image" class="avatar-img rounded" />
                                    </div>
                                    <div class="u-text">
                                        <h4>Admin User</h4>
                                        <p class="text-muted">admin@example.com</p>
                                        <a href="#" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">System Back up & Restore</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" id="logoutLink" href="#">Logout</a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>

<!-- Sidebar toggle logic -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    let nav_open = 0;
    let mini_sidebar = 0;

    const sidenavToggler = document.querySelector('.sidenav-toggler');
    const toggleSidebarBtn = document.querySelector('.toggle-sidebar');
    const html = document.documentElement;
    const wrapper = document.querySelector('.wrapper');

    if (wrapper.classList.contains('sidebar_minimize')) {
        mini_sidebar = 1;
        if (toggleSidebarBtn) {
            toggleSidebarBtn.classList.add('toggled');
            toggleSidebarBtn.innerHTML = '<i class="gg-more-vertical-alt"></i>';
        }
    }

    if (sidenavToggler) {
        sidenavToggler.addEventListener('click', function () {
            if (nav_open === 1) {
                html.classList.remove('nav_open');
                this.classList.remove('toggled');
                nav_open = 0;
            } else {
                html.classList.add('nav_open');
                this.classList.add('toggled');
                nav_open = 1;
            }
        });
    }

    if (toggleSidebarBtn) {
        toggleSidebarBtn.addEventListener('click', function () {
            if (mini_sidebar === 1) {
                wrapper.classList.remove('sidebar_minimize');
                this.classList.remove('toggled');
                this.innerHTML = '<i class="gg-menu-right"></i>';
                mini_sidebar = 0;
            } else {
                wrapper.classList.add('sidebar_minimize');
                this.classList.add('toggled');
                this.innerHTML = '<i class="gg-more-vertical-alt"></i>';
                mini_sidebar = 1;
            }
            window.dispatchEvent(new Event('resize'));
        });
    }

    document.querySelectorAll('.topbar-toggler').forEach(btn => {
        btn.addEventListener('click', function () {
            html.classList.toggle('topbar_open');
            this.classList.toggle('toggled');
        });
    });
});
</script>
