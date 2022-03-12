@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Show Kategori</h1>
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
                <div class="card-header">Kategori</div>
                <div class="card-body">
                    <div class="form-group">
                         <label for=""> Nama Kategori</label>
                         <input type="text" name="nama_kategori" value="{{$kategori->nama_kategori}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                         <label for=""> Keterangan</label>
                         <input type="text" name="keterangan" value="{{$kategori->keterangan}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{route('kategori.index')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
