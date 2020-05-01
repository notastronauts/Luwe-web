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
</section>
@endsection
@section('script')
<script>
    $('#alertClose').on('click', function() {
        $('.alert').alert('dispose');
    });
</script>
@endsection