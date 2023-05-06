<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    @include('backend.includes.head')
    <style>
      .swal2-container.swal2-top-end.swal2-backdrop-show {
      z-index: 2000;
    }
    .pagination{
      margin-top: 10px;
    }
    </style>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

          @include('backend.includes.menubar')
        <!-- / Menu -->

        <!-- Layout container -->
          @include('backend.includes.navbar')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper col-md-8">
            <!-- Content -->
               @yield('content')
          
            <!-- / Content -->

            <!-- Footer -->
            @include('backend.includes.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    @include('backend.includes.script')
  </body>
</html>
