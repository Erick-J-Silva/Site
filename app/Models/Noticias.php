<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    use HasFactory;

    protected $fillable = [
        'noticia',
        'img',
        'usuario_id',
        'categoria_id'
    ];
}
