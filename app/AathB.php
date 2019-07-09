<?php

namespace App;

use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Model;

class AathB extends Model
{
    use GeneratesUuid;

    public $uuidVersion = 'ordered';

    protected $casts = [
        'uuid' => 'uuid'
    ];

    protected $appends = [
        'city_uuid', 'tenure_uuid'
    ];

    protected $hidden = [
        'id', 'city_id', 'tenure_id'
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function getCityUuidAttribute()
    {
        return $this->city()->exists() ? $this->city()->pluck('uuid')->first() : null;
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function getTenureUuidAttribute()
    {
        return $this->tenure()->exists() ? $this->tenure()->pluck('uuid')->first() : null;
    }

    public function tenure()
    {
        return $this->belongsTo(Tenure::class, 'tenure_id', 'id');
    }
}
