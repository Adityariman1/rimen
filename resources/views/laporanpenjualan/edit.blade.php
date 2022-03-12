@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Edit Data buku</h1>
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
                <div class="card-body">
                    <form action="{{ route('buku.update', $buku->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Masukan Judul Buku</label>
                            <input type="text" name="judul_buku" value="{{$buku->judul_buku}}" class="form-control @error('judul_buku') is-invalid @enderror">
                            @error('judul_buku')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Harga Buku</label>
                            <input type="text" name="harga" value="{{$buku->harga}}" class="form-control @error('harga') is-invalid @enderror">
                            @error('harga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan gambar</label>
                            <br>
                            <img src="{{ $buku->image() }}" height="75" style="padding:10px;" />
                            <input type="file" name="cover" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Keterangan Buku</label>
                            <input type="text" name="keterangan" value="{{$buku->keterangan}}" class="form-control @error('keterangan') is-invalid @enderror">
                            @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Kategori</label>
                            <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror">
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
                            <label for="">Masukan Pengarang Buku</label>
                            <input type="text" name="pengarang_buku" value="{{$buku->pengarang_buku}}" class="form-control @error('pengarang_buku') is-invalid @enderror">
                            @error('pengarang_buku')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Stok Buku</label>
                            <input type="text" name="stok" value="{{$buku->stok}}" class="form-control @error('stok') is-invalid @enderror">
                            @error('stok')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Tahun Terbit</label>
                            <input type="text" name="tahun_terbit" value="{{$buku->tahun_terbit}}" class="form-control @error('tahun_terbit') is-invalid @enderror">
                            @error('tahun_terbit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <button type="submit" class="btn btn-default">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection