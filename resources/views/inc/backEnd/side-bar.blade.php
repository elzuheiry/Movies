<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="{{ route("dashboard") }}" class="app-brand-link">
        <span class="app-brand-text demo menu-text fw-bolder ms-2">{{ __("Dashboard") }}</span>
      </a>

      <a href="" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      
      <!-- Dashboard -->
      <li class="menu-item {{ request()->routeIs("dashboard") ? "active" : "" }}">
        <a href="{{ route("dashboard") }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">{{ __("Dashboard") }}</div>
        </a>
      </li>

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">{{ __("Pages") }}</span>
      </li>

      {{-- Users --}}
      <li class="menu-item {{ request()->routeIs("admin.users.index", "admin.users.create", "admin.users.edit") ? "active open" : "" }}">
        <a href="" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-user"></i>
          <div data-i18n="Account Settings">{{ __("Users") }}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ request()->routeIs("admin.users.index") ? "active" : "" }}">
            <a href="{{ route("admin.users.index") }}" class="menu-link">
              <div data-i18n="Account">{{ __("All Users") }}</div>
            </a>
          </li>

          <li class="menu-item {{ request()->routeIs("admin.users.create") ? "active" : "" }}">
            <a href="{{ route("admin.users.create") }}" class="menu-link">
              <div data-i18n="Account">{{ __("Create New User") }}</div>
            </a>
          </li>
        </ul>
      </li>

      {{-- Categories --}}
      <li class="menu-item {{ request()->routeIs("admin.categories.index", "admin.categories.create", "admin.categories.edit") ? "active open" : "" }}">
        <a href="" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-user"></i>
          <div data-i18n="Account Settings">{{ __("Categories") }}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ request()->routeIs("admin.categories.index") ? "active" : "" }}">
            <a href="{{ route("admin.categories.index") }}" class="menu-link">
              <div data-i18n="Account">{{ __("All Categories") }}</div>
            </a>
          </li>

          <li class="menu-item {{ request()->routeIs("admin.categories.create") ? "active" : "" }}">
            <a href="{{ route("admin.categories.create") }}" class="menu-link">
              <div data-i18n="Account">{{ __("Create New Category") }}</div>
            </a>
          </li>
        </ul>
      </li>

      {{-- Movies --}}
      <li class="menu-item {{ request()->routeIs("admin.movies.index", "admin.movies.create", "admin.movies.edit") ? "active open" : "" }}">
        <a href="" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-user"></i>
          <div data-i18n="Account Settings">{{ __("Movies") }}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ request()->routeIs("admin.movies.index") ? "active" : "" }}">
            <a href="{{ route("admin.movies.index") }}" class="menu-link">
              <div data-i18n="Account">{{ __("All Movies") }}</div>
            </a>
          </li>

          <li class="menu-item {{ request()->routeIs("admin.movies.create") ? "active" : "" }}">
            <a href="{{ route("admin.movies.create") }}" class="menu-link">
              <div data-i18n="Account">{{ __("Create New Movie") }}</div>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </aside>