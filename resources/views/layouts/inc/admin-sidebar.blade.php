<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link {{ Request::is('admin/add_category') || Request::is('admin/category') || Request::is('admin/edit_category/*') ? 'collapse active' : '' }}"
                    href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Category
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('admin/add_category') || Request::is('admin/category') || Request::is('admin/edit_category/*') ? 'show' : '' }}"
                    id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('admin/add_category') ? 'active' : '' }}"
                            href="{{ route('admin.add_category') }}">Add Category</a>
                        <a class="nav-link {{ Request::is('admin/category') || Request::is('admin/edit_category/*') ? 'active' : '' }}"
                            href="{{ url('admin/category') }}">View Category</a>
                    </nav>
                </div>
                <a class="nav-link {{ Request::is('admin/add_post') || Request::is('admin/view_post') || Request::is('admin/edit_post/*') ? 'collapse active' : 'collapsed' }}"
                    href="#" data-bs-toggle="collapse" data-bs-target="#collapseposts" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Post
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('admin/add_post') || Request::is('admin/view_post') || Request::is('admin/edit_post/*') ? 'show' : '' }}"
                    id="collapseposts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('admin/add_post') ? 'active' : '' }}"
                            href="{{ route('admin.add_post') }}">Add Post</a>
                        <a class="nav-link {{ Request::is('admin/view_post') || Request::is('admin/edit_post/*') ? 'active' : '' }}"
                            href="{{ route('admin.view_post') }}">View Post</a>
                    </nav>
                </div>
                <a class="nav-link {{ Request::is('admin/view_user') ? 'active' : '' }}"
                    href="{{ route('admin.view_user') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    User
                </a>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <h5 class="mb-0 me-2 text-white">Logged as:</h5>
                <span class="badge bg-primary text-white">Admin</span>
            </div>
        </div>
    </nav>
</div>
