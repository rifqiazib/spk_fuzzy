<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISTEM PENDUKUNG KEPUTUSAN SUBSIDI BLT</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('css/all.min.css') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SPK <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->

            <!-- Nav Item - Pages Collapse Menu -->
            @include('template/sidebar')
            <!-- Nav Item - Utilities Collapse Menu -->
           

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            

            <!-- Nav Item - Pages Collapse Menu -->
           

            <!-- Nav Item - Charts -->
           

            <!-- Nav Item - Tables -->
          
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
           

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('template/header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                   

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                       

                        <!-- Earnings (Monthly) Card Example -->
                       

                        <!-- Earnings (Monthly) Card Example -->
                       

                        <!-- Pending Requests Card Example -->
                       

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                       

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                       

                            <!-- Color System -->
                           

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            
                           
                            <!-- Approach -->
                           
                            </div>

                        </div>
                    </div>

                    <div class="content" style="
    margin-left: 3rem;">
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Sub Criteria</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('update.subcriteria', $subcriterias->id)}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputname"></label>
                    <input name="criteria_id" type ="hidden" value="{{ $criterias->id}}" id="inputname" class ="form-control" placeholder="" rows="4"></input>
                  </div>
                  <div class="card-body">
                  <div class="form-group">
                    <label for="inputname">Kode Kriteria</label>
                    <input name="subcriteria_code" id="inputname" value="{{$subcriterias->subcriteria_code}}" class ="form-control" placeholder="" rows="4"></input>
                  </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputname">Start</label>
                    <input name="start" id="inputname" value="{{$subcriterias->start}}" class ="form-control" placeholder="" rows="4"></input>
                  </div>
                  <div class="form-group">
                    <label for="email">End</label>
                    <input type="text" name="end" value="{{$subcriterias->end}}" class="form-control"  placeholder="">
                  </div>
                
                 
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
      </div>

                
            <!-- End of Main Content -->

            <!-- Footer -->
           
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>