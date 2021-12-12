<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Balita extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "balita";
    protected $fillable = [
        'id_posyandu', 
        'nama_balita', 
        'nik_orang_tua',
        'nama_orang_tua',
        'tgl_lahir_balita',
        'jenis_kelamin_balita',
        'status'
    ];
    public $timestamps = true;

    public function posyandu(){
        return $this->belongsTo(Posyandu::class, 'id_posyandu', 'id');
    }

    public function history_posyandu(){
        return $this->hasMany(HistoryPosyandu::class, 'id_balita', 'id');
    }
}
