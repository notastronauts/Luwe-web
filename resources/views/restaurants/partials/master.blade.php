@include('restaurants.partials.includes.head')

@section('navbar')
@include('restaurants.partials.includes.sections.navigation')
@show

@section('sidebar')
@include('restaurants.partials.includes.sections.sidebar')
@show
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            @yield('page-title')
        </div>
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>
@include('restaurants.partials.includes.footer')