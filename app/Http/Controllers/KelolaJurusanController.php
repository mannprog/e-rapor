<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\KelolaJurusanDataTable;
use App\Http\Requests\KelolaJurusanRequest;
use App\Models\Jurusan;

class KelolaJurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KelolaJurusanDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.sistem.jurusan.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KelolaJurusanRequest $request)
    {
        $dataId = request('item_id');

        try {
            DB::transaction(function () use ($dataId, $request) {
                $data = $request->validated();

                $datas = [
                    'nama' => $data['nama'],
                ];
                
                Jurusan::updateOrCreate(['id' => $dataId], $datas);
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data jurusan berhasil disimpan',
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
        $data = Jurusan::findOrFail($id);

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
                    'nama' => 'required|string',
                ]);

                $user = Jurusan::findOrFail($item_id);
                $user->nama = request('nama');
                $user->save();
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data jurusan berhasil diubah',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        try {
            $data = Jurusan::findOrFail($id);
            $data->delete();
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'message' => 'Jurusan berhasil dihapus',
        ]);
    }
}
