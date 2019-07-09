<?php

namespace App\Translations;

use Illuminate\Database\Eloquent\Model;

class DistrictTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];
}
