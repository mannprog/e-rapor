<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Rombel;
use App\Models\DetailGtk;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\KelolaMapelDataTable;
use App\Http\Requests\KelolaMapelRequest;
use App\Models\Mapel;

class KelolaMapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KelolaMapelDataTable $dataTable)
    {
        $kelas = Kelas::all();
        $rombel = Rombel::all();
        $gtk = User::where('is_admin', 0)->get();
        $tajaran = TahunAjaran::all();
        
        return $dataTable->render('admin.pages.sistem.mapel.index', compact(['kelas', 'rombel', 'gtk', 'tajaran']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KelolaMapelRequest $request)
    {
        $dataId = request('item_id');

        try {
            DB::transaction(function () use ($dataId, $request) {
                $data = $request->validated();

                $datas = [
                    'nama' => $data['nama'],
                    'rombel_id' => $data['rombel_id'],
                    'guru_id' => $data['guru_id'],
                ];
                
                Mapel::updateOrCreate(['id' => $dataId], $datas);
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data Mata Pelajaran berhasil disimpan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Mapel::findOrFail($id);

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
                    'nama' => 'required|max:255',
                    'kelas_id' => 'required',
                    'rombel_id' => 'required',
                    'guru_id' => 'required',
                ]);

                $user = Mapel::findOrFail($item_id);
                $user->nama = request('nama');
                $user->kelas_id = request('kelas_id');
                $user->rombel_id = request('rombel_id');
                $user->guru_id = request('guru_id');
                $user->save();
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data Mata Pelajaran berhasil diubah',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Mapel::findOrFail($id);
            $data->delete();
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'message' => 'Mata Pelajaran berhasil dihapus',
        ]);
    }
}
