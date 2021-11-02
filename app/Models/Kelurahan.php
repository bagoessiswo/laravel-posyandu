<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;
    protected $table = "kelurahan";
    protected $fillable = [
        'id_kecamatan', 
        'kelurahan'
    ];
    public $timestamps = true;

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id');
    }

    public function posyandu(){
        return $this->hasMany(Posyandu::class, 'id_kelurahan', 'id');
    }
}
