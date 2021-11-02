<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posyandu extends Model
{
    use HasFactory;
    protected $table = "posyandu";
    protected $fillable = [
        'id_kelurahan', 
        'nama_posyandu', 
        'alamat_posyandu'
    ];
    public $timestamps = true;

    public function kelurahan(){
        return $this->belongsTo(Kelurahan::class, 'id_kelurahan', 'id');
    }

    public function balita(){
        return $this->hasMany(Balita::class, 'id_posyandu', 'id');
    }
}
