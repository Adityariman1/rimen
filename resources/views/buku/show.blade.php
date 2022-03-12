@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Show Buku</h1>
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
                <div class="card-header">Buku</div>
                <div class="card-body">
                <form action="{{ route('buku.update', $buku->id) }}" method="post">
                @csrf
                @method('put')
                    <div class="form-group">
                         <label for=""> Judul Buku</label>
                         <input type="text" name="judul_buku" value="{{$buku->judul_buku}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                         <label for=""> Harga Buku</label>
                         <input type="text" name="harga" value="{{$buku->harga}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                            <label for="">Cover Buku</label>
                            <br>
                            <img src="{{ $buku->image() }}" height="200" style="padding:5px;" />
                    </div>
                    <div class="form-group">
                         <label for="">Keterangan Buku</label>
                         <input type="text" name="keterangan" value="{{$buku->keterangan}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                            <label for="">Kategori Buku</label>
                            <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror" disabled>
                                @foreach($kategori as $data)
                                    <option value="{{$data->id}}">{{$data->nama_kategori}}</option>
                                @endforeach
                            </select>
                            @error('id_kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                         <label for="">Pengarang Buku</label>
                         <input type="text" name="pengarang_buku" value="{{$buku->pengarang_buku}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                         <label for="">Stok Buku</label>
                         <input type="text" name="stok" value="{{$buku->stok}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                         <label for="">Tahun Terbit Buku</label>
                         <input type="text" name="tahun_terbit" value="{{$buku->tahun_terbit}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{route('buku.index')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
