<ul class="metismenu" id="menu">

  <!-- Dashboard -->
  <li class="sidebar-header">{{ __('admin.menu.dashboard.title') }}</li>

  <li class="sidebar-item">
    <a class="sidebar-link" href="javascript:void(0)" aria-expanded="false">
      <i class="fa-solid fa-tachometer-alt icon"></i>
      <div class="middle">{{ __('admin.menu.dashboard.main') }}</div>
    </a>
  </li>

  <hr class="sidebar-divider">

  <!-- Laundry -->
  <li class="sidebar-header">{{ __('admin.menu.laundry.title') }}</li>

  <li class="{{ Route::is('outlet*') ? 'sidebar-item mm-active' : 'sidebar-item' }}">
    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
      <i class="fa-solid fa-fire icon"></i>
      <div class="middle">{{ __('admin.menu.outlet.main') }}</div>
    </a>
    <ul class="submenu">
      <div class="submenu-wrapper">
        <li class="{{ Route::is('outlet.index') ? 'submenu-item mm-active' : 'submenu-item' }}">
          <a class="submenu-link" href="{{ route('outlet.index') }}" aria-expanded="false">
            <div class="middle">{{ __('admin.menu.outlet.all') }}</div>
          </a>
        </li>
        <li class="{{ Route::is('outlet.create') ? 'submenu-item mm-active' : 'submenu-item' }}">
          <a class="submenu-link" href="{{ route('outlet.create') }}" aria-expanded="false">
            <div class="middle">{{ __('admin.menu.outlet.new') }}</div>
          </a>
        </li>
      </div>
    </ul>
  </li>
  <li class="sidebar-item">
    <a href="javascript:void(0)" class="sidebar-link has-arrow">
      <i class="fa-solid icon fa-box"></i>
      <span class="middle">{{ __('admin.menu.package.main') }}</span>
    </a>
    <ul class="submenu">
      <div class="submenu-wrapper">
        <li class="submenu-item">
          <a class="submenu-link" href="javascript:void(0)" aria-expanded="false">
            <div class="middle">{{ __('admin.menu.package.all') }}</div>
          </a>
        </li>
        <li class="submenu-item">
          <a class="submenu-link" href="javascript:void(0)" aria-expanded="false">
            <div class="middle">{{ __('admin.menu.package.new') }}</div>
          </a>
        </li>
      </div>
    </ul>
  </li>
  <li class="sidebar-item">
    <a href="javascript:void(0)" class="sidebar-link has-arrow">
      <i class="fa-solid icon fa-box"></i>
      <span class="middle">{{ __('admin.menu.order.main') }}</span>
    </a>
    <ul class="submenu">
      <div class="submenu-wrapper">
        <li class="submenu-item">
          <a class="submenu-link" href="javascript:void(0)" aria-expanded="false">
            <div class="middle">{{ __('admin.menu.order.all') }}</div>
          </a>
        </li>
        <li class="submenu-item">
          <a class="submenu-link" href="javascript:void(0)" aria-expanded="false">
            <div class="middle">{{ __('admin.menu.order.new') }}</div>
          </a>
        </li>
      </div>
    </ul>
  </li>

  <hr class="sidebar-divider">

  <!-- Laundry -->
  <li class="sidebar-header">{{ __('admin.menu.queue.title') }}</li>

  <li class="sidebar-item">
    <a href="javascript:void(0)" class="sidebar-link has-arrow">
      <i class="fa-solid icon fa-tshirt"></i>
      <span class="middle">{{ __('admin.menu.queue.main') }}</span>
    </a>
    <ul class="submenu">
      <div class="submenu-wrapper">
        <li class="submenu-item">
          <a class="submenu-link" href="javascript:void(0)" aria-expanded="false">
            <div class="middle">{{ __('admin.menu.queue.all') }}</div>
          </a>
        </li>
        <li class="submenu-item">
          <a class="submenu-link" href="javascript:void(0)" aria-expanded="false">
            <div class="middle">{{ __('admin.menu.queue.new') }}</div>
          </a>
        </li>
      </div>
    </ul>
  </li>
  <li class="sidebar-item">
    <a class="sidebar-link" href="javascript:void(0)" aria-expanded="false">
      <i class="fa-solid fa-file icon"></i>
      <div class="middle">{{ __('admin.menu.bill') }}</div>
    </a>
  </li>

  <hr class="sidebar-divider">

  <!-- Laundry -->
  <li class="sidebar-header">{{ __('admin.menu.user.title') }}</li>

  <li class="sidebar-item">
    <a href="javascript:void(0)" class="sidebar-link has-arrow">
      <i class="fa-solid icon fa-user"></i>
      <span class="middle">{{ __('admin.menu.user.main') }}</span>
    </a>
    <ul class="submenu">
      <div class="submenu-wrapper">
        <li class="submenu-item">
          <a class="submenu-link" href="javascript:void(0)" aria-expanded="false">
            <div class="middle">{{ __('admin.menu.user.all') }}</div>
          </a>
        </li>
        <li class="submenu-item">
          <a class="submenu-link" href="javascript:void(0)" aria-expanded="false">
            <div class="middle">{{ __('admin.menu.user.new') }}</div>
          </a>
        </li>
      </div>
    </ul>
  </li>

  <hr class="sidebar-divider">

  <!-- Settings -->
  <li class="sidebar-header">{{ __('admin.menu.settings.title') }}</li>

  <li class="sidebar-item">
    <a href="javascript:void(0)" class="sidebar-link has-arrow">
      <i class="fa-solid icon fa-tshirt"></i>
      <span class="middle">{{ __('admin.menu.settings.main') }}</span>
    </a>
    <ul class="submenu">
      <div class="submenu-wrapper">
        <li class="submenu-item">
          <a class="submenu-link" href="javascript:void(0)" aria-expanded="false">
            <div class="middle">{{ __('admin.menu.settings.sites') }}</div>
          </a>
        </li>
        <li class="submenu-item">
          <a class="submenu-link" href="javascript:void(0)" aria-expanded="false">
            <div class="middle">{{ __('admin.menu.settings.appearance') }}</div>
          </a>
        </li>
        <li class="submenu-item">
          <a class="submenu-link" href="javascript:void(0)" aria-expanded="false">
            <div class="middle">{{ __('admin.menu.settings.email') }}</div>
          </a>
        </li>
      </div>
    </ul>
  </li>
  <li class="sidebar-item">
    <a class="sidebar-link" href="javascript:void(0)" aria-expanded="false">
      <i class="fa-solid fa-info-circle icon"></i>
      <div class="middle">{{ __('admin.menu.about') }}</div>
    </a>
  </li>
</ul>
