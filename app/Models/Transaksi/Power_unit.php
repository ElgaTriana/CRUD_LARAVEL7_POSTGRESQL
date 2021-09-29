<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Model;

class Power_unit extends Model
{
    protected $primaryKey = 'ID_POWER_UNIT';

    protected $table="POWER_UNIT";

    protected $fillable = ['POWER_UNIT_NUM', 'DESCRIPTION', 'ID_CORPORATION', 'ID_LOCATION', 'ID_POWER_UNIT_TYPE', 'IS_ACTIVE'];

    public $timestamps = false;

    function corporation(){
        return $this->belongsTo('App\Models\Master\Corporation','ID_CORPORATION', 'ID_CORPORATION');
    }

    function location(){
        return $this->belongsTo('App\Models\Master\Location','ID_LOCATION', 'ID_LOCATION');
    }

    function power_unit_type(){
        return $this->belongsTo('App\Models\Master\Power_unit_type','ID_POWER_UNIT_TYPE', 'ID_POWER_UNIT_TYPE');
    }
}
