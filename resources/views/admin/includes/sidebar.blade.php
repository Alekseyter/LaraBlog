<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <ul class="nav nav-pills nav-sidebar flex-column pt-3" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin') }}" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    {{ __('Главная') }}
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.user') }}" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    {{ __('Пользователи') }}
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.post') }}" class="nav-link">
                  <i class="nav-icon far fa-clipboard"></i>
                  <p>
                    {{ __('Посты') }}
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.category') }}" class="nav-link">
                  <i class="nav-icon fas fa-th-list"></i>
                  <p>
                    {{ __('Категории') }}
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.tag') }}" class="nav-link">
                    <i class="nav-icon fas fa-tags"></i>
                  <p>
                    {{ __('Теги') }}
                  </p>
                </a>
            </li>
        </ul>
    </div>
</aside>
