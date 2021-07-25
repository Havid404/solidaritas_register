<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }
    </style>
</head>
<body>
    <title>Aplikasi Anggota Solidaritas Indonesia</title>
    <table>
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Gender</th>
                <th>Alamat</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$member->nik}}</td>
                <td>{{$member->name}}</td>
                <td>{{$member->gender}}</td>
                <td>{{$member->address}}</td>
                @php
                $public = 'images/foto_member/'. $member->photo;
                $image = base64_encode(file_get_contents(public_path($public)));
                @endphp
                <td>        
                    <img src="data:image/png;base64,{{ $image }}" style="height:70px;width:70px;">
                </td>
            </tr>
        </tbody>
    </table>
    <img src="data:image/png;base64, {!! $qrcode !!}" style="margin-top: 30px;">
</body>
</html>