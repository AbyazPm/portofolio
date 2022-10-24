@extends('admin.app')
@section('title', 'Master Project')
@section('blank', 'Master Project')
@section('content')
<div class="row">
  <div class="col-lg-4">
      <div class="card shadow mb-4">
          <div class="card-header py-3 border-bottom">
              <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
          </div>
           <div class="card-body text-center">
            <table class="table">
              <thead>
              <tr>
               <th scope="col">NISN</th>
               <th scope="col">Nama</th>
               <th scope="col">Action</th>
              </tr>
              <tbody>
              @foreach($data as $i => $item)
              <tr >
               <td>{{$item->nisn}}</td>
               <td>{{$item->nama}}</td>
               <td>
               <a onclick="show({{ $item->id }})" class="btn btn-info btn-circle btn-sm">
                <i class="fas fa-play"></i>
               </a>
                <a href="{{ route('masterproject.create') }}?siswa={{ $item->id }}" class="btn btn-success btn-circle btn-sm">
                  <i class="fas fa-plus"></i>
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
         <div class="col-lg-8">
          <div class="card shadow mb-4">
              <div class="card-header py-3 d-flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Project Siswa </h6>
              </div>
              <div id="project" class="card-body">
                Pilih siswa terlebih dahulu
              </div>
          </div>
         </div>          
</div>
<script>
  function show(id){
    $.get('masterproject/'+id, function(data){
      $('#project').html(data);
    })
  }
</script>
@endsection