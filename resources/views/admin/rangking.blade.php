<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISTEM PENDUKUNG KEPUTUSAN SUBSIDI BANTUAN LANGSUNG TUNAI DANA DESA</title>

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

                </div>
                <div class="content">
        <div class="container-fluid">
        @if(session('sukses'))
          <div class="alert alert-info" role="alert">
          {{session('sukses')}}
          </div>
          @endif

          @if(session('editsukses'))
          <div class="alert alert-info" role="alert">
          {{session('editsukses')}}
          </div>
          @endif

          @if(session('hapus'))
          <div class="alert alert-info" role="alert">
          {{session('hapus')}}
          </div>
          @endif
        <main>
          <h3 class="font-bold mb-3">Menu Perangkingan</h3>

          <form action="{{ route('rankings.do') }}" method="POST">
           @csrf
            <div class="flex flex-col gap-5 divide-y-2">
              <div class="flex flex-col pt-3 first:pt-0">
                <h3 class="mb-2">Daftar Kriteria</h3>
                <table class="table">
                  <thead>
                    <tr>
                      <th class="bg-blue-100 border text-left px-8 py-4">Kode</th>
                      <th class="bg-blue-100 border text-left px-8 py-4">Nama Kriteria</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($criterias as $criteria)
                      <tr>
                        <td class="border px-8 py-4">{{ $criteria->criteria_code }}</td>
                        <td class="border px-8 py-4">{{ $criteria->criteria_name }}</td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="2" class="text-center border px-8 py-4">Belum ada data, <a href="{{ route('criterias.index') }}" class="text-blue-400 hover:underline">isi data dahulu</a></td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>

              @if($criterias->isNotEmpty())
                <div class="flex flex-col pt-3 first:pt-0">
                  <h3 class="mb-2">Perbandingan Antar Kriteria</h3>
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="border border-gray-400 text-left px-8 py-4"></th>
                        @foreach($criterias as $criteria)
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-4">{{ $criteria->criteria_code }}</th>
                        @endforeach
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($criterias as $column_key => $criteria)
                <tr>
                  <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">{{ $criteria->criteria_code }}</td>
                  @foreach($criterias as $row_key => $criteria)
                    @if($row_key < $column_key)
                    <td class="bg-gray-100 border text-center px-8 py-4">
                      <input class="w-5 h-auto text-center bg-gray-100" type="text" name="input[]" value="0" readonly />
                    </td>
                    @elseif($row_key > $column_key)
                    <td class="border text-center px-8 py-4">
                      <div class="relative">
                        <select class="block appearance-none w-full text-center bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="input[]">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          
                        </select>
                        
                      </div>
                    </td>
                    @else
                    <td class="bg-gray-100 border text-center px-8 py-4">
                      <input class="w-5 h-auto text-center bg-gray-100" type="text" name="input[]" value="1" readonly />
                    </td>
                    @endif
                  @endforeach
                </tr>
              @endforeach
                    </tbody>
                  </table>
                </div>
              @endif

              @foreach($criterias as $criteria)
        <div class="flex flex-col pt-3 first:pt-0">
          <h3 class="mb-2">Perbandingan Sub Kriteria - {{ $criteria->criteria_name }}</h3>
          <table class="table">
            <thead>
              <tr>
                <th class="border border-gray-400 text-left px-8 py-4"></th>
                @foreach($criteria->hasSubcriteria as $subcriteria)
                <th class="bg-blue-100 border border-gray-400 text-center px-8 py-4">{{ $subcriteria->subcriteria_code }}</th>
                @endforeach
              </tr>
            </thead>
            <tbody>
              @foreach($criteria->hasSubcriteria as $column_key => $subcriteria)
                <tr>
                  <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">{{ $subcriteria->subcriteria_code }}</td>
                  @foreach($criteria->hasSubcriteria as $row_key => $subcriteria)
                    @if($row_key < $column_key)
                    <td class="bg-gray-100 border text-center px-8 py-4">
                    <input class="w-5 h-auto text-center bg-gray-100" type="text" name="sub_input_{{ $subcriteria->criteria_id }}[]" value="0" readonly />                  </td>
                    @elseif($row_key > $column_key)
                    <td class="border text-center px-8 py-4">
                      <div class="relative">
                      <select class="block appearance-none w-full text-center bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="sub_input_{{ $subcriteria->criteria_id }}[]">
                          <option value="1">1</option>
                          <option value="3">3</option>
                          <option value="5">5</option>
                          <option value="7">7</option>
                          <option value="9">9</option>
                        </select>
                        <div class="absolute top-4 right-3">
                    </div>
                      </div>
                    </td>
                    @else
                    <td class="bg-gray-100 border text-center px-8 py-4">
                    <input class="w-5 h-auto text-center bg-gray-100" type="text" name="sub_input_{{ $subcriteria->criteria_id }}[]" value="1" readonly />
                    </td>
                    @endif
                  @endforeach
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @endforeach
      

              <div class="flex flex-col pt-3 first:pt-0">
                <h3 class="mb-2">Daftar Alternatif</h3>
                <table class="table">
                  <thead>
                    <tr>
                      <th class="bg-blue-100 border text-left px-8 py-4">Nik</th>
                      <th class="bg-blue-100 border text-left px-8 py-4">Nama</th>
                      <th class="bg-blue-100 border text-left px-8 py-4">Penghasilan </th>
                      <th class="bg-blue-100 border text-left px-8 py-4">Tabungan </th>
                      <th class="bg-blue-100 border text-left px-8 py-4">Tanggungan </th>
                      <th class="bg-blue-100 border text-left px-8 py-4">Jumlah kepala Keluarga </th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($candidates as $candidate)
                      <tr>
                        <td class="border px-8 py-4">{{ $candidate->nik }}</td>
                        <td class="border px-8 py-4">{{ $candidate->name }}</td>
                        <td class="border px-8 py-4">{{ $candidate->penghasilan }}</td>
                        <td class="border px-8 py-4">{{ $candidate->tabungan }}</td>
                        <td class="border px-8 py-4">{{ $candidate->tanggungan }}</td>
                        <td class="border px-8 py-4">{{ $candidate->jumlah_kepala_keluarga }}</td>

                      </tr>
                      @empty
                      <tr>
                        <td colspan="2" class="text-center border px-8 py-4">Belum ada data, <a href="{{ route('alternatives.index') }}" class="text-blue-400 hover:underline">isi data dahulu</a></td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>

              @if($criterias->isNotEmpty() && $alternatives->isNotEmpty())
              

  
                <div class="pt-3">
                  <button type="submit" class="btn btn-primary">Mulai Proses Perankingan</button>
                </div>
              @endif

            </div>
          </form>
        </main>

      </div>
                <!-- /.container-fluid -->

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