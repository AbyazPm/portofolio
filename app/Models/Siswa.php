<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nisn',
        'nama',
        'alamat',
        'jk',
        'email',
        'foto',
        'about'
    ];
    protected $table = 'siswa';
    // public function kontak(){
        // return $this->belongsToMany('App\Models\JenisKontak')->withPivot('deskripsi');
        public function kontak(){
            return $this->hasMany('App\Models\Kontak' , 'siswa_id');
    }
    public function projek(){
        return $this->hasMany('App\Models\Projek' , 'siswa_id');
    }

}
