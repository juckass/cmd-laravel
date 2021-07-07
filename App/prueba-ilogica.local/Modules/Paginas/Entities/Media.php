<?php

namespace Modules\Paginas\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class media extends Model
{
    use SoftDeletes;

    protected $keyType = 'integer';
    protected $table = 'media';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'slug',
    ];
}
