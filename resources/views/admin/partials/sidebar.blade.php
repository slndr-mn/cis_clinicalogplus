<div class="sidebar" id="sidebar">
    <div class="sidebar-logo">
        <div class="logo-header" id="logo-header">
            <a href="index.php" class="logo">
                <img src="{{ asset('img/Clinicalog.png') }}" alt="navbar brand" class="navbar-brand" height="60" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar"><i class="gg-menu-right"></i></button>
                <button class="btn btn-toggle sidenav-toggler"><i class="gg-menu-left"></i></button>
            </div>
            <button class="topbar-toggler more"><i class="gg-more-vertical-alt"></i></button>
        </div>
    </div>

    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i> 
                    </span>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Medicine -->
                <li class="nav-item has-submenu">
                    <a href="#" class="submenu-toggle">
                        <i class="menu-icon fa fa-capsules"></i>
                        <span class="menu-label">Medicine</span>
                        <i class="dropdown-icon fas fa-chevron-down"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('medicineRecord') }}">Add Medicine</a></li>
                        <li><a href="offcampusadd.php">Mabini Unit Issuance</a></li>
                        <li><a href="inventory.php">Medicine Report</a></li>
                    </ul>
                </li>

                <!-- Patient Record -->
                <li class="nav-item has-submenu">
                    <a href="#" class="submenu-toggle">
                        <i class="menu-icon fa fa-user-injured"></i>
                        <span class="menu-label">Patient Record</span>
                        <i class="dropdown-icon fas fa-chevron-down"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('patientRecord') }}">Add Patient</a></li>
                        <li><a href="addconsultation.php">Consultations</a></li>
                    </ul>
                </li>

                <!-- Transactions -->
                <li class="nav-item has-submenu">
                    <a href="#" class="submenu-toggle">
                        <i class="menu-icon fa fa-exchange-alt"></i>
                        <span class="menu-label">Transactions</span>
                        <i class="dropdown-icon fas fa-chevron-down"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="transactions.php">QR</a></li>
                        <li><a href="reports.php">Transaction Report</a></li>
                    </ul>
                </li>

                <!-- Clinic Staff User -->
                <li class="nav-item has-submenu">
                    <a href="#" class="submenu-toggle">
                        <i class="menu-icon fa fa-user-cog"></i>
                        <span class="menu-label">Manage Clinic Personnel</span>
                        <i class="dropdown-icon fas fa-chevron-down"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.staffuser') }}">Clinic Staff User</a></li>
                    </ul>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.staffuser') }}">Role and Permission Control</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <p>Admin Log</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // ===== Submenu toggle =====
    const submenuToggles = document.querySelectorAll(".submenu-toggle");
    submenuToggles.forEach(toggle => {
        toggle.addEventListener("click", function (e) {
            e.preventDefault();
            const parentItem = this.closest(".nav-item");
            parentItem.classList.toggle("open");

            // Close other submenus
            document.querySelectorAll(".nav-item.has-submenu").forEach(item => {
                if (item !== parentItem) item.classList.remove("open");
            });
        });
    });

    // ===== Sidebar toggles =====
    const sidenavToggler = document.querySelector('.sidenav-toggler');
    const toggleSidebarBtn = document.querySelector('.toggle-sidebar');
    const wrapper = document.querySelector('.wrapper');
    const sidebar = document.getElementById('sidebar');

    let navOpen = false;
    let miniSidebar = wrapper && wrapper.classList.contains('sidebar_minimize');

    // Sidebar header toggle (hamburger menu)
    if (sidenavToggler) {
        sidenavToggler.addEventListener('click', function () {
            navOpen = !navOpen;
            document.documentElement.classList.toggle('nav_open', navOpen);
            this.classList.toggle('toggled', navOpen);
        });
    }

    // Sidebar minimize toggle
    if (toggleSidebarBtn && wrapper) {
        toggleSidebarBtn.addEventListener('click', function () {
            miniSidebar = !miniSidebar;
            wrapper.classList.toggle('sidebar_minimize', miniSidebar);
            this.classList.toggle('toggled', miniSidebar);

            // Change icon
            if (miniSidebar) {
                this.innerHTML = '<i class="gg-more-vertical-alt"></i>';
            } else {
                this.innerHTML = '<i class="gg-menu-right"></i>';
            }

            // Trigger layout recalculation
            window.dispatchEvent(new Event('resize'));
        });
    }

    // ===== Close sidebar when clicking outside on small screens =====
    document.addEventListener('click', function (event) {
        const isClickInsideSidebar = sidebar.contains(event.target);
        const isClickOnToggler = sidenavToggler && sidenavToggler.contains(event.target);
        const isMobile = window.innerWidth <= 991;

        if (!isClickInsideSidebar && !isClickOnToggler && isMobile && document.documentElement.classList.contains('nav_open')) {
            document.documentElement.classList.remove('nav_open');
            if (sidenavToggler) sidenavToggler.classList.remove('toggled');
        }
    });
});
</script>
