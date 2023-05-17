<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class User extends Model implements Authenticatable
{
    use HasFactory;
    use HasApiTokens;
    use AuthenticatableTrait;

    protected $table = 'tb_usuario';
    protected $fillable = [
        'cd_usuario',
        'nm_usuario',
        'cd_email',
        'cd_senha',
        'ic_admin'
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'cd_usuario', 'cd_usuario');
    }
}
