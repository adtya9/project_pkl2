<html>
<head>
    <title>Edit Data Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FFFDF2] text-[16px]">
    <h1 class="text-3xl font-bold mt-6 ml-12">Edit Data</h1>

    <form action="{{ route('siswa.update', $data->id_siswa) }}" method="POST" class="mt-4 ml-10">
        @csrf 
        @method('PUT')

        <table cellpadding="8">
            @php
                $fields = [
                    'nis' => 'NIS',
                    'nama' => 'Nama',
                    'email' => 'Email',
                    'nomor_telepon' => 'Nomor Telepon',
                    'jenis_kelamin' => 'Jenis Kelamin'
                ];
            @endphp

            @foreach ($fields as $name => $label)
            <tr>
                <td class="pr-4">{{ $label }} :</td>
                <td><input type="text" name="{{ $name }}" value="{{ $data->$name }}" class="w-[230px] h-[32px] text-[15px] border border-gray-400 rounded px-2"></td>
            </tr>
            @endforeach

            <tr>
                <td class="pr-4">Nama Sekolah :</td>
                <td>
                    <select name="id_sekolah" class="w-[240px] h-[35px] text-[15px] border border-gray-400 rounded px-2">
                        @foreach($sekolah as $s)
                            <option value="{{ $s->id_sekolah }}" {{ $data->id_sekolah == $s->id_sekolah ? 'selected' : '' }}>
                                {{ $s->nama_sekolah }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <td class="pr-4">Jurusan :</td>
                <td>
                    <select name="id_jurusan" class="w-[240px] h-[35px] text-[15px] border border-gray-400 rounded px-2">
                        @foreach($jurusan as $j)
                            <option value="{{ $j->id_jurusan }}" {{ $data->id_jurusan == $j->id_jurusan ? 'selected' : '' }}>
                                {{ $j->nama_jurusan }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <td colspan="2" class="pt-4">
                    <a href="{{ route('siswa.index') }}" class="mr-4 text-blue-700 hover:underline">Kembali</a>
                    <button type="submit" class="px-4 py-2 bg-black text-[#FFFDF2] rounded hover:bg-gray-800 transition">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
