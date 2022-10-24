@extends('admin.app')
@section('title', 'Create Siswa')
@section('blank', 'Create Siswa')
@section('content')
   <div class="row">
        <div class="col-lg-12">
        <div class="card shadow mb-4">
        <div class="card-header py-3">
                {{-- <h6 class="m-0 font-weight-bold text-primary">Master Siswa</h6> --}}
                <div class="card-body">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                           <ul>
                            @foreach($errors->all() as $error)
                              <li>{{ $error }}</li>  
                            @endforeach
                            </ul>     
                        </div>
                    @endif
                    <form method="POST" enctype="multipart/form-data" action="{{ route('mastersiswa.store')}}">
                      @csrf  
                    <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control" id="nisn" name='nisn' value="{{ old('nisn') }}">
                    </div>
                    <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name='nama' value="{{ old('nama') }}">
                    </div>
                    <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name='alamat' value="{{ old('alamat') }}">
                    </div>
                    <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <select class="form-select form-control" id="jk" name="jk" value="{{ old('jk') }}">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                    </select>
                    <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name='email' value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                    <label for="foto">Foto Siswa</label>
                    <input type="file" class="form-control-file" id="foto" name='foto' value="{{ old('foto') }}">
                    </div>
                    <div class="form-group">
                    <label for="about">About</label>
                    <textarea type="text" class="form-control" id="about" name='about' value="{{ old('about') }}"></textarea>
                    </div>
                    <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                    <a class="btn btn-danger" href="{{ route('mastersiswa.index')}}">Batal</a>
                    </div>
                    </form>
                 </div>
                </div>  
             </div>   
        </div>    
    </div>
@endsection