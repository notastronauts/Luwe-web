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
                <li class="breadcrumb-item"><a href="{{ route('table-manager.index', $restaurant->id) }}">Table Manager</a>
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
                    <h2>Tambah Meja Baru</h2>
                    <hr class="my-2">
                    <form action="{{ route('table-manager.store') }}" method="POST">
                        @csrf
                        <input type="number" name="id" hidden value="{{ $restaurant->id }}">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="NomorMeja">{{ __('Nomor Meja') }}</label>
                                    <input type="number" name="nomor_meja" id="NomorMeja" class="form-control @error('nomor_meja') is-invalid @enderror" min="1">
                                    @error('nomor_meja')
                                    <span class="invalid-feedback text-left" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="JumlahKursi">{{ __('Jumlah Kursi') }}</label>
                                    <input type="number" name="jumlah_kursi" id="JumlahKursi" class="form-control @error('jumlah_kursi') is-invalid @enderror" min="1">
                                    @error('jumlah_kursi')
                                    <span class="invalid-feedback text-left" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
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

</script>
@endsection