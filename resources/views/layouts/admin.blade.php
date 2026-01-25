<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Admin</title>
  
  <!-- Render AdminLTE via CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <form action="/logout" method="POST" class="form-inline">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">Keluar</button>
        </form>
      </li>
    </ul>
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/admin/dashboard" class="brand-link">
      <span class="brand-text font-weight-light">Admin E-Learning</span>
    </a>

    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            @if(Auth::user()->avatar)
              <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="img-circle elevation-2" alt="Foto Profil" style="width: 34px; height: 34px; object-fit: cover;">
            @else
              <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->nm_user ?? Auth::user()->name) }}&background=random" class="img-circle elevation-2" alt="User Image">
            @endif
        </div>
        <div class="info">
          <a href="{{ route('admin.profile.edit') }}" class="d-block">{{ Auth::user()->nm_user ?? Auth::user()->name }}</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
          <li class="nav-item">
            <a href="/admin/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Beranda</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/courses" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>Mata Kuliah</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/enrollments" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Pendaftaran</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.mahasiswa.index') }}" class="nav-link">
                <i class="nav-icon fas fa-user-graduate"></i>
                <p>Mahasiswa</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.dosen.index') }}" class="nav-link">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>Dosen</p>
            </a>
          </li>
          <!-- Add more menu items here -->
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('title')</h1>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        @yield('content')
      </div>
    </div>
  </div>

  <footer class="main-footer">
    <strong>Copyright &copy; 2024 E-Learning.</strong> All rights reserved.
  </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
@stack('scripts')
</body>
</html>
