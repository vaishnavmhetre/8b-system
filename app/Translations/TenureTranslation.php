<?php

namespace App\Translations;

use Illuminate\Database\Eloquent\Model;

class TenureTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];
}
