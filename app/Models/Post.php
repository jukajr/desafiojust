<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['categoria_id', 'titulo', 'imagem', 'texto', 'slug'];

    protected $table = 'posts';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getCreatedAtAttribute($created_at)
    {
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');

        return Carbon::CreateFromFormat('Y-m-d H:i:s', $created_at)->formatLocalized('%d de %B de %Y');
    }
}
