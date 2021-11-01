<!-- <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container">
    <a class="navbar-brand" href="/">ASIPS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ ($title === "Home") ? 'active' : '' }}"  href="/">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link {{ ($title === "About") ? 'active' : '' }}"  href="/about">About</a>
        </li>
        <a class="nav-link {{ ($title === "News") ? 'active' : '' }}" href="/news">News</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
        <a style="margin-left: 2px" class="btn btn-primary" href="/register">Login</a>
      </form>
    </div>
  </div>
</nav> -->

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
            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/contact">Contact</a></li>
        </ul>
        <a style="margin-left: 2px; display: {{$title === 'Login' ? 'none' : 'block'}}" class="btn btn-primary" href="/register">Login</a>
    </div>
  </div>
</nav>