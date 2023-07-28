<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Rombel;
use App\Models\RombelSiswa;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\KelolaKenaikanDataTable;

class KelolaKenaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KelolaKenaikanDataTable $dataTable)
    {
        $kelas = Kelas::all();
        $rombel = Rombel::all();
        $tajaran = TahunAjaran::all();

        return $dataTable->render('admin.pages.kenaikan.index', compact(['kelas', 'rombel', 'tajaran']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $siswaId = request('siswa_id');
        try {
            DB::transaction(function () use ($siswaId) {
                // $data = request()->validate([
                //     'rombel_id' => 'required',
                // ]);

                // $datas = [
                //     'rombel_id' => $data['rombel_id'],
                // ];
                
                // RombelSiswa::updateOrCreate(['siswa_id' => $siswaId], $datas);
                request()->validate([
                    'rombel_id' => 'required',
                ]);

                RombelSiswa::create([
                    'rombel_id' => request('rombel_id'),
                    'siswa_id' => $siswaId,
                ]);
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Siswa berhasil dinaikkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
