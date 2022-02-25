<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory; /* Traits */

    protected $fillable = ['id','definicion'];

    public $table = 'categorias';
}
