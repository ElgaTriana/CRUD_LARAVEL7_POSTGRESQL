<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Power_unit_type extends Model
{
    protected $table="POWER_UNIT_TYPE";

    protected $fillable = ['POWER_UNIT_TYPE_XID', 'DESCRIPTION'];
}
