@extends('restaurants.partials.master')
@section('navbar')
@parent
@stop
@section('sidebar')
@parent
@stop
@section('page-title')
<div class="content-header-left col-md-4 col-12 mb-2">
    <h3 class="content-header-title">My Restaurants</h3>
</div>
<div class="content-header-right col-md-8 col-12">
    <div class="breadcrumbs-top float-md-right">
        <div class="breadcrumb-wrapper mr-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">My Restaurants
                </li>
            </ol>
        </div>
    </div>
</div>
@endsection
@section('content')
<section>
    @if($restaurants->isEmpty())
    <div class="row mb-1 justify-content-center">
        <div class="col-12 align-center">
            <div class="card">
                <div class="card-body">
                    <h2>Selamat datang di Luwe : Restaurant and Cafe Reservation App</h2>
                    <hr>
                    <p class="lead text-dark mb-2">Silahkan daftarkan Restoran atau Kafe anda untuk dapat melanjutkan ke tahap berikutnya.</p>
                    <a href="{{ route('myrestaurants.create') }}" type="button" class="btn btn-primary btn-lg py-1 text-white" role="button">
                        <i class="la la-plus"></i> Daftarkan Restoran atau Kafe Baru
                    </a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        @foreach($restaurants as $restaurant)
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $restaurant->restaurant_name }}</h4>
                    <h6 class="card-subtitle text-muted">{{ $restaurant->restaurant_description }}</h6>
                </div>
                <img class="img-fluid" src="{{ asset('storage/images/' . Auth::user()->id . '/restaurant/thumbnail/' . $restaurant->images->first()->name ) }}" alt="Card image cap">
                <!-- <div class="card-body">
                    <div class="row">
                        <div class="col-1">
                            <i class="la la-map-marker"></i>
                        </div>
                        <p class="card-text col">
                            {{ $restaurant->address->address .__(', ').
                            $restaurant->address->postal_code->urban .__(', ').
                            $restaurant->address->sub_district->sub_district_name .__(', ').
                            $restaurant->address->sub_district->city->city_name .__(', ').
                            $restaurant->address->sub_district->city->province->province_name .__(' ').
                            $restaurant->address->postal_code->postal_code
                        }}
                        </p>
                    </div>
                </div> -->
                <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                    <span class="float-left">3 hours ago</span>
                    <span class="float-right">
                        <a href="{{ route('myrestaurants.edit', $restaurant->id) }}" class="card-link">Edit Restoran
                            <i class="la la-angle-right"></i>
                        </a>
                    </span>
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <i class="la la-plus"></i>
            </div>
        </div>
    </div>
    @endif
</section>
@endsection
@section('script')
<script>
    $('#alertClose').on('click', function() {
        $('.alert').alert('dispose');
    });
</script>
@endsection