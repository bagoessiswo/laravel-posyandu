<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">ASIPS</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="/admin/dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Menu
</div>
@if (session('role')->role === 'Super Admin' || session('role')->role === 'Admin')
<li class="nav-item">
    <a class="nav-link" href="/admin/balita">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Pendaftaran Balita</span>
    </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="/admin/history-posyandu">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>History Posyandu</span>
  </a>
</li>
@endif
@if (session('role')->role === 'Super Admin')
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
        aria-expanded="true" aria-controls="collapseOne">
        <i class="fas fa-fw fa-cog"></i>
        <span>Data Master</span>
    </a>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/admin/kecamatan">Kecamatan</a>
            <a class="collapse-item" href="/admin/kelurahan">Kelurahan</a>
            <a class="collapse-item" href="/admin/posyandu">Posyandu</a>
            <a class="collapse-item" href="/admin/role">Role</a>
            <a class="collapse-item" href="/admin/user">User</a>
        </div>
    </div>
</li>
@endif

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->