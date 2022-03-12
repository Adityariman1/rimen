@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Show Laporan Penjualan</h1>
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
                <div class="card-header">Laporan Penjualan</div>
                <div class="card-body">
                    <form action="{{ route('laporanpenjualan.update', $laporanpenjualan->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for=""> Judul Buku</label>
                            <input type="text" name="judul_buku" value="{{$laporanpenjualan->judul_buku}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for=""> Harga Buku</label>
                            <input type="text" name="harga" value="{{$laporanpenjualan->harga}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Rekening</label>
                            <input type="text" name="nama_rek" value="{{$laporanpenjualan->nama_rek}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">No Rekening</label>
                            <input type="text" name="no_rek" value="{{$laporanpenjualan->no_rek}}" class="form-control" readonly>
                        </div>
                         <div class="form-group">
                             <label for="">Total Buku</label>
                             <input type="text" name="total_buku" value="{{$laporanpenjualan->total_buku}}" class="form-control" readonly>
                         </div>
                        <div class="form-group">
                            <label for="">Nama Bank</label>
                            <input type="text" name="bank" value="{{$laporanpenjualan->bank}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Total Harga</label>
                            <input type="text" name="total_harga" value="{{$laporanpenjualan->total_harga}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <a href="{{route('laporanpenjualan.index')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection