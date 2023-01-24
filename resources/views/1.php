@php
$data = App\Models\Test1::all();
    @endphp
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Alamat</th>
            <th>No. HP</th>
            <th>Foto</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
        <tr>
            <td>{{ $row->no }}</td>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->jenis }}</td>
            <td>{{ $row->alamat }}</td>
            <td>{{ $row->nohp }}</td>
            <td>
                <img src="assets/{{ $row->foto }}" style="width: 50px;">
                {{ $row->foto }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>