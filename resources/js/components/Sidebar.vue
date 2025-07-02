<template>
  <div class="sidebar">
    <div class="sidebar-logo">
      <div class="logo-header">
        <a href="/dashboard" class="logo">
          <img src="/assets/img/sidebar-logo.svg" alt="navbar brand" class="navbar-brand" height="60" />
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
            <span class="sidebar-mini-icon"><i class="fa fa-ellipsis-h"></i></span>
          </li>
          <li class="nav-item"><a href="/dashboard"><i class="fas fa-home"></i><p>Dashboard</p></a></li>
          <li class="nav-item"><a href="/medicinetable"><i class="fas fa-capsules"></i><p>Medicine</p></a></li>
          <li class="nav-item"><a href="/patient-record"><i class="fas fa-notes-medical"></i><p>Patient Record</p></a></li>
          <li class="nav-item"><a href="/addconsultation"><i class="fas fa-stethoscope"></i><p>Consultations</p></a></li>
          <li class="nav-item"><a href="/transactions"><i class="fas fa-receipt"></i><p>Transactions</p></a></li>
          <li class="nav-item"><a href="/offcampusadd"><i class="fas fa-arrow-alt-circle-right"></i><p>Mabini Unit Issuance</p></a></li>
          <li class="nav-item"><a href="/inventory"><i class="fas fa-clipboard-list"></i><p>Medicine Report</p></a></li>
          <li class="nav-item"><a href="/reports"><i class="fas fa-file-medical"></i><p>Transaction Report</p></a></li>
          <li class="nav-item"><a href="/staffuser"><i class="fas fa-users"></i><p>Clinic Staff User</p></a></li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script setup>
// You can add interactivity later if needed
</script>
