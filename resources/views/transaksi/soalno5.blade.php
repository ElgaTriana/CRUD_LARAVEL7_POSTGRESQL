@extends('layouts.app')
 
@section('content')
<p>
    select pu."POWER_UNIT_NUM" , pu."DESCRIPTION" , c."CORPORATION_NAME"  as "ID_CORPORATION" ,
    l."LOCATION_NAME" as "ID_LOCATION" , put."POWER_UNIT_TYPE_XID" as "ID_POWER_UNIT_TYPE" 
    from "POWER_UNIT" pu
    left join "CORPORATION" c ON c."ID_CORPORATION" =pu."ID_CORPORATION" 
    left join "LOCATION" l ON l."ID_LOCATION" =pu."ID_LOCATION" 
    left join "POWER_UNIT_TYPE" put ON put."ID_POWER_UNIT_TYPE" =pu."ID_POWER_UNIT_TYPE" 
    where pu."DESCRIPTION" like '%HINO WINGBOX/FM 260 JD%'
    limit 3
</p>
@endsection