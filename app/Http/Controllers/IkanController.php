<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class IkanController extends Controller
{
    public function create() {
        return view('ikan.add');
    }

    // FUNCTION STORE
    public function store(Request $request) {
        $request->validate([
        'id_ikan' => 'required',
        'nama_ikan' => 'required',
        'harga_ikan' => 'required',
        'stok_ikan' => 'required',
        'id_admin' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO ikan(id_ikan, nama_ikan, harga_ikan, stok_ikan, id_admin, ikan_status) VALUES (:id_ikan, :nama_ikan, :harga_ikan, :stok_ikan, :id_admin, 1)',
        [
        'id_ikan' => $request->id_ikan,
        'nama_ikan' => $request->nama_ikan,
        'harga_ikan' => $request->harga_ikan,
        'stok_ikan' => $request->stok_ikan,
        'id_admin' => $request->id_admin,
        ]
        );
        return redirect()->route('ikan.index') ->with('success', 'Data ikan berhasil disimpan');
    }

    // FUNCTION INDEX
    public function index() {
        $datas = DB::select('select * from ikan where ikan_status = 1');
        return view('ikan.index')->with('datas', $datas);
    }
    
    // FUNCTION EDIT    
    public function edit($id) {
        $data = DB::table('ikan')->where('id_ikan', $id)->first();
        return view('ikan.edit')->with('data', $data);
    }

    //FUNCTION UPDATE
    public function update($id, Request $request) {
        $request->validate([
        'id_ikan' => 'required',
        'nama_ikan' => 'required',
        'harga_ikan' => 'required',
        'stok_ikan' => 'required',
        'id_admin' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE ikan SET id_ikan = :id_ikan, nama_ikan = :nama_ikan, harga_ikan = :harga_ikan, stok_ikan = :stok_ikan, id_admin = :id_admin WHERE
        id_ikan = :id',
        [
        'id' => $id,
        'id_ikan' => $request->id_ikan,
        'nama_ikan' => $request->nama_ikan,
        'harga_ikan' => $request->harga_ikan,
        'stok_ikan' => $request->stok_ikan,
        'id_admin' => $request->id_admin,
        ]
        );
        return redirect()->route('ikan.index')->with('success', 'Data ikan berhasil diubah');
    }

    // FUNCTION DELETE
    public function delete($id) {
        DB::delete('DELETE FROM ikan WHERE id_ikan = :id_ikan', ['id_ikan' => $id]);
        return redirect()->route('ikan.index')->with('success', 'Data ikan berhasil dihapus');    
    }

    public function softdelete($id) {
        DB::update('UPDATE ikan SET ikan_status = 0 WHERE id_ikan = :id_ikan', ['id_ikan' => $id]);
        return redirect()->route('ikan.index')->with('success', 'Data Ikan berhasil dihapus (soft)');    
    }

}
