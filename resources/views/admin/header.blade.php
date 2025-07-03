    <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark"> 
              <a href="index.php" class="logo">
                <img
                
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
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
          <!-- Navbar Header -->
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
          >
            <div class="container-fluid">
              <nav
                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
              >
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pe-1">
                      <i class="fa fa-search search-icon"></i>
                    </button>
                  </div>
                  <input
                    type="text"
                    placeholder="Search ..."
                    class="form-control"
                  />
                </div>
              </nav>

              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li
                  class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none"
                >
                  <a
                    class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-expanded="false"
                    aria-haspopup="true"
                  >
                    <i class="fa fa-search"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-search animated fadeIn">
                    <form class="navbar-left navbar-form nav-search">
                      <div class="input-group">
                        <input
                          type="text"
                          placeholder="Search ..."
                          class="form-control"
                        />
                      </div>
                    </form>
                  </ul>
                </li>

                <li class="nav-item topbar-icon dropdown hidden-caret">
                  <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-bell"></i>
                     <span class="notification"></span>

                  </a>
                 
                  <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                      <li>
                          <div class="dropdown-title">
                              You have  new notifications
                          </div>
                      </li>
                      <li>
                          <div class="notif-scroll scrollbar-outer">
                              <div class="notif-center">
                                  
                                      <a href="adminnotiftable.php">
                                          <div class="notif-icon notif-' . getNotifClass($notif['notif_status']) . '">
                                              <i class="fa ' . getNotifIcon($notif['notif_status']) . '"></i>
                                          </div>
                                          <div class="notif-content">
                                              <span class="block"></span>
                                              <span class="time"></span>
                                          </div>
                                      </a>
                              </div>
                          </div>
                      </li>
                      <li>
                          <a class="see-all" href="adminnotiftable.php">
                              See all notifications<i class="fa fa-angle-right"></i>
                          </a>
                      </li>
                  </ul>
              </li>


                <li class="nav-item topbar-user dropdown hidden-caret">
               
                  <a
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false" 
                  >
                    <div class="avatar-sm">
                      <img
                      src='../uploads/'
                      alt='Profile Picture'
                        class="avatar-img rounded-circle"
                      />
                    </div>
                    <span class="profile-username">
                      <span class="op-7">Hi,</span>
                      <span class="fw-bold"></span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <div class="avatar-lg">
                          <img
                              src='../uploads/'
                              alt="image profile"
                              class="avatar-img rounded"
                            />
                          </div>
                          <div class="u-text">
                            <h4></h4>
                            <p class="text-muted"></p>
                            <a 
                              href="viewprofile.php"
                              class="btn btn-xs btn-secondary btn-sm"
                              >View Profile</a
                            >
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="setting.php">Account Setting</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="backuprestore.php">System Back up & Restore</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" id="logoutLink">Logout</a>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>