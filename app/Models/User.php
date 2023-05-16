<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

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
