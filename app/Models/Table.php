<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table = 'tb_mesa';
    protected $fillable = [
        'ds_mesa',
        'im_mesa',
        'qt_assentos'
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'cd_mesa', 'cd_mesa');
    }
}
