<div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">@yield('pages')</li>
      </ol>
      <h6 class="font-weight-bolder mt-2 mb-0">@yield('pages')</h6>
      
    </nav>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          
          {{-- <div class="input-group input-group-outline">
            <label class="form-label">Type here...</label>
            <input type="text" class="form-control">
          </div> --}}
          
      </div>
      @php
        $user_id = Auth::user()->id;
        $role = Auth::user()->role;
      @endphp
      <ul class="navbar-nav ms-auto align-items-center">
        <!-- Profile Image -->
        <li class="nav-item d-flex align-items-center">
            <img src="{{ asset('storage/' . Auth::user()->profile) }}" width="40" height="40" class="rounded-circle me-2" alt="User Profile">
        </li>
        
        <!-- User Name with Edit Link -->
        <li class="nav-item d-flex align-items-center">
            <a class="btn btn-outline-primary btn-sm mb-0 me-3" href="{{ route('edit', $user_id) }}">
                {{ Auth::user()->name }}
            </a>
        </li>
        
        <!-- Mobile Navbar Toggler -->
        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                </div>
            </a>
        </li>
        
        <!-- Logout Button -->
        <li class="nav-item d-flex align-items-center">
            <a href="{{ route('logout') }}" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-sign-out me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign Out</span>
            </a>
        </li>
    </ul>
    
    </div>
  </div>