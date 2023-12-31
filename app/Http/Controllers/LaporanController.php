<?php

namespace App\Http\Controllers;

use App\Models\Pkl;
use App\Models\User;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Rapor;
use App\Models\Ekskul;
use App\Models\Rombel;
use App\Models\DetailGtk;
use App\Models\RaporSiswa;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use App\DataTables\LaporanRaporDataTable;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LaporanRaporDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.laporan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $siswa = User::findOrFail($id);
        $data = RaporSiswa::findOrFail($id);
        $rapor = Rapor::where('rapor_id', $data->id)->get();
        $ca = Nilai::where('rs_id', $data->id)->sum('alpa');
        $ci = Nilai::where('rs_id', $data->id)->sum('izin');
        $cs = Nilai::where('rs_id', $data->id)->sum('sakit');
        $pkls = Pkl::where('rapor_siswa_id', $data->id)->get();
        $ekskuls = Ekskul::where('rapor_siswa_id', $data->id)->get();

        // return dd($data);
        return view('admin.pages.laporan.detail', compact(['rapor', 'data', 'ca', 'ci', 'cs', 'pkls', 'ekskuls']));
    }

    public function export($id)
    {
        $data = RaporSiswa::findOrFail($id);
        $rapor = Rapor::where('rapor_id', $data->id)->get();
        $rombel = Rombel::where('walas_id', $data->walas_id)->first();
        $tajaran = TahunAjaran::findOrFail($rombel->ta_id);
        $user = DetailGtk::where('jabatan', 'kepalasekolah')->first();
        $ks = User::findOrFail($user->user_id);
        $ca = Nilai::where('rs_id', $data->id)->sum('alpa');
        $ci = Nilai::where('rs_id', $data->id)->sum('izin');
        $cs = Nilai::where('rs_id', $data->id)->sum('sakit');
        $pkls = Pkl::where('rapor_siswa_id', $data->id)->get();
        $ekskuls = Ekskul::where('rapor_siswa_id', $data->id)->get();

        // return dd($tajaran);
        $pdf = Pdf::loadView('admin.pages.laporan.export', compact(['data', 'rapor', 'rombel', 'tajaran', 'ks', 'ca', 'ci', 'cs', 'pkls', 'ekskuls']));

        $pdfContent = $pdf->output();
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Rapor.pdf"',
            'Cache-Control' => 'public, max-age=60'
        ];

        return new Response($pdfContent, 200, $headers);
    }
}
