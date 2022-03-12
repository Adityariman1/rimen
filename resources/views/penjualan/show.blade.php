@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Show Transaksi</h1>
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
                <div class="card-header">Transaksi</div>
                <div class="card-body">
                    <div class="form-group">
                             <label for="">Masukan nama Rekening</label>
                             <input type="text" name="nama_rek" value="{{$penjualan->nama_rek}}" class="form-control"  readonly>
                     </div>
                     <div class="form-group">
                             <label for="">Masukan No Rekening</label>
                             <input type="text" name="no_rek" value="{{$penjualan->no_rek}}" class="form-control" readonly>
                     </div>
                     <div class="form-group">
                             <label for="">Masukan Total Buku</label>
                             <input type="text" name="total_buku" value="{{$penjualan->total_buku}}" class="form-control" readonly>
                     </div>
                     <div class="form-group">
                             <label for="">Masukan Bank</label>
                             <input type="text" name="bank" value="{{$penjualan->bank}}" class="form-control" readonly>
                     </div>
                     <div class="form-group">
                             <label for="">Masukan Total Harga</label>
                             <input type="text" name="total_harga" value="{{$penjualan->total_harga}}" class="form-control" readonly>
                     </div>
                    <div class="form-group">
                        <a href="{{route('penjualan.index')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
