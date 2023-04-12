<?php

namespace App\Http\Controllers;

use App\Http\Requests\SatuanFormRequest;
use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SatuanController extends Controller
{
    public function store_satuan($idBarang,SatuanFormRequest $request)
    {
        $field = $request->validated();
        $field['id_barang'] = $idBarang;
        Satuan::create($field);
        $result = [
            'message'=> 'Success',
            'error'=> 'false',
        ];
        return response($result,Response::HTTP_ACCEPTED);
    }

    public function update_satuan($id,SatuanFormRequest $request)
    {
        $field = $request->validated();
        Satuan::find($id)->update($field);
        $result = [
            'message'=> 'Success',
            'error'=> 'false',
        ];
        return response($result,Response::HTTP_ACCEPTED);
    }
}
