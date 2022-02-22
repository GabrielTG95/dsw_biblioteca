<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory; /* Traits */

    protected $fillable = ['prestamo_id','isbn','usuario','ejemplar','fecha_prestamo','fecha_devolucion'];

    public $table = 'prestamos';

    //public $timestamps = false;
}
