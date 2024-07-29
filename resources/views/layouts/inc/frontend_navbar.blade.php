<div class="global-navbar">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
          <a class="navbar-brand" href="#">
              {{-- <img src="path_to_logo.png" alt="Logo" style="height: 30px;"> --}}
              <span>SPJ Blogger</span>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" 
                         href="{{ url('/') }}"
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
          </div>
      </div>
  </nav>
</div>
