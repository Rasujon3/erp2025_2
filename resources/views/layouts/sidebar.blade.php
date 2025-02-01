<aside class="rapid-sidebar footerBG" id="#rapidSidebar">
    <a href="javascript:void(0)" class="btn-toggle" id="toggleButton">
        <i class="bi-chevron-left"></i>
    </a>
    <ul class="nav flex-column sticky-top">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="bi-speedometer2"></i>
                <span class="d-block">Dashboard</span>
            </a>
        </li>



        @if (in_array('crm', $modules))
            <li class="nav-item">
                <a class="nav-link {{ Route::is('crm.index') ? 'active' : '' }}" href="{{ route('crm.index') }}">
                    <i class="bi-person-plus"></i>
                    <span class="d-block">CRM</span>
                </a>

            </li>
        @endif

        @if (in_array('sales', $modules))
            <li class="nav-item">
                <a class="nav-link {{ Route::is('sales.index') ? 'active' : '' }}" href="{{ route('sales.index') }}">
                    <i class="bi-bookmark"></i>
                    <span class="d-block">Sales</span>
                </a>
            </li>
        @endif
        @if (in_array('projects', $modules))
            <li class="nav-item">
                <a class="nav-link {{ Route::is('projects.index') ? 'active' : '' }}"
                    href="{{ route('projects.index') }}">
                    <i class="bi-collection"></i>
                    <span class="d-block">Projects</span>
                </a>
            </li>
        @endif



        @if (in_array('tasks', $modules))
            <li class="nav-item">
                <a class="nav-link {{ Route::is('tasks.index') ? 'active' : '' }}" href="{{ route('tasks.index') }}">
                    <i class="bi-list-check"></i>
                    <span class="d-block">Tasks</span>
                </a>
            </li>
        @endif

        @if (in_array('hrm', $modules))
            <li class="nav-item">
                <a class="nav-link {{ Route::is('hrm.index') ? 'active' : '' }}" href="{{ route('hrm.index') }}">
                    <i class="bi-list-check"></i>
                    <span class="d-block">HRM</span>
                </a>
            </li>
        @endif

        @if (in_array('financial', $modules))
            <li class="nav-item">
                <a class="nav-link {{ Route::is('financial.index') ? 'active' : '' }}"
                    href="{{ route('financial.index') }}">
                    <i class="bi-list-check"></i>
                    <span class="d-block">Financial</span>
                </a>
            </li>
        @endif
        @if (in_array('asset', $modules))
            <li class="nav-item">
                <a class="nav-link {{ Route::is('asset.index') ? 'active' : '' }}" href="{{ route('asset.index') }}">
                    <i class="bi-list-check"></i>
                    <span class="d-block">Assets</span>
                </a>
            </li>
        @endif
        @if (in_array('dms', $modules))
            <li class="nav-item">
                <a class="nav-link {{ Route::is('dms.index') ? 'active' : '' }}" href="{{ route('dms.index') }}">
                    <i class="bi-list-check"></i>
                    <span class="d-block">DMS</span>
                </a>
            </li>
        @endif
        @if (in_array('admin', $modules))
            <li class="nav-item dropup"  >
                <a class="nav-link  {{ Route::is('admin.index') ? 'active' : '' }} dropdown-toggle"
                    href="{{ route('admin.index') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi-people"></i>
                    <span class="d-block">Admin</span>
                </a>
                <ul class="dropdown-menu border-0 shadow" style="z-index: 999 !important;">
                    <li><a class="dropdown-item {{ Route::is('countries.*') ? 'active' : '' }}"
                            href="{{ route('countries.index') }}"><i class="bi-dot"></i>Countries</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi-dot"></i>States</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi-dot"></i>Currencies</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi-dot"></i>Companies</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi-dot"></i>Branches</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi-dot"></i>Stores</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi-dot"></i>Permission</a></li>
                </ul>
            </li>
        @endif




    </ul>
</aside>
