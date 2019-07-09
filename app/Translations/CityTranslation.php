<?php

namespace App\Translations;

use Illuminate\Database\Eloquent\Model;

class CityTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];
}
