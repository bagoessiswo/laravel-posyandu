
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
  <div class="container px-4 px-lg-5">
    <a class="navbar-brand" href="/">ASIPS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto py-4 py-lg-0">
            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/">Home</a></li>
            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/about">About</a></li>
            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/history">History Posyandu</a></li>
        </ul>
        @if (session('user'))
          <a style="margin-left: 2px;" class="btn btn-primary" href="/logout">Logout</a>
        @else
          <a style="margin-left: 2px;" class="btn btn-primary" href="/login">Login</a>
        @endif
        
    </div>
  </div>
</nav>