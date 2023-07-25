<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DetailGtk;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\KelolaGtkDataTable;
use App\Http\Requests\KelolaGtkRequest;

class KelolaGtkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KelolaGtkDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.users.gtk.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KelolaGtkRequest $request)
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
                    'is_admin' => 0,
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

                $userDetail = DetailGtk::where('user_id', $user->id)->first();
                if (!$userDetail) {
                    $userDetail = new DetailGtk();
                    $userDetail->user_id = $user->id;
                }

                $userDetail->nip = $data['nip'];
                $userDetail->jk = $data['jk'];
                $userDetail->jabatan = $data['jabatan'];
                $userDetail->no_hp = request('no_hp');
                $userDetail->save();
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data user berhasil disimpan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::with('detailGtk')->find($id);

        return view('admin.pages.users.gtk.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::with('detailGtk')->findOrFail($id);

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
                    'nip' => 'required|max:18',
                    'jabatan' => 'required',
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
                $userDetail->jabatan = request('jabatan');
                $userDetail->no_hp = request('no_hp');
                $userDetail->save();
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data user berhasil diubah',
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
            'message' => 'User berhasil dihapus',
        ]);
    }
}
