<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Model;

class Tenure extends Model implements TranslatableContract
{
    use GeneratesUuid, Translatable;

    public $uuidVersion = 'ordered';
    public $translatedAttributes = ['name'];

    protected $casts = [
        'uuid' => 'uuid'
    ];

    public function aathBs()
    {
        return $this->hasMany(AathB::class, 'tenure_id', 'id');
    }
}
