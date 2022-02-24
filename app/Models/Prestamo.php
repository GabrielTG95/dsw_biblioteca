<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory; /* Traits */

    protected $fillable = ['id','libro_id','usuario','fecha_prestamo','fecha_devolucion'];

    public $table = 'prestamos';

    //public $timestamps = false;
}
