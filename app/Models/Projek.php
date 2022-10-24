<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projek extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'nama_projek',
        'deskripsi',
        'tanggal',
        'foto'
    ];
    protected $table = 'projek';
    public function siswa(){
        return $this->belongsto('app\models\Siswa' , 'siswa_id');
    }
}
