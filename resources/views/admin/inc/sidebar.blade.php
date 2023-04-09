<div class="vertical-menu">

  <div data-simplebar class="h-100">

      <!-- User details -->
      <div class="user-profile text-center mt-3">
          <div class="">
              <img src="{{ asset('backend/assets/images/users/avatar-1.jpg') }}" alt="" class="avatar-md rounded-circle">
          </div>
          <div class="mt-3">
              <h4 class="font-size-16 mb-1">Julia Hudda</h4>
              <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
          </div>
      </div>

      <!--- Sidemenu -->
      <div id="sidebar-menu">
          <!-- Left Menu Start -->
          <ul class="metismenu list-unstyled" id="side-menu">
              <li class="menu-title">Menu</li>

              <li>
                  <a href="index.html" class="waves-effect">
                      <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                      <span>Dashboard</span>
                  </a>
              </li>

              <li>
                  <a href="{{ route('home.slide') }}" class=" waves-effect">
                      <i class="ri-calendar-2-line"></i>
                      <span>Home Slide Setup</span>
                  </a>
              </li>
  
              <li>
                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                      <i class="ri-mail-send-line"></i>
                      <span>About Page Setup</span>
                  </a>
                  <ul class="sub-menu" aria-expanded="false">
                      <li><a href="{{ route('about.page') }}">About Page</a></li>
                      <li><a href="{{ route('about.multi.image') }}">About Multi Image</a></li>
                      <li><a href="{{ route('all.multi.image') }}">About Multi Image List</a></li>
                  </ul>
              </li>

              <li>
                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                      <i class="ri-layout-3-line"></i>
                      <span>Service Page Setup</span>
                  </a>
              </li>
              <li>
                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                      <i class="ri-account-circle-line"></i>
                      <span>Portfolio Page Setup</span>
                  </a>
                  <ul class="sub-menu" aria-expanded="false">
                      <li><a href="{{ route('portfolio.index') }}">Portfolio List</a></li>
                      <li><a href="{{ route('portfolio.create') }}">Portfolio Create</a></li>
                  </ul>
              </li>

              <li>
                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                      <i class="ri-profile-line"></i>
                      <span>Utility</span>
                  </a>
                  <ul class="sub-menu" aria-expanded="false">
                      <li><a href="pages-starter.html">Starter Page</a></li>
                      <li><a href="pages-timeline.html">Timeline</a></li>
                      <li><a href="pages-directory.html">Directory</a></li>
                      <li><a href="pages-invoice.html">Invoice</a></li>
                      <li><a href="pages-404.html">Error 404</a></li>
                      <li><a href="pages-500.html">Error 500</a></li>
                  </ul>
              </li>
          </ul>
      </div>
      <!-- Sidebar -->
  </div>
</div>