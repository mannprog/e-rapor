<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\KelolaTahunAjaranDataTable;
use App\Http\Requests\KelolaTahunAjaranRequest;
use App\Models\TahunAjaran;

class KelolaTahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KelolaTahunAjaranDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.sistem.tajaran.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KelolaTahunAjaranRequest $request)
    {
        $dataId = request('item_id');

        try {
            DB::transaction(function () use ($dataId, $request) {
                $data = $request->validated();

                $datas = [
                    'ta' => $data['ta'],
                    'semester' => $data['semester'],
                ];
                
                TahunAjaran::updateOrCreate(['id' => $dataId], $datas);
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data Tahun Ajaran berhasil disimpan',
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
        $data = TahunAjaran::findOrFail($id);

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KelolaTahunAjaranRequest $request)
    {
        $dataId = request('item_id');

        try {
            DB::transaction(function () use ($dataId, $request) {
                $data = $request->validated();

                $datas = [
                    'ta' => $data['ta'],
                    'semester' => $data['semester'],
                ];
                
                TahunAjaran::updateOrCreate(['id' => $dataId], $datas);
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data Tahun Ajaran berhasil diubah',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = TahunAjaran::findOrFail($id);
            $data->delete();
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'message' => 'Tahun Ajaran berhasil dihapus',
        ]);
    }
}
