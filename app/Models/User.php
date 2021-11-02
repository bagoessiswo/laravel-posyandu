<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = "user";
    protected $fillable = [
        'id_history_posyandu', 
        'username', 
        'password'
    ];
    public $timestamps = true;

    public function history_posyandu(){
        return $this->belongsTo(HistoryPosyandu::class, 'id', 'id_history_posyandu');
    }

    public function user_role(){
        return $this->hasMany(UserRole::class, 'id_user', 'id');
    }

    public function role()
    {
        return $this->belongsToMany(Role::class, 'user_role', 'id_user', 'id_role');
    }
}
