<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    protected $fillable = ['nome', 'email', 'password'];

    protected $table = 'usuarios';

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
