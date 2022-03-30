<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <ul class="nav nav-pills nav-sidebar flex-column pt-3" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('personal') }}" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    {{ __('Главная') }}
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('personal.like') }}" class="nav-link">
                  <i class="nav-icon far fa-heart"></i>
                  <p>
                    {{ __('Понравившиеся посты') }}
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('personal.comment') }}" class="nav-link">
                  <i class="nav-icon far fa-comments"></i>
                  <p>
                    {{ __('Комментарии') }}
                  </p>
                </a>
            </li>
        </ul>
    </div>
</aside>
