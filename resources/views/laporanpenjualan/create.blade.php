@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Tambah Data Penjualan Buku</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Penjualan Buku</div>
                <div class="card-body">
                    <form action="{{ route('laporanpenjualan.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Masukan Judul Buku</label>
                            <select name="id_buku" class="form-control @error('id_buku') is-invalid @enderror">
                                @foreach ($buku as $data)
                                <option value="{{ $data->id }}">{{ $data->judul_buku }}</option>
                                @endforeach
                            </select>
                            @error('id_buku')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Masukan Harga Buku</label>
                            <select name="id_buku" class="form-control @error('id_buku') is-invalid @enderror">
                                @foreach ($buku as $data)
                                <option value="{{ $data->id }}">{{ $data->harga }}</option>
                                @endforeach
                            </select>
                            @error('id_buku')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Masukan Nama Rekening</label>
                            <select name="id_transaksi" class="form-control @error('id_transaksi') is-invalid @enderror">
                                @foreach ($penjualan as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_rek }}</option>
                                @endforeach
                            </select>
                            @error('id_transaksi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Masukan No Rekening</label>
                            <select name="id_transaksi" class="form-control @error('id_transaksi') is-invalid @enderror">
                                @foreach ($penjualan as $data)
                                <option value="{{ $data->id }}">{{ $data->no_rek }}</option>
                                @endforeach
                            </select>
                            @error('id_transaksi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Total Buku</label>
                            <select name="id_transaksi" class="form-control @error('id_transaksi') is-invalid @enderror">
                                @foreach ($penjualan as $data)
                                <option value="{{ $data->id }}">{{ $data->total_buku }}</option>
                                @endforeach
                            </select>
                            @error('id_transaksi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Nama Bank</label>
                            <select name="id_transaksi" class="form-control @error('id_transaksi') is-invalid @enderror">
                                @foreach ($penjualan as $data)
                                <option value="{{ $data->id }}">{{ $data->bank }}</option>
                                @endforeach
                            </select>
                            @error('id_transaksi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Total Harga</label>
                            <select name="id_transaksi" class="form-control @error('id_transaksi') is-invalid @enderror">
                                @foreach ($penjualan as $data)
                                <option value="{{ $data->id }}">{{ $data->total_harga }}</option>
                                @endforeach
                            </select>
                            @error('id_transaksi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="reset" class="btn btn-outline-warning">Reset</button>
                            <button type="submit" class="btn btn-outline-warning">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection