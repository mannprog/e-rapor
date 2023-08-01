<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rombel;
use App\Models\Jurusan;
use App\Models\DetailGtk;
use App\Models\DetailSiswa;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function indexAdmin()
    {
        $siswa = User::where('is_admin', 1)->count();
        $gtk = User::where('is_admin', 0)->count();
        $rombel = Rombel::all()->count();
        $jurusan = Jurusan::all()->count();

        return view('admin.dashboard', compact(['siswa', 'gtk', 'rombel', 'jurusan']));
    }

    public function indexSiswa()
    {
        $siswa = User::where('is_admin', 1)->count();
        $gtk = User::where('is_admin', 0)->count();
        $rombel = Rombel::all()->count();
        $jurusan = Jurusan::all()->count();

        return view('siswa.dashboard', compact(['siswa', 'gtk', 'rombel', 'jurusan']));
    }

    public function profilAdmin($id)
    {
        $data = User::with('detailGtk')->find($id);

        return view('admin.pages.profil.index', compact('data'));
    }

    public function updateAdmin()
    {
        $item_id = request('item_id');

        try {
            DB::transaction(function () use ($item_id) {
                request()->validate([
                    'name' => 'required|string',
                    'username' => 'required|string',
                    'email' => 'required|email',
                    'nip' => 'required|max:18',
                    'jk' => 'required',
                    'foto' => 'sometimes|mimes:png,jpg,jpeg,svg|max:1048'
                ]);

                $user = User::findOrFail($item_id);
                $user->name = request('name');
                $user->email = request('email');
                $user->username = request('username');
                if (request()->hasFile('foto')) {
                    $foto = request()->file('foto');
                    $filename = $foto->getClientOriginalName();
                    $foto->move(public_path('assets/images/users'), $filename);
                    $user->foto = $filename;
                }
                $user->save();

                $userDetail = DetailGtk::where('user_id', $user->id)->first();
                if (!$userDetail) {
                    $userDetail = new DetailGtk();
                    $userDetail->user_id = $user->id;
                }

                $userDetail->nip = request('nip');
                $userDetail->jk = request('jk');
                $userDetail->no_hp = request('no_hp');
                $userDetail->save();
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Profil berhasil diubah');
    }

    public function profilSiswa($id)
    {
        $data = User::with('detailSiswa')->find($id);

        return view('siswa.pages.profil.index', compact('data'));
    }

    public function updateSiswa()
    {
        $item_id = request('item_id');

        try {
            DB::transaction(function () use ($item_id) {
                request()->validate([
                    'name' => 'required|string',
                    'username' => 'required|string',
                    'email' => 'required|email',
                    'nis' => 'required|max:18',
                    'nisn' => 'required|max:8',
                    'tmp_lahir' => 'required',
                    'tgl_lahir' => 'required',
                    'jk' => 'required',
                    'thn_masuk' => 'required',
                    'agama' => 'required',
                    'foto' => 'sometimes|mimes:png,jpg,jpeg,svg|max:1048'
                ]);

                $user = User::findOrFail($item_id);
                $user->name = request('name');
                $user->email = request('email');
                $user->username = request('username');
                if (request()->hasFile('foto')) {
                    $foto = request()->file('foto');
                    $filename = $foto->getClientOriginalName();
                    $foto->move(public_path('assets/images/users'), $filename);
                    $user->foto = $filename;
                }
                $user->save();

                $userDetail = DetailSiswa::where('user_id', $user->id)->first();
                if (!$userDetail) {
                    $userDetail = new DetailSiswa();
                    $userDetail->user_id = $user->id;
                }

                $userDetail->nis = request('nis');
                $userDetail->nisn = request('nisn');
                $userDetail->tmp_lahir = request('tmp_lahir');
                $userDetail->tgl_lahir = request('tgl_lahir');
                $userDetail->jk = request('jk');
                $userDetail->thn_masuk = request('thn_masuk');
                $userDetail->agama = request('agama');
                $userDetail->no_hp = request('no_hp');
                $userDetail->save();
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Profil berhasil diubah');
    }
}
