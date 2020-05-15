@extends('restaurants.partials.master')
@section('navbar')
@parent
@stop
@section('sidebar')
@parent
@stop
@section('page-title')
<div class="content-header-left col-md-4 col-12 mb-2">
    <h3 class="content-header-title">Table Manager</h3>
</div>
<div class="content-header-right col-md-8 col-12">
    <div class="breadcrumbs-top float-md-right">
        <div class="breadcrumb-wrapper mr-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Table Manager
                </li>
            </ol>
        </div>
    </div>
</div>
@endsection
@section('content')
<section>
    <div class="row mb-1">
        <div class="col-6">
            <a href="{{ route('table-manager.create', $restaurant->id) }}" type="button" class="btn btn-primary btn-lg py-1 text-white" role="button">
                <i class="la la-plus"></i> Tambahkan meja baru
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $restaurant->restaurant_name }}</h3>
                    <h4 class="card-title">{{ $restaurant->restaurant_description }}</h4>
                    <p class="card-subtitle text-muted">
                        {{
                            $restaurant->address->address . __(', ')
                        }}
                        <br>
                        {{
                            $restaurant->address->postal_code->urban . __(', ') .
                            $restaurant->address->sub_district->sub_district_name . __(', ') .
                            $restaurant->address->sub_district->city->city_name . __(', ') .
                            $restaurant->address->sub_district->city->province->province_name . __(' ') .
                            $restaurant->address->postal_code->postal_code . __(' ')
                        }}
                    </p>
                    <div class="table-responsive">
                        <table class="table" id="meja">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col"> {{ __('Nomor Meja') }} </th>
                                    <th scope="col"> {{ __('Jumlah Kursi') }} </th>
                                    <th scope="col"> {{ __('Ketersediaan') }} </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($restaurant->meja as $meja)
                                <tr>
                                    <td>{{ $meja->nomor_meja }}</td>
                                    <td>{{ $meja->jumlah_kursi }}</td>
                                    @if($meja->ketersediaan == 1)
                                        <td>Tersedia</td>
                                    @else
                                        <td class="text-danger">Sudah dipesan</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script src="{{ asset('restaurant/admin/vendors/DataTables/datatables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#meja').DataTable();
    });
</script>
@endsection