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
                      <li><a href="{{ route('admin.patientRecord') }}">Add Patient</a></li>
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
                      <span class="menu-label">Clinic Staff User</span>
                      <i class="dropdown-icon fas fa-chevron-down"></i>
                  </a>

                  
                  <ul class="submenu">
                      <li><a href="{{ route('admin.staffuser') }}">RBAC Control Panel</a></li>
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
    // Submenu toggle
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

    // Sidebar toggle for Bootstrap-style layout
    const sidebar = document.getElementById('sidebar');
    const mainPanel = document.getElementById('main-panel');
    const toggleSidebarBtn = document.querySelector('.toggle-sidebar');

    if (toggleSidebarBtn) {
        toggleSidebarBtn.addEventListener('click', function () {
            document.body.classList.toggle('sidebar-collapsed');
        });
    }
});
</script>
