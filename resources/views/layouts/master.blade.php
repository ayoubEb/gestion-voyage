
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>GV</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
      @include("layouts.vendor-css")


    </head>

    <body data-topbar="dark" data-sidebar="light">

      <!-- <body data-layout="horizontal" data-topbar="dark"> -->

          <!-- Begin page -->
          <div id="layout-wrapper">
        @include("layouts.topbar")
        @include("layouts.sidebar")

        <div class="loader-container">
          <div class="loader">

          </div>
        </div>
              <!-- ============================================================== -->
              <!-- Start right Content here -->
              <!-- ============================================================== -->
              <section class="main-content">

                  <div class="page-content">
                      <div class="container-fluid">

                        <div @class(['preloader'])></div>

                  @yield("content")

                  </div>
                  <!-- End Page-content -->

                  {{-- <footer class="footer">
                      <div class="container-fluid">
                          <div class="row">
                              <div class="col-sm-6">
                                  <script>document.write(new Date().getFullYear())</script> © Upcube.
                              </div>
                              <div class="col-sm-6">
                                  <div class="text-sm-end d-none d-sm-block">
                                      Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                                  </div>
                              </div>
                          </div>
                      </div>
                  </footer> --}}

              </div>
              <!-- end main content-->

          </section>
          <!-- END layout-wrapper -->

        @include("layouts.vendor-scripts")
        @yield("script")


      </body>

</html>
