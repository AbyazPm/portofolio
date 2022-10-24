@extends('admin.app')
@section('title', 'Master Siswa')
@section('blank', 'Master Siswa')
@section('content')
{{-- <a class="btn btn-success" href="{{ route ('mastersiswa.create')}}">Tambah Data</a> --}}
    <div class="row">
        <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <a class="btn btn-success" href="{{ route ('mastersiswa.create')}}">Tambah Data</a>
                {{-- <h6 class="m-0 font-weight-bold text-primary">Master Siswa</h6> --}}
                <div class="card-body">
                 <table class="table">
                    <thead>
                    <tr>
                     <th scope="col">No</th>
                     <th scope="col">Nama</th>
                     <th scope="col">Jenis Kelamin</th>
                     <th scope="col">Email</th>
                     <th scope="col">Action</th>
                    </tr>
                    <tbody>
                    @foreach($data as $i => $item)
                    <tr>
                     <th scope="row">{{ ++$i }}</th>
                     <td>{{$item->nama}}</td>
                     <td>{{$item->jk}}</td>
                     <td>{{$item->email}}</td>
                     <td>
                     <a href="{{ route('mastersiswa.show', $item->id) }}" class="btn btn-info btn-circle btn-sm">
                        <i class="fas fa-info-circle"></i>
                     </a>
                      <a href="{{ route('mastersiswa.edit', $item->id) }}" class="btn btn-warning btn-circle btn-sm">
                        <i class="fas fa-edit"></i>
                     </a>
                      <a href="{{ route('mastersiswa.hapus', $item->id) }}" class="btn btn-danger btn-circle btn-sm">
                        <i class="fas fa-trash"></i>
                      </a>
                     </td>
                     </tr>
                     @endforeach
                    </tbody>
                    </thead>
                 </table>
                 </div>

                </div>
            </div>    
        </div>    
    </div>  
@endsection