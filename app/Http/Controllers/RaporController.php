<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Nilai;
use App\Models\Rapor;
use App\Models\Rombel;
use App\Models\RaporSiswa;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use InvalidArgumentException;
use Barryvdh\DomPDF\Facade\Pdf;
use App\DataTables\RaporDataTable;
use App\Models\DetailGtk;
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
        // $siswa = User::findOrFail($id);
        $data = RaporSiswa::findOrFail($id);
        $rapor = Rapor::where('rapor_id', $data->id)->get();


        // return dd($data);
        return view('admin.pages.rapor.detail', compact(['rapor', 'data']));
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
    
    public function export($id)
    {
        $data = RaporSiswa::findOrFail($id);
        $rapor = Rapor::where('rapor_id', $data->id)->get();
        $rombel = Rombel::where('walas_id', $data->walas_id)->first();
        $tajaran = TahunAjaran::findOrFail($rombel->ta_id);
        $user = DetailGtk::where('jabatan', 'kepalasekolah')->first();
        $ks = User::findOrFail($user->user_id);

        // return dd($tajaran);
        $pdf = Pdf::loadView('admin.pages.rapor.export', compact(['data', 'rapor', 'rombel', 'tajaran', 'ks']));

        $pdfContent = $pdf->output();
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Laporan-SPKK.pdf"',
            'Cache-Control' => 'public, max-age=60'
        ];

        return new Response($pdfContent, 200, $headers);
    }
}
