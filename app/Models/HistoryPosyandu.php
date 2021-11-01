<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPosyandu extends Model
{
    use HasFactory;
    protected $table = "history_posyandu";
    protected $fillable = [
        'id_balita', 
        'tgl_posyandu',
        'berat_badan_balita',
        'tinggi_badan'
    ];
    public $timestamps = true;

    public function balita(){
        return $this->belongsTo(Balita::class, 'id', 'id_balita');
    }

    public function user(){
        return $this->hasMany(User::class, 'id_history_posyandu', 'id');
    }
}
