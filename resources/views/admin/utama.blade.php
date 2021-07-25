<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Pendaftaran &mdash; PD</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets_admin')}}/bootstrap/css/bootstrap.min.css" >
  {{-- <link rel="stylesheet" href="{{asset('assets_admin')}}/all.css"> --}}
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets_admin')}}/css/style.css">
  <link rel="stylesheet" href="{{asset('assets_admin')}}/css/components.css">
  <link rel="stylesheet" href="{{asset('assets_admin')}}/css/jquery.dataTables.min.css">

  <!-- General JS Scripts -->
  <script src="{{asset('assets_admin')}}/bootstrap/jquery/jquery.min.js"></script>
  <script src="{{asset('assets_admin')}}/bootstrap/js/bootstrap.min.js"></script>
  <script src="{{asset('assets_admin')}}/jquery.nicescroll.min.js"></script>
  <script src="{{asset('assets_admin')}}/moment.min.js"></script>
  <script src="{{asset('assets_admin')}}/js/stisla.js"></script>

  
  
  <!-- Template JS File -->
  <script src="{{asset('assets_admin')}}/js/scripts.js"></script>
  <script src="{{asset('assets_admin')}}/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="{{asset('assets_admin')}}/js/page/index.js"></script>
  <script src="{{asset('assets_admin')}}/js/jquery.dataTables.min.js"></script>
  <script src="{{asset('assets_admin')}}/js/dataTables.bootstrap4.min.js"></script>
  
  
</head>

<body>
  
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{asset('assets_admin')}}/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="admin">SOLMET</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="admin">SM</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown">
                <a href="{{url('admin')}}"><i class="fas fa-home"></i><span>Beranda</span></a>
              </li>
              
              @if (Auth::user()->user_type == 'admin')
              <li class="menu-header">Data Request</li>
              <li class="nav-item dropdown">
              <a href="{{ route('member_request') }}"><i class="fas fa-user"></i> <span>Data Request</span></a>
              </li>
              @endif

              <li class="menu-header">Data Member</li>
              <li class="nav-item dropdown">
                <a href="{{route('data_member')}}"><i class="fas fa-user"></i> <span>Data Member</span></a>
              </li>

              @if (Auth::user()->user_type == 'admin')
              <li class="menu-header">Data Admin</li>
              <li class="nav-item dropdown">
                <a href="{{url('admin/adm')}}"><i class="fas fa-user"></i> <span>Kelola Admin</span></a>
              </li>
              @endif
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        @yield('modal')
        <section class="section">
            @yield('content')
        </section>
      </div>


      <!-- Footer -->
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Havid</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

</body>

@yield('js')
</html>
