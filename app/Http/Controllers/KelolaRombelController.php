<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\DetailGtk;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\KelolaRombelDataTable;
use App\Http\Requests\KelolaRombelRequest;
use App\Models\Rombel;
use App\Models\RombelSiswa;

class KelolaRombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KelolaRombelDataTable $dataTable)
    {
        $kelas = Kelas::all();
        $tajaran = TahunAjaran::all();
        $walas = DetailGtk::where('jabatan', 'walikelas')->get();
        
        return $dataTable->render('admin.pages.sistem.rombel.index', compact(['kelas', 'tajaran', 'walas']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KelolaRombelRequest $request)
    {
        $dataId = request('item_id');

        try {
            DB::transaction(function () use ($dataId, $request) {
                $data = $request->validated();

                $datas = [
                    'nama' => $data['nama'],
                    'kelas_id' => $data['kelas_id'],
                    'ta_id' => $data['ta_id'],
                    'walas_id' => $data['walas_id'],
                ];
                
                Rombel::updateOrCreate(['id' => $dataId], $datas);
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data Rombel berhasil disimpan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rombel = Rombel::findOrFail($id);
        $tajaran = TahunAjaran::findOrFail($rombel->ta_id);

        $allrmbl = Rombel::all();
        $siswa = User::where('is_admin', 1)->get();
        $alltjr = TahunAjaran::all();
        $rmblssw = RombelSiswa::where('rombel_id', $id)->get();

        return view('admin.pages.sistem.rombel.detail', compact(['rombel', 'tajaran',  'allrmbl', 'siswa', 'alltjr', 'rmblssw']));
    }

    public function addSiswa($id)
    {
        try {
            DB::transaction(function () use ($id) {
                request()->validate([
                    'rombel_id' => 'required',
                    'siswa_id' => 'required',
                ]);

                RombelSiswa::create([
                    'rombel_id' => request('rombel_id'),
                    'siswa_id' => request('siswa_id'),
                ]);
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Siswa berhasil ditambahkan');
    }

    public function delSiswa($id)
    {
        try {
            DB::transaction(function () use ($id) {

                $data = RombelSiswa::findOrFail($id);
                $data->delete();
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Siswa berhasil dihapus');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Rombel::findOrFail($id);

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
                    'ta_id' => 'required',
                    'walas_id' => 'required',
                ]);

                $user = Rombel::findOrFail($item_id);
                $user->nama = request('nama');
                $user->kelas_id = request('kelas_id');
                $user->ta_id = request('ta_id');
                $user->walas_id = request('walas_id');
                $user->save();
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data Rombel berhasil diubah',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Rombel::findOrFail($id);
            $data->delete();
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'message' => 'Rombel berhasil dihapus',
        ]);
    }
}
