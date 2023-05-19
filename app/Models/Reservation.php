<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tb_reserva';
    protected $fillable = [
        'dt_reserva',
        'hr_reserva',
        'cd_usuario',
        'cd_mesa'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'cd_usuario', 'cd_usuario');
    }

    public function table()
    {
        return $this->belongsTo(Table::class, 'cd_mesa', 'cd_mesa');
    }
}
