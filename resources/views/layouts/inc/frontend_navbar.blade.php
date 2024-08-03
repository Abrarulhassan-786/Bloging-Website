<div class="global-navbar sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                {{-- <img src="path_to_logo.png" alt="Logo" style="height: 30px;"> --}}
                <span>SPJ Blogger</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}"
                            style="{{ request()->is('/') ? 'color: #0d6efd; font-weight: bold;' : '' }}">
                            Home
                        </a>
                    </li>
                    @php
                        $categories = App\Models\Category::where('navbar_status', 0)->where('status', 0)->get();
                    @endphp
                    @foreach ($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('tutorial/' . $category->slug) ? 'active' : '' }}"
                                href="{{ url('tutorial/' . $category->slug) }}"
                                style="{{ request()->is('tutorial/' . $category->slug) ? 'color: #0d6efd; font-weight: bold;' : '' }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" 
                           href="{{ url('/login') }}"
                           style="background-color: rgb(8, 136, 211); color: white; border-radius: 5px; margin-right: 10px; {{ request()->is('login') ? 'background-color:white;color: black; font-weight: bold;' : '' }}">
                           Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('register') ? 'active' : '' }}" 
                           href="{{ url('/register') }}"
                           style="background-color: rgb(8, 136, 211); color: white; border-radius: 5px; margin-right: 10px; {{ request()->is('register') ? 'background-color:white;color: black; font-weight: bold;' : '' }}">
                           Registration
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
