<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangFormRequest;
use App\Models\Barang;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BarangController extends Controller
{
    public function get_barang()
    {
        $data = Barang::paginate(10);
        return response($data,Response::HTTP_ACCEPTED);
    }

    public function store_barang(BarangFormRequest $request)
    {
        $field = $request->validate();
        $field['img_url'] = $request->file('image')->store('image');
        $data = Barang::create($field);
        return response($data,Response::HTTP_ACCEPTED);
    }

    public function edit_barang(BarangFormRequest $request)
    {
        return 'test';
    }
}
