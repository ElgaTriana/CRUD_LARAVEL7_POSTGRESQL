<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

    protected $table="LOCATION";

    protected $fillable = ['LOCATION_NAME', 'CITY', 'PROVINCE', 'LATITUDE', 'LONGITUDE'];
}
