<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Rombel;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function indexAdmin()
    {
        $siswa = User::where('is_admin', 0)->count();
        $gtk = User::where('is_admin', 1)->count();
        $rombel = Rombel::all()->count();
        $jurusan = Jurusan::all()->count();

        return view('admin.dashboard', compact(['siswa', 'gtk', 'rombel', 'jurusan']));
    }

    public function indexSiswa()
    {
        $siswa = User::where('is_admin', 0)->count();
        $gtk = User::where('is_admin', 1)->count();
        $rombel = Rombel::all()->count();
        $jurusan = Jurusan::all()->count();

        return view('siswa.dashboard', compact(['siswa', 'gtk', 'rombel', 'jurusan']));
    }
}
