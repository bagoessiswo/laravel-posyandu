<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $table = "user_role";
    protected $fillable = [
        'id_user', 
        'id_role'
    ];
    public $timestamps = true;

    public function user(){
        return $this->belongsTo(User::class, 'id', 'id_user');
    }

    public function role(){
        return $this->belongsTo(Role::class, 'id', 'id_role');
    }
}
