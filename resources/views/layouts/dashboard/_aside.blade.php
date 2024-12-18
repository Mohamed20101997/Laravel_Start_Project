<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
    <div>
      <p class="app-sidebar__user-name">{{auth()->user()->name}}</p>
      <p class="app-sidebar__user-designation">{{auth()->user()->email}}</p>
    </div>
  </div>
  <ul class="app-menu">

        <li><a class="app-menu__item  {{\Request::route()->getName() == 'welcome' ? 'active' : ''}}" href="{{ route('welcome') }}">
            <i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a>
        </li>

        <li>
            <a class="app-menu__item  {{\Request::route()->getName() == 'admin.index' ? 'active' : ''}}" href="{{ route('admin.index') }}">
                <i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Admins</span>
            </a>
        </li>

  </ul>
</aside>
