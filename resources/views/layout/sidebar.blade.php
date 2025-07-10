<div id="app-sidepanel" class="app-sidepanel"> 
    <div id="sidepanel-drop" class="sidepanel-drop"></div>
    <div class="sidepanel-inner d-flex flex-column">
        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
        <div class="app-branding text-center py-3 border-bottom">
            <a class="app-logo d-flex align-items-center justify-content-center" href="/dashboard">
                {{-- <img class="logo-icon me-2" src="{{asset('assets/images/app-logo.svg')}}" alt="logo" style="height:36px;"> --}}
                <span class="logo-text fw-bold" style="color:#15a362;font-size:1.2rem;">Tawfekh-Immo</span>
            </a>
        </div><!--//app-branding-->  
        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1 mt-3">
            <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                @foreach ([
                    ['route' => 'dashboard.admin', 'icon' => 'fa-gauge-high', 'label' => 'Dashboard'],
                    ['route' => 'type_properties.index', 'icon' => 'fa-building', 'label' => 'Types de Propriétés'],
                    ['route' => 'properties.index', 'icon' => 'fa-location-dot', 'label' => 'Properties'],
                    ['route' => 'images.index', 'icon' => 'fa-location-dot', 'label' => 'Images des Propriétés'],
                    ['route' => 'contacts.index', 'icon' => 'fa-envelope', 'label' => 'Contacts'],
                    ['route' => 'programer_visites.index', 'icon' => 'fa-calendar-days', 'label' => 'Programmer Visites'],
                    
                    
                   
                ] as $item) 
                 <li class="nav-item mb-1">
                    <a class="nav-link d-flex align-items-center {{ request()->routeIs($item['route']) ? 'active' : '' }}" href="{{ route($item['route']) }}">
                        <span class="nav-icon me-2">
                            <i class="fa-solid {{ $item['icon'] }}"></i>
                        </span>
                        <span class="nav-link-text">{{ $item['label'] }}</span>
                    </a>
                </li>
                @endforeach
                </ul>
        </nav>
        <div class="app-sidepanel-footer mt-auto py-3 border-top text-center">
            <small class="text-muted">&copy; {{ date('Y') }} Tawfekh-Immo</small>
</div>
    </div><!--//sidepanel-inner-->
</div><!--//app-sidepanel-->