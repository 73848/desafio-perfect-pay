<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $table = 'roles';
    // um funcao pode pertencer a mais de um usuario; Serve para buscar os usuarios de determinada funcao
    function users(){
        return $this->hasMany(Users::class, 'role_id');
    }
}
