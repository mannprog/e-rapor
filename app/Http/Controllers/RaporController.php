<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use App\Models\Sikap;
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
use App\Models\Pkl;
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
        $ca = Nilai::where('rs_id', $data->id)->sum('alpa');
        $ci = Nilai::where('rs_id', $data->id)->sum('izin');
        $cs = Nilai::where('rs_id', $data->id)->sum('sakit');
        $pkls = Pkl::where('rapor_siswa_id', $data->id)->get();
        $ekskuls = Ekskul::where('rapor_siswa_id', $data->id)->get();


        // return dd($data);
        return view('admin.pages.rapor.detail', compact(['rapor', 'data', 'ca', 'ci', 'cs', 'pkls', 'ekskuls']));
    }

    public function addCatatan()
    {
        $dataId = request('data_id');

        try {
            DB::transaction(function () use ($dataId) {
                request()->validate([
                    'catatan' => 'required|max:255'
                ]);

                $absen = RaporSiswa::findOrFail($dataId);
                $absen->catatan = request('catatan');
                $absen->save();
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Catatan siswa berhasil dimasukkan');
    }

    public function addSikap()
    {
        $dataId = request('data_id');

        try {
            DB::transaction(function () use ($dataId) {
                request()->validate([
                    'dimensi' => 'required',
                    'deskripsi' => 'required|max:255'
                ]);

                $sikap = Sikap::where('rapor_siswa_id', $dataId)->first();
                $sikap->dimensi = request('dimensi');
                $sikap->deskripsi = request('deskripsi');
                $sikap->save();
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Sikap siswa berhasil dimasukkan');
    }

    public function addPkl()
    {
        try {
            DB::transaction(function () {
                request()->validate([
                    'mitra' => 'required',
                    'lokasi' => 'required',
                    'rwaktu' => 'required',
                    'keterangan' => 'required|max:255'
                ]);

                Pkl::create([
                    'rapor_siswa_id' => request('data_id'),
                    'mitra' => request('mitra'),
                    'lokasi' => request('lokasi'),
                    'rwaktu' => request('rwaktu'),
                    'keterangan' => request('keterangan'),
                ]);
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Praktik Kerja Lapangan siswa berhasil dimasukkan');
    }

    public function delPkl($id)
    {
        try {
            DB::transaction(function () use ($id) {

                $data = Pkl::findOrFail($id);
                $data->delete();
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Praktik Kegiatan Lapangan siswa berhasil dihapus');
    }

    public function addEkskul()
    {
        try {
            DB::transaction(function () {
                request()->validate([
                    'kegiatan' => 'required',
                    'predikat' => 'required',
                    'keterangan' => 'required|max:255'
                ]);

                Ekskul::create([
                    'rapor_siswa_id' => request('data_id'),
                    'kegiatan' => request('kegiatan'),
                    'predikat' => request('predikat'),
                    'keterangan' => request('keterangan'),
                ]);
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Kegiatan Ekstrakurikuler siswa berhasil dimasukkan');
    }

    public function delEkskul($id)
    {
        try {
            DB::transaction(function () use ($id) {

                $data = Ekskul::findOrFail($id);
                $data->delete();
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Kegiatan Ekstrakurikuler siswa berhasil dihapus');
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
        $pdf = Pdf::loadView('admin.pages.rapor.export', compact(['data', 'rapor', 'rombel', 'tajaran', 'ks', 'ca', 'ci', 'cs', 'pkls', 'ekskuls']));

        $pdfContent = $pdf->output();
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Rapor.pdf"',
            'Cache-Control' => 'public, max-age=60'
        ];

        return new Response($pdfContent, 200, $headers);
    }
}
