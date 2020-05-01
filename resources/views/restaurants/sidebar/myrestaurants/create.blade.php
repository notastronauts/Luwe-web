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
                    <form action="#">
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
                            <div class="form-group col-md-6">
                                <label for="Provinsi">{{ __('Provinsi') }}</label>
                                <input type="text" name="city_id" id="Provinsi" class="form-control provinces-autocomplete">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Kabupaten">Kabupaten</label>
                                <select name="kabupaten" id="Kabupaten" class="form-control">
                                    <option selected></option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Check me out
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign in</button>
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
                $('.provinces-autocomplete').val(ui.item.label);
                return false;
            }
        });

    });
</script>
@endsection