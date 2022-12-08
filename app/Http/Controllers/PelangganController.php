<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PelangganController extends Controller
{
    public function create() {
        return view('pelanggan.add');
    }

    // FUNCTION STORE
    public function store(Request $request) {
        $request->validate([
        'id_pelanggan' => 'required',
        'nama_pelanggan' => 'required',
        'alamat_pelanggan' => 'required',
        'id_admin' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO pelanggan(id_pelanggan, nama_pelanggan, alamat_pelanggan, id_admin, pelanggan_status) VALUES (:id_pelanggan, :nama_pelanggan, :alamat_pelanggan, :id_admin, 1)',
        [
        'id_pelanggan' => $request->id_pelanggan,
        'nama_pelanggan' => $request->nama_pelanggan,
        'alamat_pelanggan' => $request->alamat_pelanggan,
        'id_admin' => $request->id_admin,
        ]
        );
        return redirect()->route('pelanggan.index') ->with('success', 'Data pelanggan berhasil disimpan');
    }

    // FUNCTION INDEX
    public function index() {
        $datas = DB::select('select * from pelanggan where pelanggan_status = 1');
        return view('pelanggan.index')->with('datas', $datas);
    }

    // FUNCTION CARI
    public function cari (Request $request) {
        $cari = $request->cari;
        $datas = DB::select('select * from pelanggan where pelanggan_status = 1');
        return view('pelanggan.index')->with('datas', $datas);
    }

    // FUNCTION EDIT    
    public function edit($id) {
        $data = DB::table('pelanggan')->where('id_pelanggan', $id)->first();
        return view('pelanggan.edit')->with('data', $data);
    }

    //FUNCTION UPDATE
    public function update($id, Request $request) {
        $request->validate([
        'id_pelanggan' => 'required',
        'nama_pelanggan' => 'required',
        'alamat_pelanggan' => 'required',
        'id_admin' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE pelanggan SET id_pelanggan = :id_pelanggan, nama_pelanggan = :nama_pelanggan, alamat_pelanggan = :alamat_pelanggan, id_admin = :id_admin WHERE
        id_pelanggan = :id',
        [
        'id' => $id,
        'id_pelanggan' => $request->id_pelanggan,
        'nama_pelanggan' => $request->nama_pelanggan,
        'alamat_pelanggan' => $request->alamat_pelanggan,
        'id_admin' => $request->id_admin,
        ]
        );
        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diubah');
    }

    // FUNCTION DELETE
    public function delete($id) {
        DB::delete('DELETE FROM pelanggan WHERE id_pelanggan = :id_pelanggan', ['id_pelanggan' => $id]);
        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil dihapus');    
    }

    // FUNCTION SOFT DELETE
    public function softdelete($id) {
        DB::update('UPDATE pelanggan SET pelanggan_status = 0 WHERE id_pelanggan = :id_pelanggan', ['id_pelanggan' => $id]);
        return redirect()->route('pelanggan.index')->with('success', 'Data Pelanggan berhasil dihapus (soft)');    
    }

}
