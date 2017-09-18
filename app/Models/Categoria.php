<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    protected $fillable = ['nome'];

    protected $table = 'categorias';

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
