<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Nilai;
use App\Models\Rapor;
use App\Models\RaporSiswa;
use Illuminate\Http\Request;
use InvalidArgumentException;
use App\DataTables\RaporDataTable;
use Illuminate\Support\Facades\DB;

class RaporController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RaporDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.rapor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswa = User::findOrFail($id);
        $data = RaporSiswa::where('siswa_id', $siswa->id)->first();
        $rapor = Rapor::where('rapor_id', $data->id)->get();

        // return dd($data);
        return view('admin.pages.rapor.detail', compact(['siswa', 'rapor', 'data']));
    }

    public function editAbsensi()
    {
        $dataId = request('data_id');

        try {
            DB::transaction(function () use ($dataId) {
                request()->validate([
                    'alpa' => 'required|numeric|max:100|min:0',
                    'izin' => 'required|numeric|max:100|min:0',
                    'sakit' => 'required|numeric|max:100|min:0',
                    'catatan' => 'required|max:255'
                ]);

                $absen = RaporSiswa::findOrFail($dataId);
                $absen->alpa = request('alpa');
                $absen->izin = request('izin');
                $absen->sakit = request('sakit');
                $absen->catatan = request('catatan');
                $absen->save();
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Data absensi siswa berhasil ditambahkan');
    }
}
