<div class="sidebar" id="sidebar">
<div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" id="logo-header">
            <a href="index.php" class="logo">
                <img src="{{ asset('img/Clinicalog.png') }}" alt="navbar brand" class="navbar-brand" height="60" />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
              </li>
              <li class="nav-item" id="dashboard-item">
                <a href="{{ route('admin.dashboard') }}">
                  <i class="fa fas fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
             <li class="nav-item" id="medicine-item">
                <a href="{{ route('medicineRecord') }}">
                  <i class="fa fas fa-capsules"></i>
                  <p>Medicine</p>
                </a>
              </li>
              <li class="nav-item" id="patientrec-item">
                <a href="{{ route('admin.patientRecord') }}">
                  <i class="fa fas fas fa-notes-medical"></i>
                  <p>Patient Record</p>
                </a>
              </li>
              <li class="nav-item" id="patientrec-item">
                <a href="addconsultation.php">
                  <i class=" fas fa-stethoscope"></i>
                  <p>Consultations</p>
                </a>
              </li>
              <li class="nav-item" id="appoint-item">
                <a href="transactions.php">
                  <i class="fas fas fa-receipt"></i>
                  <p>Transactions</p>
                </a>
              </li>
              <li class="nav-item" id="appoint-item">
                <a href="offcampusadd.php">
                  <i class="fas fas fa-arrow-alt-circle-right"></i>
                  <p>Mabini Unit Issuance</p>
                </a>
              </li>
              <li class="nav-item" id="inventory-item">
                <a href="inventory.php">
                  <i class="fas fas fa-clipboard-list"></i>
                  <p>Medicine Report</p>
                </a>
              </li>
              <li class="nav-item" id="reports-item">
                <a href="reports.php">
                  <i class="fas fas fa-file-medical"></i>
                  <p>Transaction Report</p>
                </a>
              </li>
              <li class="nav-item" id="staffuser-item">
                <a href="{{ route('admin.staffuser') }}">
                  <i class="fas fa-users"></i>
                  <p>Clinic Staff User</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
        </div>
