<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="/dash/">{{ mine()['title'] }}</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <span class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    </span>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#changepw">
                    Change Pw
                </li>
                <li><hr class="dropdown-divider"/></li>
                <form action="{{ route('auth_logout') }}" method="POST">
                    @csrf
                    <button type="submit" name="logout" class="dropdown-item">Logout</button>
                </form>
            </ul>
        </li>
    </ul>
</nav>
{{-- Change PW --}}
<div class="modal fade" id="changepw" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ route('changepw') }}" method="POST" class="modal-content">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Change Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-floating mb-3">
                <input class="form-control" id="inputPassword" name="password" required type="password" placeholder="Password" />
                <label for="inputPassword">Password</label>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="changepw" class="btn btn-primary">Save</button>
        </div>
    </form>
    </div>
  </div>
{{-- Change PW --}}
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link " href="{{ route('dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Items</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Page
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('category.index') }}">Category</a>
                            <a class="nav-link" href="{{ route('package.index') }}">Package</a>
                        </nav>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a class="link-decoration-none" href="/">{{ mine()['title'] }}</a></li>
                    <li class="breadcrumb-item"><a class="link-decoration-none" href="{{ route('dashboard') }}">Dashboard</a></li>
                    @isset($page)
                        <li class="breadcrumb-item"><a class="link-decoration-none" href="{{ route(Str::lower($page) . '.index') }}">{{ $page }}</a></li>
                    @endisset
                </ol>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled text-center">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif