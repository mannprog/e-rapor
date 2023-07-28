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
use App\Models\Rapor;
use App\Models\RaporSiswa;

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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mapel = Mapel::findOrFail($id);
        $rombel = Rombel::where('id', $mapel->rombel_id)->get();
        $rmblssw = RombelSiswa::where('rombel_id', $mapel->rombel_id)->get();
        $nilai = Nilai::where('mapel_id', $id)->get();

        // return dd($nilai);
        return view('admin.pages.nilai.detail', compact(['mapel', 'rombel', 'rmblssw', 'nilai']));
    }

    public function inputNilai($id)
    {
        try {
            DB::transaction(function () use ($id) {
                request()->validate([
                    'walas_id' => 'required',
                    'mapel_id' => 'required',
                    'rs_id' => 'required',
                    'npengetahuan' => 'required',
                    'nketerampilan' => 'required',
                    'nsikap' => 'required',
                ]);

                $nilai = Nilai::create([
                    'mapel_id' => request('mapel_id'),
                    'rs_id' => request('rs_id'),
                    'npengetahuan' => request('npengetahuan'),
                    'nketerampilan' => request('nketerampilan'),
                    'nsikap' => request('nsikap'),
                ]);

                $siswa = RombelSiswa::findOrFail(request('rs_id'));

                $rs = RaporSiswa::where('siswa_id', $siswa->siswa_id)->first();
                if (!$rs) {
                    $rs = new RaporSiswa();
                    $rs->walas_id = request('walas_id');
                    $rs->siswa_id = $siswa->siswa_id;
                    $rs->save();
                }

                Rapor::create([
                    'rapor_id' => $rs->id,
                    'nilai_id' => $nilai->id,
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
}
