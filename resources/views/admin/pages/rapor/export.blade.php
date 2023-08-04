<!DOCTYPE html>
<html>

<head>
    <title>SMK PASUNDAN JATINANGOR</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        header {
            text-align: center;
            border-bottom: 3px solid #000;
        }

        .logo {
            max-width: 100px;
        }

        .school-name {
            font-size: 24px;
            font-weight: bold;
        }

        .address {
            font-size: 12px;
        }

        .rapor-title {
            font-size: 24px;
            font-weight: bold;
            margin-top: 5px;
            margin-bottom: 10px;
            text-align: center;
        }

        .rapor-subtitle {
            font-size: 12px;
            font-weight: bold;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .student-info {
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .sub-header {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            font-weight: bold;
        }

        .row {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
        }

        .table-container {
            margin-bottom: 30px;
            font-size: 12px;
        }

        .table-container table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #000;
        }

        .table-container th,
        .table-container td {
            border: 1px solid #000;
            padding: 8px;
        }

        .footer {
            text-align: center;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo Sekolah" class="logo">
        <div class="school-name">SMK PASUNDAN JATINANGOR</div>
        <div class="address">Jl. Kolonel Ahmad Syam Jatinangor, Dsn. Cikeruh, Ds. Cikeruh, Kec. Jatinangor, Kab. Sumedang
            45363</div>
        <div class="address">NPSN: 20254180 | Terakreditasi</div>
    </header>

    <div class="rapor-title">Laporan Hasil Belajar</div>

    <div class="sub-header">
        <table style="width: 100%;">
            <tr>
                <td style="width: 75%;">
                    <p>Nama Siswa: {{ $data->siswa->name }}</p>
                    <p>NIS: {{ $data->siswa->detailSiswa->nis }}</p>
                    <p>NISN: {{ $data->siswa->detailSiswa->nisn }}</p>
                </td>
                <td>
                    <p>Kelas : {{ $rombel->kelas->nama }} / {{ $rombel->nama }}</p>
                    <p>Tahun Pelajaran: {{ $tajaran->ta }}</p>
                    <p>Semester: {{ $tajaran->semester }}</p>
                </td>
            </tr>
        </table>
    </div>

    <div class="rapor-subtitle">A. Sikap</div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Dimensi</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">{{ $data->sikap->dimensi }}</td>
                    <td class="text-center">{{ $data->sikap->deskripsi }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="rapor-subtitle">B. Nilai Akademik</div>

    <div class="table-container">
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 29%;">Mata Pelajaran</th>
                    <th style="width: 11%;">Nilai Akhir</th>
                    <th style="width: 55%;">Capaian Kompetensi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rapor as $rpr)
                    @php
                        $dataNilai = ($rpr->nilai->nharian + $rpr->nilai->nuts + $rpr->nilai->nuas) / 3;
                        $totalNilai = round($dataNilai);
                    @endphp
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $rpr->nilai->mapel->nama }}</td>
                        <td class="text-center">{{ $totalNilai }}</td>
                        <td>{{ $rpr->nilai->ck }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="rapor-subtitle">C. Praktik Kerja Lapangan</div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mitra DU/DI</th>
                    <th>Lokasi</th>
                    <th>Lamanya (Bulan)</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pkls as $pkl)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $pkl->mitra }}</td>
                        <td class="text-center">{{ $pkl->lokasi }}</td>
                        <td class="text-center">{{ $pkl->rwaktu }}</td>
                        <td class="text-center">{{ $pkl->keterangan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="rapor-subtitle">D. Ekstrakurikuler</div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kegiatan Ekstrakurikuler</th>
                    <th>Predikat</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ekskuls as $ekskul)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $ekskul->kegiatan }}</td>
                        <td class="text-center">{{ $ekskul->predikat }}</td>
                        <td class="text-center">{{ $ekskul->keterangan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="table-container">
        <table style="width: 40%;">
            <thead>
                <th>Ketidakhadiran</th>
                <th>Jumlah Hari</th>
            </thead>
            <tbody>
                <tr>
                    <td>Sakit</td>
                    <td class="text-center">{{ $cs }} Hari</td>
                </tr>
                <tr>
                    <td>Izin</td>
                    <td class="text-center">{{ $ci }} Hari</td>
                </tr>
                <tr>
                    <td>Tanpa Keterangan</td>
                    <td class="text-center">{{ $ca }} Hari</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="rapor-subtitle">Catatan Wali Kelas</div>

    <div class="table-container">
        <table>
            <tbody>
                <tr>
                    <td>{{ $data->catatan }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    @if ($tajaran->semester === 'genap')
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Keterangan Kenaikan Kelas : Naik kelas / Tinggal kelas</th>
                    </tr>
                </thead>
            </table>
        </div>
    @endif

    <table style="width: 100%;">
        <tr>
            <td style="width: 50%; font-size: 12px; text-align: center;">
                <p>Mengetahui,</p>
                <p>Orang Tua/Wali</p>
                <br>
                <br>
                <p style="font-weight: bold;">..........................</p>
            </td>
            <td style="width: 50%; font-size: 12px; text-align: center;">
                <p>Jatinangor,</p>
                <p>Walikelas</p>
                <br>
                <br>
                <p style="font-weight: bold; text-decoration: underline;">{{ $data->walas->name }}</p>
            </td>
        </tr>
    </table>

    <table style="width: 100%;">
        <tr>
            <td style="width: 50%; font-size: 12px; text-align: center;">
                <p>Kepala Sekolah</p>
                <br>
                <br>
                <p style="font-weight: bold; text-decoration: underline;">{{ $ks->name }}</p>
            </td>
        </tr>
    </table>
</body>

</html>
