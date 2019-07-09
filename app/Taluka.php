<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Model;

class Taluka extends Model implements TranslatableContract
{
    use GeneratesUuid, Translatable;
    public $translatedAttributes = ['name'];
    public $uuidVersion = 'ordered';

    protected $casts = [
        'uuid' => 'uuid'
    ];

    protected $hidden = [
        'id', 'district_id'
    ];

    protected $appends = [
        'district_uuid'
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function getDistrictUuidAttribute()
    {
        return $this->district()->exists() ? $this->district()->pluck('uuid')->first() : null;
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'taluka_id', 'id');
    }
}
