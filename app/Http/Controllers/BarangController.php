<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangFormRequest;
use App\Models\Barang;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function get_barang()
    {
        $data = Barang::with('satuan')->paginate(10);
        return response($data, Response::HTTP_OK);
    }

    public function store_barang(BarangFormRequest $request)
    {
        $field = $request->validated();
        $field['img_url'] = asset($request->file('image')->store('image'));
        $data = Barang::create($field);
        $result = [
            'message' => 'Success',
            'error' => 'False'
        ];
        return response($result, Response::HTTP_ACCEPTED);
    }

    public function update_barang(BarangFormRequest $request,$id)
    {
        $field = $request->validated();
        $findImage = Barang::where('id',$id)->first()->img_url;
        $findImage = substr($findImage,19);
        Storage::delete($findImage);
        $field['img_url'] = asset($request->file('image')->store('image'));
        Barang::find($id)->update($field);
        $result = [
            'message' => 'Success',
            'error' => 'False'
        ];
        return response($result, Response::HTTP_ACCEPTED);
    }
}
