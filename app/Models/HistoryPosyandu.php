<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoryPosyandu extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "history_posyandu";
    protected $fillable = [
        'id_balita', 
        'tgl_posyandu',
        'berat_badan_balita',
        'tinggi_badan'
    ];
    public $timestamps = true;

    public function balita(){
        return $this->belongsTo(Balita::class, 'id_balita', 'id');
    }

    public function user(){
        return $this->hasMany(User::class, 'id_history_posyandu', 'id');
    }
}
