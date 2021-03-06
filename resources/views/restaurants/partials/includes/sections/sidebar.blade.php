<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true" data-img="{{ asset('restaurant/admin/images/backgrounds/02.jpg') }}">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <!-- <img class="brand-logo" alt="Chameleon admin logo" src="theme-assets/images/logo/logo.png" /> -->
                    <h3 class="brand-text">Luwe Reservation App</h3>
                </a></li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
    </div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="active">
                <a href="index.html">
                    <i class="ft-home"></i>
                    <span class="menu-title" data-i18n="">Dashboard</span>
                </a>
            </li>
            <li class=" nav-item">
                <a href="{{ route('myrestaurants.index') }}">
                    <i class="ft-pie-chart"></i>
                    <span class="menu-title" data-i18n="">My Restaurants</span>
                </a>
            </li>
            <li class="nav-item has-sub">
                <a href="#">
                    <i class="ft-layers"></i>
                    <span class="menu-title" data-i18n="">Table Manager</span>
                </a>
                <ul class="menu-content" style="">
                    @foreach($restaurants = 'App\Restaurant'::get() as $restaurant)
                    <li class="is-shown">
                        <a class="menu-item" href="{{ route('table-manager.index', $restaurant->id ) }}">{{ $restaurant->restaurant_name }}</a>
                    </li>
                    @endforeach
                </ul>
            </li>
            <!-- <li class=" nav-item"><a href="cards.html"><i class="ft-layers"></i><span class="menu-title" data-i18n="">Cards</span></a>
            </li>
            <li class=" nav-item"><a href="buttons.html"><i class="ft-box"></i><span class="menu-title" data-i18n="">Buttons</span></a>
            </li>
            <li class=" nav-item"><a href="typography.html"><i class="ft-bold"></i><span class="menu-title" data-i18n="">Typography</span></a>
            </li>
            <li class=" nav-item"><a href="tables.html"><i class="ft-credit-card"></i><span class="menu-title" data-i18n="">Tables</span></a>
            </li>
            <li class=" nav-item"><a href="form-elements.html"><i class="ft-layout"></i><span class="menu-title" data-i18n="">Form Elements</span></a>
            </li>
            <li class=" nav-item"><a href="https://themeselection.com/demo/chameleon-admin-template/documentation"><i class="ft-book"></i><span class="menu-title" data-i18n="">Documentation</span></a>
            </li> -->
        </ul>
    </div>
    <div class="navigation-background">
    </div>
</div>