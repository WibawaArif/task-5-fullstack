<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Data;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Data::all();

        if($data){
            return ApiFormatter::createAPI(200, 'Berhasil', $data);
        } else{
            return ApiFormatter::createAPI(400, 'Gagal');
        }
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
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Data::where('id', '=', $id)->get();
        if($data){
            return ApiFormatter::createAPI(200, 'Berhasil', $data);
        } else{
            return ApiFormatter::createAPI(400, 'Gagal');
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
        try {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $data = Data::findOrFail($id);

        $data->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
    
        $data_id = Data::where('id', '=', $data->id)->get();
        if($data){
            return ApiFormatter::createAPI(200, 'Berhasil', $data_id);
        } else{
            return ApiFormatter::createAPI(400, 'Gagal');
        }
    } catch (Exception $error) {
        return ApiFormatter::createAPI(400, 'Gagal');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $data = Data::findOrFail($id);

            $data_id = $data->delete();
            if($data_id){
                return ApiFormatter::createAPI(200, 'Berhasil Menghapus Data');
            } else{
                return ApiFormatter::createAPI(400, 'Gagal Menghapus Data');
            }
        } catch (Exception $error){
            return ApiFormatter::createAPI(400, 'Gagal Menghapus Data');
        }

        
    }
}
