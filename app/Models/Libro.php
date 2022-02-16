<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    use HasFactory; /* Traits */

    protected $fillable = ['isbn','titulo','autor','categoria','editorial','edicion','fecha_creacion'];

    public $table = 'libros';

    //public $timestamps = false;
}
