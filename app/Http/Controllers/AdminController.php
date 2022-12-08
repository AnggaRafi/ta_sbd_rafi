<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
        public function create() {
            return view('admin.add');
        }

        // FUNCTION STORE
        public function store(Request $request) {
            $request->validate([
            'id_admin' => 'required',
            'nama_admin' => 'required',
            'username' => 'required',
            'password' => 'required',
            ]);
            // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
            DB::insert('INSERT INTO admin(id_admin, nama_admin, username, password, admin_status) VALUES (:id_admin, :nama_admin, :username, :password, 1)',
            [
            'id_admin' => $request->id_admin,
            'nama_admin' => $request->nama_admin,
            'username' => $request->username,
            'password' => $request->password,
            ]
            );
            return redirect()->route('admin.index') ->with('success', 'Data Admin berhasil disimpan');
        }

        // FUNCTION INDEX
        public function index() {
            $datas = DB::select('select * from admin where admin_status = 1');
            return view('admin.index')->with('datas', $datas);
        }

        // FUNCTION SEARCH
        public function search(Request $request) {
            if($request -> has('search')) {
                $datas = DB::table('admin')->where('nama_admin', 'LIKE', '%' . $request->search . '%')->orWhere('username', 'LIKE', '%' .$request->search . '%')->get();
            }
            else {
                $datas = DB::select('select * from admin where admin_status = 1');
            }
            return view('admin.index')->with('datas', $datas);
        }

        // FUNCTION EDIT    
        public function edit($id) {
            $data = DB::table('admin')->where('id_admin', $id)->first();
            return view('admin.edit')->with('data', $data);
        }

        //FUNCTION UPDATE
        public function update($id, Request $request) {
            $request->validate([
            'id_admin' => 'required',
            'nama_admin' => 'required',
            'username' => 'required',
            'password' => 'required',
            ]);
            // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
            DB::update('UPDATE admin SET id_admin = :id_admin, nama_admin = :nama_admin, username = :username, password = :password WHERE
            id_admin = :id',
            [
            'id' => $id,
            'id_admin' => $request->id_admin,
            'nama_admin' => $request->nama_admin,
            'username' => $request->username,
            'password' => $request->password,
            ]
            );
            return redirect()->route('admin.index')->with('success', 'Data Admin berhasil diubah');
        }

        // FUNCTION DELETE
        public function delete($id) {
            DB::delete('DELETE FROM admin WHERE id_admin = :id_admin', ['id_admin' => $id]);
            return redirect()->route('admin.index')->with('success', 'Data Admin berhasil dihapus');    
        }

        // FUNCTION SOFT DELETE
        public function softdelete($id) {
            DB::update('UPDATE admin SET admin_status = 0 WHERE id_admin = :id_admin', ['id_admin' => $id]);
            return redirect()->route('admin.index')->with('success', 'Data Admin berhasil dihapus (soft)');    
        }
}
