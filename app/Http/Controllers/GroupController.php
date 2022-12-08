<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GroupController extends Controller
{
    public function gabung () {
        $datah = DB::select('select a.id_admin, b.nama_pelanggan, b.alamat_pelanggan, c.nama_ikan
        from admin a INNER JOIN pelanggan b 
        on a.id_admin = b.id_admin 
        INNER JOIN ikan c 
        on b.id_admin = c.id_admin where admin_status = 1');
        return view('gabung.index') -> with('datah',$datah);
    }
}
