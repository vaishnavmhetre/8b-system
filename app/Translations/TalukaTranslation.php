<?php

namespace App\Translations;

use Illuminate\Database\Eloquent\Model;

class TalukaTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];
}
