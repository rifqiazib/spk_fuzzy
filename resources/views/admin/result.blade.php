<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISTEM PENDUKUNG KEPUTUSAN MENENTUKAN BANTUAN LANGSUNG TUNAI DANA DESA</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('css/all.min.css') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
   
    <link rel="stylesheet" type="text/css" href="path/to/datatables.min.css">
<script type="text/javascript" src="path/to/jquery.min.js"></script>
<script type="text/javascript" src="path/to/datatables.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css"></script>
    
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

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">Inputan Nilai Perbandingan Antar Kriteria</h3>
            <table class="table">
                <thead>
                <tr>
                    <th class="border border-gray-400 text-left px-8 py-4"></th>
                    @foreach($inputCriterias as $key => $result)
                    <th class="bg-blue-100 border border-gray-400 text-center px-8 py-4">{{ 'C' . ++$key }}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($inputCriterias as $inputCriteria)
                        <tr>
                            <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">{{ 'C' . $no++ }}</td>
                            @foreach($inputCriteria as $key => $cell)
                            <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">Konversi Nilai Perbandingan Antar Kriteria</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                        @foreach($inputCriterias as $key => $result)
                        <th colspan="3" class="bg-blue-100 border border-gray-400 text-center px-8 py-4">{{ 'C' . ++$key }}</th>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach($inputCriterias as $key => $result)
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">L</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">M</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">U</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($conversionCriterias as $conversionCriteria)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">{{ 'C' . $no++ }}</td>
                        @foreach($conversionCriteria as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">Total Nilai Konversi Masing - Masing Kriteria</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                      
                    </tr>
                    <tr>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">L</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">M</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">U</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($Arrays as $Array)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">{{ 'C' . $no++ }}</td>
                        @foreach($Array as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach

                    @php $no = 1; @endphp
                    @foreach($sums as $sum)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">TOTAL</td>
                        @foreach($sum as $row)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $row }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">Nilai Sintesis </h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                      
                    </tr>
                    <tr>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">L</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">M</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">U</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach(array_slice($sintetics,0,4) as $sintetic)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">{{ 'C' . $no++ }}</td>
                        @foreach($sintetic as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">Nilai Vektor </h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                      
                    </tr>
                    <tr>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C1</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C2</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C3</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C4</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($vectorResult as $vector)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">{{ 'C' . $no++ }}</td>
                        @foreach($vector as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">NORMALISASI</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                      
                    </tr>
                    <tr>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C1</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C2</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C3</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C4</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($normalisasis as $normalisasi)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold"></td>
                        @foreach($normalisasi as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">Konversi Nilai Perbandingan Sub Kriteria 1</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                        @foreach($inputSubCriteria1 as $key => $result)
                        <th colspan="3" class="bg-blue-100 border border-gray-400 text-center px-8 py-4">{{ 'C1' . ++$key }}</th>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach($inputSubCriteria1 as $key => $result)
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">L</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">M</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">U</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($conversionSubCriteria1 as $conversionSubCriteria1)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">{{ 'C1' . $no++ }}</td>
                        @foreach($conversionSubCriteria1 as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">Total Nilai Konversi Subkriteria 1</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                      
                    </tr>
                    <tr>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">L</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">M</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">U</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($Arrays1 as $Array)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">{{ 'C1' . $no++ }}</td>
                        @foreach($Array as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach

                    @php $no = 1; @endphp
                    @foreach($sums1 as $sum)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">TOTAL</td>
                        @foreach($sum as $row)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $row }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">Nilai Sintesis Subkriteria 1 </h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                      
                    </tr>
                    <tr>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">L</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">M</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">U</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach(array_slice($sintetics1,0,5) as $sintetic)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">{{ 'C1' . $no++ }}</td>
                        @foreach($sintetic as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">Nilai Vektor Subkriteria 1 </h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                      
                    </tr>
                    <tr>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C11</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C12</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C13</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C14</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C15</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($vectorResult1 as $vector)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">{{ 'C1' . $no++ }}</td>
                        @foreach($vector as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">NORMALISASI Sub Kriteria 1</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                      
                    </tr>
                    <tr>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C11</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C12</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C13</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C14</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C15</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($normalisasis1 as $normalisasi)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold"></td>
                        @foreach($normalisasi as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

       

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">Konversi Nilai Perbandingan Sub Kriteria 2</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                        @foreach($inputSubCriteria2 as $key => $result)
                        <th colspan="3" class="bg-blue-100 border border-gray-400 text-center px-8 py-4">{{ 'C2' . ++$key }}</th>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach($inputSubCriteria2 as $key => $result)
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">L</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">M</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">U</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($conversionSubCriteria2 as $conversionSubCriteria2)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">{{ 'C2' . $no++ }}</td>
                        @foreach($conversionSubCriteria2 as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">Total Nilai Konversi Subkriteria 2</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                      
                    </tr>
                    <tr>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">L</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">M</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">U</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($Arrays2 as $Array)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">{{ 'C2' . $no++ }}</td>
                        @foreach($Array as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach

                    @php $no = 1; @endphp
                    @foreach($sums2 as $sum)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">TOTAL</td>
                        @foreach($sum as $row)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $row }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">Nilai Sintesis Subkriteria 2 </h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                      
                    </tr>
                    <tr>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">L</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">M</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">U</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach(array_slice($sintetics2,0,4) as $sintetic)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">{{ 'C2' . $no++ }}</td>
                        @foreach($sintetic as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">Nilai Vektor Subkriteria2 </h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                      
                    </tr>
                    <tr>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C21</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C22</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C23</th>

                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($vectorResult2 as $vector)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">{{ 'C2' . $no++ }}</td>
                        @foreach($vector as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">NORMALISASI SubKriteria 2</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                      
                    </tr>
                    <tr>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C21</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C22</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C23</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($normalisasis2 as $normalisasi)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold"></td>
                        @foreach($normalisasi as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">Konversi Nilai Perbandingan Sub Kriteria 3</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                        @foreach($inputSubCriteria3 as $key => $result)
                        <th colspan="3" class="bg-blue-100 border border-gray-400 text-center px-8 py-4">{{ 'C3' . ++$key }}</th>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach($inputSubCriteria3 as $key => $result)
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">L</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">M</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">U</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($conversionSubCriteria3 as $conversionSubCriteria3)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">{{ 'C3' . $no++ }}</td>
                        @foreach($conversionSubCriteria3 as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">Total Nilai Konversi Subkriteria 3</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                      
                    </tr>
                    <tr>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">L</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">M</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">U</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($Arrays3 as $Array)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">{{ 'C3' . $no++ }}</td>
                        @foreach($Array as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach

                    @php $no = 1; @endphp
                    @foreach($sums3 as $sum)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">TOTAL</td>
                        @foreach($sum as $row)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $row }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">Nilai Sintesis Subkriteria 3 </h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                      
                    </tr>
                    <tr>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">L</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">M</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">U</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach(array_slice($sintetics3,0,4) as $sintetic)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">{{ 'C3' . $no++ }}</td>
                        @foreach($sintetic as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">Nilai Vektor Subkriteria 3</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                      
                    </tr>
                    <tr>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C31</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C32</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C33</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($vectorResult3 as $vector)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">{{ 'C3' . $no++ }}</td>
                        @foreach($vector as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">NORMALISASI Subkriteria 3</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                      
                    </tr>
                    <tr>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C31</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C32</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C33</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($normalisasis3 as $normalisasi)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold"></td>
                        @foreach($normalisasi as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">Konversi Nilai Perbandingan Sub Kriteria 4</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                        @foreach($inputSubCriteria4 as $key => $result)
                        <th colspan="3" class="bg-blue-100 border border-gray-400 text-center px-8 py-4">{{ 'C4' . ++$key }}</th>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach($inputSubCriteria4 as $key => $result)
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">L</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">M</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">U</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($conversionSubCriteria4 as $conversionSubCriteria4)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">{{ 'C4' . $no++ }}</td>
                        @foreach($conversionSubCriteria4 as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">Total Nilai Konversi Subkriteria 4</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                      
                    </tr>
                    <tr>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">L</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">M</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">U</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($Arrays4 as $Array)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">{{ 'C4' . $no++ }}</td>
                        @foreach($Array as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach

                    @php $no = 1; @endphp
                    @foreach($sums4 as $sum)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">TOTAL</td>
                        @foreach($sum as $row)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $row }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">Nilai Sintesis Subkriteria 4 </h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                      
                    </tr>
                    <tr>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">L</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">M</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">U</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach(array_slice($sintetics4,0,5) as $sintetic)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">{{ 'C4' . $no++ }}</td>
                        @foreach($sintetic as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">Nilai Vektor Subkriteria 4 </h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                      
                    </tr>
                    <tr>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C41</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C42</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C43</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C44</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C45</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($vectorResult4 as $vector)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold">{{ 'C4' . $no++ }}</td>
                        @foreach($vector as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col pt-3 first:pt-0">
            <h3 class="mb-2">NORMALISASI Sub Kriteria 4</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-gray-400 text-left px-8 py-4"></th>
                      
                    </tr>
                    <tr>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C41</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C42</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C43</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C44</th>
                        <th class="bg-blue-100 border border-gray-400 text-center px-8 py-2">C45</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($normalisasis4 as $normalisasi)
                    <tr>
                        <td class="bg-blue-100 border border-gray-400 text-center px-8 py-4 font-bold"></td>
                        @foreach($normalisasi as $cell)
                        <td class="bg-gray-100 border text-center px-8 py-4">{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        

        <div class="flex flex-col pt-3 first:pt-0">
                <h3 class="mb-2">Daftar Alternatif</h3>
                <table class="table">
                  <thead>
                    <tr>
                      <th class="bg-blue-100 border text-left px-8 py-4">Nik</th>
                      <th class="bg-blue-100 border text-left px-8 py-4">Nama</th>
                      <th class="bg-blue-100 border text-left px-8 py-4">Penghasilan </th>
                      <th class="bg-blue-100 border text-left px-8 py-4">Tanggungan </th>
                      <th class="bg-blue-100 border text-left px-8 py-4">Jumlah kepala Keluarga </th>
                      <th class="bg-blue-100 border text-left px-8 py-4">Tabungan </th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($candidates as $candidate)
                      <tr>
                        <td class="border px-8 py-4">{{ $candidate->nik }}</td>
                        <td class="border px-8 py-4">{{ $candidate->name }}</td>
                        <td class="border px-8 py-4">{{ $candidate->penghasilan }}</td>
                        <td class="border px-8 py-4">{{ $candidate->tanggungan }}</td>
                        <td class="border px-8 py-4">{{ $candidate->jumlah_kepala_keluarga }}</td>
                        <td class="border px-8 py-4">{{ $candidate->tabungan }}</td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="2" class="text-center border px-8 py-4">Belum ada data, <a href="{{ route('alternatives.index') }}" class="text-blue-400 hover:underline">isi data dahulu</a></td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>


    </div>

    <div class="flex flex-col pt-3 first:pt-0">
                <h3 class="mb-2">Konversi Data Alternatif</h3>
                <table class="table">
                  <thead>
                    <tr>
                      <th class="bg-blue-100 border text-left px-8 py-4">Nik</th>
                      <th class="bg-blue-100 border text-left px-8 py-4">Nama</th>
                      <th class="bg-blue-100 border text-left px-8 py-4">Penghasilan </th>
                      <th class="bg-blue-100 border text-left px-8 py-4">Tanggungan </th>
                      <th class="bg-blue-100 border text-left px-8 py-4">Jumlah kepala Keluarga </th>
                      <th class="bg-blue-100 border text-left px-8 py-4">Tabungan </th>
                      
                      
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($candidates as $candidate)
                      <tr>
                        <td class="border px-8 py-4">{{ $candidate->nik }}</td>
                        <td class="border px-8 py-4">{{ $candidate->name }}</td>
                        <td class="border px-8 py-4">{{ konversi_candidate('penghasilan', $candidate->penghasilan, $normalisasis1[0])['linguistik']  }}</td>
                        <td class="border px-8 py-4">{{ konversi_candidate('tanggungan',$candidate->tanggungan, $normalisasis2[0])['linguistik'] }}</td>
                        <td class="border px-8 py-4">{{ konversi_candidate('jumlah_kepala_keluarga',$candidate->jumlah_kepala_keluarga, $normalisasis3[0])['linguistik'] }}</td>
                        <td class="border px-8 py-4">{{ konversi_candidate('tabungan',$candidate->tabungan, $normalisasis4[0])['linguistik'] }}</td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="2" class="text-center border px-8 py-4">Belum ada data, <a href="{{ route('alternatives.index') }}" class="text-blue-400 hover:underline">isi data dahulu</a></td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>


    </div>

    
    @php
    $finals = [];
    @endphp
    <div class="flex flex-col pt-3 first:pt-0">
                <h3 class="mb-2">Perhitungan Bobot</h3>
                <table class="table">
                  <thead>
                    <tr>
                      <th class="bg-blue-100 border text-left px-8 py-4">Nik</th>
                      <th class="bg-blue-100 border text-left px-8 py-4">Nama</th>
                      <th class="bg-blue-100 border text-left px-8 py-4">Penghasilan </th>
                      <th class="bg-blue-100 border text-left px-8 py-4">Tanggungan </th>
                      <th class="bg-blue-100 border text-left px-8 py-4">Jumlah kepala Keluarga </th>
                      <th class="bg-blue-100 border text-left px-8 py-4">Tabungan </th>

                    </tr>
                  </thead>
                  <tbody>
                    @forelse($candidates as $candidate)
                    @php
                    $finals[]=[
                        "name" => $candidate->name,
                        "sum" =>array_sum([konversi_candidate('penghasilan', $candidate->penghasilan,$normalisasis1[0])['normalisasi'] * $normalisasis[0][0], konversi_candidate('tabungan',$candidate->tabungan, $normalisasis4[0])['normalisasi'] * $normalisasis[0][1],konversi_candidate('tanggungan',$candidate->tanggungan, $normalisasis2[0])['normalisasi'] * $normalisasis[0][2],konversi_candidate('jumlah_kepala_keluarga',$candidate->jumlah_kepala_keluarga, $normalisasis3[0])['normalisasi'] * $normalisasis[0][3]])
                        ];
                    @endphp
                      <tr>
                        <td class="border px-8 py-4">{{ $candidate->nik }}</td>
                        <td class="border px-8 py-4">{{ $candidate->name }}</td>
                        <td class="border px-8 py-4">{{ konversi_candidate('penghasilan', $candidate->penghasilan, $normalisasis1[0])['normalisasi'] * $normalisasis[0][0] }}</td>
                        <td class="border px-8 py-4">{{ konversi_candidate('tanggungan',$candidate->tanggungan, $normalisasis2[0])['normalisasi'] * $normalisasis[0][2]}}</td>
                        <td class="border px-8 py-4">{{ konversi_candidate('jumlah_kepala_keluarga',$candidate->jumlah_kepala_keluarga, $normalisasis3[0])['normalisasi'] * $normalisasis[0][3] }}</td>
                        <td class="border px-8 py-4">{{ konversi_candidate('tabungan',$candidate->tabungan, $normalisasis4[0])['normalisasi'] * $normalisasis[0][1]}}</td>
                        {{--<td class="border px-8 py-4">{{ array_sum([konversi_candidate('penghasilan', $candidate->penghasilan, $normalisasis1[0])['normalisasi'] * $normalisasis[0][0], konversi_candidate('tabungan',$candidate->tabungan, $normalisasis4[0])['normalisasi'] * $normalisasis[0][1],konversi_candidate('tanggungan',$candidate->tanggungan,$normalisasis2[0])['normalisasi'] * $normalisasis[0][2],konversi_candidate('jumlah_kepala_keluarga',$candidate->jumlah_kepala_keluarga,$normalisasis3[0])['normalisasi'] * $normalisasis[0][3]]) }}</td>
                        --}}
                    </tr>
                      @empty
                      <tr>
                        <td colspan="2" class="text-center border px-8 py-4">Belum ada data, <a href="{{ route('alternatives.index') }}" class="text-blue-400 hover:underline">isi data dahulu</a></td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
    </div>


    <div class="flex flex-col pt-3 first:pt-0">
                <h3 class="mb-2">Urutan Rangking</h3>
                <input type="text" id="input-filter" class="px-3 py-1 border border-black rounded" placeholder="Masukkan filter..." />
                <div class="flex flex-row gap-3">
                   <button type="button" id="btn-filter" class="px-2 py-1 bg-blue-400 rounded-md" onclick="showRows()">Filter</button>
                   <button type="button" class="px-2 py-1 bg-red-400 rounded-md" onclick="printTableToPDF()">Print</button>
                 </div>
                <div id="tableWrapper" class="table">
                <table id ="rangking-table"class="table">
                  <thead>
                    <tr>
                      <th class="bg-blue-100 border text-left px-8 py-4">Nama</th>
                      <th class="bg-blue-100 border text-left px-8 py-4">Nilai </th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $finals = collect($finals)->sortBy('sum')->reverse()->toArray();
                    @endphp
                    @forelse($finals as $final)
                      <tr>
                     
                        <td class="border px-8 py-4">{{ $final['name'] }}</td>
                        <td class="border px-8 py-4">{{ $final['sum'] }}</td>
                       
                      </tr>
                      @empty
                      <tr>
                        <td colspan="2" class="text-center border px-8 py-4">Belum ada data, <a href="{{ route('alternatives.index') }}" class="text-blue-400 hover:underline">isi data dahulu</a></td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
                </div>
              </div>


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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.4.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.0/js/buttons.print.min.js"></script>

    <script>
 
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  window.jsPDF = window.jspdf.jsPDF;
  window.html2canvas = html2canvas;
  
  function showRows() {
    var inputFilter = document.getElementById('input-filter');
    var table = document.getElementById("rangking-table");
    var rows = table.getElementsByTagName("tr");
    
    for (var i = 0; i < rows.length; i++) {
      if (i <= inputFilter.value) {
        rows[i].style.display = ""; // Show the row
      } else {
        rows[i].style.display = "none"; // Hide the row
      }
    }
  }
  function printTableToPDF() {
    var table = document.getElementById("rangking-table");
    var pdf = new jsPDF();
    pdf.html(table, {
      callback: function(pdf) {
          // Save the PDF
          pdf.save('sample-document.pdf');
      },
        x: 15,
        y: 15,
        width: 170, //target width in the PDF document
        windowWidth: 650 //window width in CSS pixels
      });
    }
</script>

</body>

</html>