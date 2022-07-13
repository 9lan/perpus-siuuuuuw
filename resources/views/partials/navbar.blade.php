<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow ">

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
  </button>

  <!-- Topbar Search -->

  <div class="d-flex flex-row bd-highlight mr-auto">
      <!-- <img src="../assets/logo_sekolah.png" alt="logo" width="30" class="my-auto"> -->
      <h5 class="fw-bolder my-auto text-secondary"><b><i>PERPUS DONG</i></b></h5>
  </div>

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ms-auto">
      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      @auth
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Hi, {{ auth()->user()->name }}
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
            <li>
              <form action={{ route('auth.logout') }} method="POST">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
              </form>
            </li>
          </ul>
        </div>
      @endauth

  </ul>

</nav>