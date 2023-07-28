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

    <div class="rapor-title">RAPOR PENDIDIKAN</div>

    <div class="sub-header">
        <table style="width: 100%;">
            <tr>
                <td style="width: 75%;">
                    <p>Nama Siswa: {{ $data->siswa->name }}</p>
                    <p>Kelas : {{ $rombel->kelas->nama }} / {{ $rombel->nama }}</p>
                </td>
                <td>
                    <p>Tahun Pelajaran: {{ $tajaran->ta }}</p>
                    <p>Semester: {{ $tajaran->semester }}</p>
                </td>
            </tr>
        </table>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Pelajaran</th>
                    <th>Pengetahuan</th>
                    <th>Keterampilan</th>
                    <th>Sikap</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rapor as $rpr)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $rpr->nilai->mapel->nama }}</td>
                        <td class="text-center">{{ $rpr->nilai->npengetahuan }}</td>
                        <td class="text-center">{{ $rpr->nilai->nketerampilan }}</td>
                        <td class="text-center">{{ $rpr->nilai->nsikap }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <th>Ketidakhadiran</th>
                <th>Jumlah Hari</th>
                <th>Catatan</th>
            </thead>
            <tbody>
                <tr>
                    <td>Sakit</td>
                    <td class="text-center">{{ $data->sakit }}</td>
                    <td rowspan="3" class="text-center">{!! $data->catatan !!}</td>
                </tr>
                <tr>
                    <td>Izin</td>
                    <td class="text-center">{{ $data->izin }}</td>
                </tr>
                <tr>
                    <td>Tanpa Keterangan</td>
                    <td class="text-center">{{ $data->alpa }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <table style="width: 100%;">
        <tr>
            <td style="width: 50%; font-size: 12px; text-align: center;">
                <p>Kepala Sekolah</p>
                <br>
                <br>
                <p style="font-weight: bold;">{{ $ks->name }}</p>
            </td>
            <td style="width: 50%; font-size: 12px; text-align: center;">
                <p>Walikelas</p>
                <br>
                <br>
                <p style="font-weight: bold;">{{ $data->walas->name }}</p>
            </td>
        </tr>
    </table>
</body>

</html>
