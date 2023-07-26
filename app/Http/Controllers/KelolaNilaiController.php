<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Rombel;
use App\Models\RombelSiswa;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\KelolaNilaiDataTable;
use App\Models\Nilai;

class KelolaNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KelolaNilaiDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.nilai.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mapel = Mapel::findOrFail($id);
        $rombel = Rombel::where('id', $mapel->rombel_id)->get();
        $rmblssw = RombelSiswa::where('rombel_id', $mapel->rombel_id)->get();
        $nilai = Nilai::all();

        return view('admin.pages.nilai.detail', compact(['mapel', 'rombel', 'rmblssw', 'nilai']));
    }

    public function inputNilai($id)
    {
        try {
            DB::transaction(function () use ($id) {
                request()->validate([
                    'mapel_id' => 'required',
                    'rs_id' => 'required',
                    'npengetahuan' => 'required',
                    'nketerampilan' => 'required',
                    'nsikap' => 'required',
                ]);

                Nilai::create([
                    'mapel_id' => request('mapel_id'),
                    'rs_id' => request('rs_id'),
                    'npengetahuan' => request('npengetahuan'),
                    'nketerampilan' => request('nketerampilan'),
                    'nsikap' => request('nsikap'),
                ]);
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Nilai siswa berhasil ditambahkan');
    }

    public function delNilai($id)
    {
        try {
            DB::transaction(function () use ($id) {

                $data = Nilai::findOrFail($id);
                $data->delete();
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Nilai siswa berhasil dihapus');
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
