<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Model;

class District extends Model implements TranslatableContract
{
    use GeneratesUuid, Translatable;

    public $translatedAttributes = ['name'];

    public $uuidVersion = 'ordered';

    protected $casts = [
        'uuid' => 'uuid'
    ];

    protected $hidden = [
        'id'
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function talukas()
    {
        return $this->hasMany(Taluka::class, 'district_id', 'id');
    }
}
