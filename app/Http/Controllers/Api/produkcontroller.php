<?php

namespace App\Http\Controllers\Api;
use App\Models\produk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class produkcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = produk::orderBy('nama_produk', 'asc')->get();
        return response()->json([
            'status'=> true,
            'message'=>'Data Ditemukan',
            'data'  => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataproduk = new produk;


        $rules = [
            'nama_produk'   => 'required',
            'harga'         => 'required',
            'keterangan'    => 'required'
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return response()->json([
                'status'    => false,
                'message'   => 'gagal add data',
                'data'      => $validator->errors()
            ]);
        }

        $dataproduk->nama_produk = $request->nama_produk;
        $dataproduk->harga = $request->harga;
        $dataproduk->keterangan = $request->keterangan;

        $pos = $dataproduk->save();


        return response()->json([
            'status' => true,
            'message' => 'success tambah data'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = produk::find($id);
        if ($data){
            return response()->json([
                'status' => true,
                'message'   => 'Data ditemukan',
                'data'  => $data
            ], 200);
        }else {
            return response()->json([
                'status'  => false,
                'message' => 'data tidak ditemukan'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $dataproduk = produk::find($id);

            if (empty($dataproduk)) {
                return response()->json([
                    'status'    => false,
                    'message'   => 'data tidak ditemukan'
                ], 404);
            }

            $rules = [
                'nama_produk'   => 'required',
                'harga'         => 'required',
                'keterangan'    => 'required'
            ];


            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()){
                return response()->json([
                    'status'    => false,
                    'message'   => 'gagal update data',
                    'data'      => $validator->errors()
                ]);
            }

            $dataproduk->nama_produk = $request->nama_produk;
            $dataproduk->harga = $request->harga;
            $dataproduk->keterangan = $request->keterangan;

            $pos = $dataproduk->save();


            return response()->json([
                'status' => true,
                'message' => 'success update data'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $dataproduk = produk::find($id);

            if (empty($dataproduk)) {
                return response()->json([
                    'status'    => false,
                    'message'   => 'data tidak ditemukan'
                ], 404);
            }

            
            $pos = $dataproduk->delete();


            return response()->json([
                'status' => true,
                'message' => 'success delete data'
            ]);
    }
}
