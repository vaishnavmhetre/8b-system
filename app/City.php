<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Model;

class City extends Model implements TranslatableContract
{
    use GeneratesUuid, Translatable;

    public $uuidVersion = 'ordered';
    public $translatedAttributes = ['name'];
    protected $casts = [
        'uuid' => 'uuid'
    ];
    protected $hidden = [
        'id', 'taluka_id', 'talathi_id'
    ];
    protected $appends = [
        'taluka_uuid', 'talathi_uuid'
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function aathBs()
    {
        return $this->hasMany(AathB::class, 'city_id', 'id')->orderByDesc('created_at');
    }

    public function getTalukaUuidAttribute()
    {
        return $this->taluka()->exists() ? $this->taluka()->pluck('uuid')->first() : null;
    }

    public function taluka()
    {
        return $this->belongsTo(Taluka::class, 'taluka_id', 'id');
    }

    public function getTalathiUuidAttribute()
    {
        return $this->talathi()->exists() ? $this->talathi()->pluck('uuid')->first() : null;
    }

    public function talathi()
    {
        return $this->belongsTo(User::class, 'talathi_id', 'id');
    }
}
