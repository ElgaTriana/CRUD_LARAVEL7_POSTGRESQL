<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi\Power_unit;
use App\Models\Master\Corporation;
use App\Models\Master\Location;
use App\Models\Master\Power_unit_type;


class PowerunitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){

            $var=Power_unit::with('corporation', 'location', 'power_unit_type');
            
            return \DataTables::of($var)
            ->addColumn('action',function($query){
                $html='<div class="btn-group" data-toggle="buttons">';
                $html.='<a href="javascript:void(0)" class="btn btn-warning edit" kode="'.$query->ID_POWER_UNIT.'" title="Edit"><i class="fa fa-pencil"></i></a>';
                $html.='<a href="javascript:void(0)" class="btn btn-danger hapus" kode="'.$query->ID_POWER_UNIT.'" title="Delete"><i class="fa fa-trash"></i></a>';
                $html.='</div>';

                return $html;
            })
            ->rawColumns(['action'])
            ->make(true);                                  
        }

        $corporation=Corporation::all();
        $location=Location::all();
        $power_unit_type=Power_unit_type::all();

        return view('transaksi.powerunit')
        ->with('corporation', $corporation)
        ->with('location', $location)
        ->with('power_unit_type', $power_unit_type);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
            $rules=[
                'number'=>'required', 
                'id_corporation'=>'required', 
                'id_location'=>'required', 
                'type_power_unit'=>'required', 
            ];

            $validasi=\Validator::make($request->all(),$rules);

            if($validasi->fails()){
                $data=array(
                    'success'=>false,
                    'pesan'=>'Validasi error',
                    'error'=>$validasi->errors()->all()
                );
            }else{      
                $var=new Power_unit;
                $var->POWER_UNIT_NUM=$request->input('number');
                $var->DESCRIPTION=$request->input('description');
                $var->ID_CORPORATION=$request->input('id_corporation');
                $var->ID_LOCATION=$request->input('id_location');
                $var->ID_POWER_UNIT_TYPE=$request->input('type_power_unit');
                $var->IS_ACTIVE=$request->input('is_active');
                $var->INSERT_USER=1;
                $var->INSERT_DATE=date('Y-m-d');
                $var->UPDATE_USER=2;
                $var->UPDATE_DATE=date('Y-m-d');
                $var->save();

                $data=array(
                    'success'=>true,
                    'pesan'=>'Data berhasil disimpan',
                    'error'=>''
                );
            }

            return $data;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if($request->ajax()){
            $var=Power_unit::with('corporation', 'location', 'power_unit_type')->findOrfail($id);
            
            return $var;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->ajax()){
            $rules=[
                'number_edit'=>'required', 
                'id_corporation_edit'=>'required', 
                'id_location_edit'=>'required', 
                'type_power_unit_edit'=>'required', 
            ];

            $validasi=\Validator::make($request->all(),$rules);

            if($validasi->fails()){
                $data=array(
                    'success'=>false,
                    'pesan'=>'Validasi error',
                    'error'=>$validasi->errors()->all()
                );
            }else{      
                $var= Power_unit::findOrFail($id);
                $var->POWER_UNIT_NUM=$request->input('number');
                $var->DESCRIPTION=$request->input('description');
                $var->ID_CORPORATION=$request->input('id_corporation');
                $var->ID_LOCATION=$request->input('id_location');
                $var->ID_POWER_UNIT_TYPE=$request->input('type_power_unit');
                $var->IS_ACTIVE=$request->input('is_active');
                $var->INSERT_USER=1;
                $var->INSERT_DATE=date('Y-m-d');
                $var->UPDATE_USER=2;
                $var->UPDATE_DATE=date('Y-m-d');
                $var->save();

                $data=array(
                    'success'=>true,
                    'pesan'=>'Data berhasil disimpan',
                    'error'=>''
                );
            }

            return $data;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            
            $var=Power_unit::findOrFail($id)->delete();
            
            if($var){
                $data=array(
                    'success'=>true,
                    'pesan'=>'Data berhasil dihapus',
                    'error'=>''
                );
            }else{
                $data=array(
                    'success'=>false,
                    'pesan'=>'Data gagal dihapus',
                    'error'=>''
                );
            }

            return $data;
        }
    }

    public function soalno7(Request $request)
    {
        return view('transaksi.soalno7');
    }

    public function soalno5(Request $request)
    {
        return view('transaksi.soalno5');
    }

    public function soalno2(Request $request)
    {
        $locations=Location::all();
        return view('transaksi.soalno2')
        ->with('locations', $locations);
    }
}
