<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\KelolaKelasDataTable;
use App\Http\Requests\KelolaKelasRequest;
use App\Models\Kelas;

class KelolaKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KelolaKelasDataTable $dataTable)
    {
        $jurusan = Jurusan::all();

        return $dataTable->render('admin.pages.sistem.kelas.index', compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KelolaKelasRequest $request)
    {
        $dataId = request('item_id');

        try {
            DB::transaction(function () use ($dataId, $request) {
                $data = $request->validated();

                $datas = [
                    'nama' => $data['nama'],
                    'jurusan_id' => $data['jurusan_id'],
                ];
                
                Kelas::updateOrCreate(['id' => $dataId], $datas);
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data kelas berhasil disimpan',
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
        $data = Kelas::findOrFail($id);

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KelolaKelasRequest $request)
    {
        $item_id = request('item_id');

        try {
            DB::transaction(function () use ($item_id, $request) {
                $data = $request->validated();

                $datas = [
                    'nama' => $data['nama'],
                    'jurusan_id' => $data['jurusan_id'],
                ];

                Kelas::updateOrCreate(['id' => $item_id], $datas);
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data kelas berhasil diubah',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Kelas::findOrFail($id);
            $data->delete();
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'message' => 'Kelas berhasil dihapus',
        ]);
    }
}
