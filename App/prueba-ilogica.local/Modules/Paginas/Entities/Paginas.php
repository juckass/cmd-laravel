<?php

namespace Modules\Paginas\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class paginas extends Model
{   
    use SoftDeletes;

    protected $keyType = 'integer';
    protected $table = 'paginas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'titulo',
        'slug',
        'head',
        'body',
        'footer'
    ];
    

}
