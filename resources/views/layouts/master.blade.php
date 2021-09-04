
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--@yield('title')-->
  <title>{{ $metaTitle ?? config('newapp.name', 'Admin Dashboard') }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/admin/dashboard" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{ asset('/images/booklogo.png') }}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">BNHSLM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/images/adminlogo.png') }}" class="img-circle elevation-2">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p> </a>
            </li>
          <li class="nav-item">
          <a href="{{ route('categories') }}" class="nav-link">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>Book Categories</p> </a>
          </li>
          <li class="nav-item">
          <a href="{{ route('add.book') }}" class="nav-link">
            <i class="nav-icon fas fa-plus"></i>
            <p>Add Book</p> </a>
          </li>
          <li class="nav-item">
          <a href="{{ route('book.list') }}" class="nav-link">
          <i class="nav-icon fas fa-list"></i>
            <p>List Books</p> </a>
          </li>
          <li class="nav-item">
          <a href="{{ route('issue.book') }}" class="nav-link">
          <i class="nav-icon fas fa-book-medical"></i>
            <p>Issue Books</p> </a>
          </li>
          <li class="nav-item">
          <a href="{{ route('issue.book.list') }}" class="nav-link">
          <i class="nav-icon fas fa-undo-alt"></i>
            <p>Borrowed History</p> </a>
          </li>
          <li class="nav-item">
          <a href="{{ route('return.book.list') }}" class="nav-link">
          <i class="nav-icon fas fa-redo-alt"></i>
            <p>Returned History</p> </a>
          </li>
          <li class="nav-item">
          <a href="{{ route('not-return.book.list') }}" class="nav-link">
          <i class="nav-icon fas fa-exclamation-triangle"></i>
            <p>Not Returned</p> </a>
          </li>
          <li class="nav-item">
          <a href="{{ route('register.student') }}" class="nav-link">
          <i class="nav-icon fas fa-user-plus"></i>
            <p>Register Student</p> </a>
          </li>
          <li class="nav-item">
          <a href="{{ route('student.list') }}" class="nav-link">
          <i class="nav-icon fas fas fa-list"></i>
            <p>List Student</p> </a>
          </li>
          <hr>
          @guest @if (Route::has('login'))
          @endif @else
          <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <p>Logout</p></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
          @endguest
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{$metaTitle}}</h1>
          </div>
         
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      @yield('content')
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    BNSH Library Management System
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<script>
  //Initialize Select2 Elements
  $('.select2').select2()

  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>

<script>
  $(function () {
    $("#example1").DataTable({
      "order":[[0,'desc']],
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

<script>
$('#returnModal').on('show.bs.modal', function (e) {
  var opener=e.relatedTarget;

  var issueId=$(opener).attr('issue-id');
  var returnOn=$(opener).attr('return-on');
  var inputQty=$(opener).attr('input-qty');

  $('#returnForm').find('[name="issueId"]').val(issueId);
  $('#returnForm').find('[name="dueOn"]').val(returnOn);
  $('#returnForm').find('[name="inputQty"]').val(inputQty);
});

$('#notReturnModal').on('show.bs.modal', function (e) {
  var opener=e.relatedTarget;

  var issueId=$(opener).attr('issue-id');
  var reportsOn=$(opener).attr('report-on');
  var inputQty=$(opener).attr('input-qty');

  $('#notReturnForm').find('[name="issueId"]').val(issueId);
  $('#notReturnForm').find('[name="reportOn"]').val(reportsOn);
  $('#notReturnForm').find('[name="input_qty"]').val(inputQty);
});
</script>

<script>
$('#editModal').on('show.bs.modal', function (e) {
  var opener=e.relatedTarget;
  var id=$(opener).attr('id');
  var category=$(opener).attr('category-name');

  $('#editCatForm').find('[name="id"]').val(id);
  $('#editCatForm').find('[name="categories"]').val(category);
});
</script>

<script>
function diffDate() {
var due = document.getElementById('due').value;
var today = document.getElementById('today').value;
var result = document.getElementById('dateResult');
  if(result !=null)
  {
  	if(due < today){
      const date1 = new Date(due);
      const date2 = new Date(today);
      const diffTime = Math.abs(date2 - date1);
      const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24) - 1); 
        console.log(diffTime + " milliseconds");
        console.log(diffDays + " days");
        result.innerHTML = "The days lapse is : " + diffDays;
    }
    else {
      result.innerHTML = "The day lapse is : 0";
    }
  }

}
</script>
</body>
</html>
