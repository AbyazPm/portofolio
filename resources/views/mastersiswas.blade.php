@extends('admin.app')
@section('title', 'Show Siswa')
@section('blank', 'Show Siswa')
@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 border-bottom">
                <h6 class="m-0 font-weight-bold text-primary">Data {{$data->nama}}</h6>
            </div>
             <div class="card-body text-center">
                <img src="{{ asset('/template/img/'.$data->foto) }}" width="200" class="rounded-circle img-thumbnail">
                <h4>{{$data->nisn}}</h4>
                <h4>{{$data->nama}}</h4>
                <h4>{{$data->alamat}}</h4>
                <h4>{{$data->jk}}</h4>
                <h4>{{$data->email}}</h4>
             </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-plus"></i> Kontak {{$data->nama}}</h6>
            </div>
            <div class="card-body text-center">
                <h5>
                @foreach($kontak as $item)
            <ul style="list-style: none;">
            <li><p>{{$item->jenis_kontak->jenis_kontak }} : {{$item->deskripsi}}</p></li> 
            </ul>
            @endforeach
                </h5>
            </div>
        </div>
          </div>
           <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-quote-left"></i> About {{$data->nama}}</h6>
                </div>
                <div class="blockquote text-center">
                    {{$data->about}}
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-file-code"></i> Project {{$data->nama}}</h6>
                </div>
                <div class="card-body">

                </div>
    </div>
</div>
@endsection