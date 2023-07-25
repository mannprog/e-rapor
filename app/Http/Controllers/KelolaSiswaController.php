<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\KelolaSiswaDataTable;
use App\Http\Requests\KelolaSiswaRequest;
use App\Models\DetailSiswa;

class KelolaSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KelolaSiswaDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.users.siswa.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KelolaSiswaRequest $request)
    {
        $dataId = request('item_id');

        try {
            DB::transaction(function () use ($dataId, $request) {
                $data = $request->validated();

                $datas = [
                    'name' => $data['name'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'password' => password_hash($data['password'], PASSWORD_DEFAULT),
                    'is_admin' => 1,
                ];

                request()->validate([
                    'foto' => 'sometimes|mimes:png,jpg,jpeg,svg|max:1048'
                ]);

                if (request()->hasFile('foto')) {
                    $foto = request()->file('foto');
                    $filename = $foto->getClientOriginalName();
                    $foto->move(public_path('assets/images/users'), $filename);
                    $datas['foto'] = $filename;
                }

                $user = User::updateOrCreate(['id' => $dataId], $datas);

                $userDetail = DetailSiswa::where('user_id', $user->id)->first();
                if (!$userDetail) {
                    $userDetail = new DetailSiswa();
                    $userDetail->user_id = $user->id;
                }

                $userDetail->nis = $data['nis'];
                $userDetail->nisn = $data['nisn'];
                $userDetail->tmp_lahir = $data['tmp_lahir'];
                $userDetail->tgl_lahir = $data['tgl_lahir'];
                $userDetail->jk = $data['jk'];
                $userDetail->no_hp = request('no_hp');
                $userDetail->thn_masuk = $data['thn_masuk'];
                $userDetail->agama = $data['agama'];
                $userDetail->save();
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data siswa berhasil disimpan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::with('detailSiswa')->find($id);

        return view('admin.pages.users.siswa.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::with('detailSiswa')->findOrFail($id);

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
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
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data siswa berhasil diubah',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = User::findOrFail($id);
            $data->delete();
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'message' => 'Siswa berhasil dihapus',
        ]);
    }
}
