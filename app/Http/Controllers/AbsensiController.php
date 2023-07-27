<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Rombel;
use App\Models\Absensi;
use App\Models\RombelSiswa;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\AbsensiDataTable;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AbsensiDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.absensi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mapel = Mapel::findOrFail($id);
        $rombel = Rombel::where('id', $mapel->rombel_id)->get();
        $rmblssw = RombelSiswa::where('rombel_id', $mapel->rombel_id)->get();
        $absen = Absensi::all();

        return view('admin.pages.absensi.detail', compact(['mapel', 'rombel', 'rmblssw', 'absen']));
    }

    public function inputAbsen()
    {
        try {
            DB::transaction(function () {
                request()->validate([
                    'mapel_id' => 'required',
                    'rs_id' => 'required',
                    'alpa' => 'required',
                    'izin' => 'required',
                    'sakit' => 'required',
                ]);

                Absensi::create([
                    'mapel_id' => request('mapel_id'),
                    'rs_id' => request('rs_id'),
                    'alpa' => request('alpa'),
                    'izin' => request('izin'),
                    'sakit' => request('sakit'),
                ]);
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Absensi siswa berhasil ditambahkan');
    }

    public function delAbsensi($id)
    {
        try {
            DB::transaction(function () use ($id) {

                $data = Absensi::findOrFail($id);
                $data->delete();
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Absensi siswa berhasil dihapus');
    }
}
