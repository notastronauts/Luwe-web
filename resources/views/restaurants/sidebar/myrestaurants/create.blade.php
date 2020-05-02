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
                <li class="breadcrumb-item"><a href="{{ route('myrestaurants.index') }}">My Restaurants</a>
                </li>
                <li class="breadcrumb-item active">Create
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
                    <h2>Tambah Restoran atau Kafe baru</h2>
                    <hr class="my-2">
                    <form action="{{ route('myrestaurants.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="NamaRestoran">{{ __('Nama Restoran') }}</label>
                            <input name="restaurant_name" type="text" class="form-control" id="NamaRestoran" placeholder="Nama restoran" value="{{ old('restaurant_name') }}">
                        </div>
                        <div class="form-group">
                            <label for="DeskripsiRestorant">{{ __('Deskripsi') }}</label>
                            <textarea name="restaurant_description" class="form-control" id="DeskripsiRestoran" rows="3" placeholder="Deskripsi restoran"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="AlamatRestoran">{{ __('Alamat') }}</label>
                            <textarea name="address" class="form-control" id="AlamatRestoran" rows="3" placeholder="Alamat restoran"></textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="Provinsi">{{ __('Provinsi') }}</label>
                                <input type="text" name="province_id" id="Provinsi" class="form-control provinces-autocomplete">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="kotaKabupaten">{{ __('Kabupaten/Kota') }}</label>
                                <select name="city_id" id="kotaKabupaten" class="form-control">
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="kecamatan">{{ __('Kecamatan') }}</label>
                                <select name="sub_district_id" id="kecamatan" class="form-control">
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="kode_pos">{{ __('Desa - Kode Pos') }}</label>
                                <select name="postal_id" class="form-control" id="kode_pos"></select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var id_provinsi;
    $(document).ready(function() {
        $(".provinces-autocomplete").autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{route('provinces.get')}}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('.provinces-autocomplete').val(ui.item.value);
                id_provinsi = ui.item.value;
                var find = id_provinsi;
                if (find) {
                    $.ajax({
                        type: "post",
                        url: "{{ route('cities.get') }}",
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: find
                        },
                        success: function(response) {
                            $('#kotaKabupaten').empty();
                            $("#kotaKabupaten").append('<option>-- Pilih Kota--</option>');
                            if (response) {
                                $.each(response, function(key, value) {
                                    $('#kotaKabupaten').append($("<option/>", {
                                        value: value.city_id,
                                        text: value.city_name
                                    }));
                                });
                            }
                        }
                    });
                }
                return false;
            }
        });
        $("#kotaKabupaten").change(function() {
            var city_id = $(this).val();
            if (city_id) {
                $.ajax({
                    type: "post",
                    url: "{{ route('sub-district.get') }}",
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: city_id
                    },
                    success: function(response) {
                        $('#kecamatan').empty();
                        $("#kecamatan").append('<option>-- Pilih Kecamatan--</option>');
                        if (response) {
                            $.each(response, function(key, value) {
                                $('#kecamatan').append($("<option/>", {
                                    value: value.sub_district_id,
                                    text: value.sub_district_name
                                }));
                            });
                        }
                    }
                });
            }
        });
        $("#kecamatan").change(function() {
            var sub_district_id = $(this).val();
            if (sub_district_id) {
                $.ajax({
                    type: "post",
                    url: "{{ route('postal-code.get') }}",
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: sub_district_id
                    },
                    success: function(response) {
                        $('#kode_pos').empty();
                        $("#kode_pos").append('<option>-- Pilih Desa - Kode Pos--</option>');
                        if (response) {
                            $.each(response, function(key, value) {
                                $('#kode_pos').append($("<option/>", {
                                    value: value.id,
                                    text: value.urban + " - " + value.postal_code
                                }));
                            });
                        }
                    }
                });
            }
        });
    });
</script>
@endsection