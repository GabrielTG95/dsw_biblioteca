<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory; /* Traits */

    protected $fillable = ['usuario_id','nombre','email','rol'];

    public $table = 'usuarios';

    //public $timestamps = false;
}
