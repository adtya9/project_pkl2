<html>
    <head>
        <script src = "http://cdn.tailwindcss.com"></script>
    </head>
    <body class = "bg-[#fffdf2]">
        <div class = "container mx-auto mt-10">
        
        <h1 class="text-4xl mb-6 text-center text-black font-bold transform -translate-x-20">Data Jurusan</h1>
 
        @if(session('success'))
        <p style = "color: blue;">{{session('success')}}</p>
        @endif

        @if(session('error'))
        <p style = "color:red;">{{session('error')}}</p>
        @endif

        <div class = "flex justify-between mb-4">
            <a href = "{{ route('dashboard') }}" class = "px-4 py-2 rounded-lg text-[#fffdf2] bg-black">Kembali</a>
            <a href = "{{ route('jurusan.create') }}" class = "px-4 py-2 rounded-lg text-[#fffdf2] bg-black">Tambah Data</a> 
        </div>

        <div class = "overflow-x-auto rounded-lg shadow-lg bg-white">
            <table class = "w-full text-sm text-center border-collapse">
                <thead class = "text-[#fffdf2] bg-black">
                    <tr>
                        <th class = "px-20 py-2">No</th>
                        <th class = "px-32 py-2">Nama Jurusan</th>
                        <th class = "px-32 py-2">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $j)
                    <tr class = "border-b">
                        <td class = "px-4 py-2">{{ $loop->iteration }}</td> 
                        <td class = "px-4 py-2">{{ $j->nama_jurusan }}</td>
                        <td class = "px-4 py-2">
                            <a href = "{{ route('jurusan.edit', $j->id_jurusan) }}" class = "bg-black px-3 py-1 rounded-lg text-[#fffdf2] inline-block">Edit</a>
                            <form action = "{{ route('jurusan.destroy', $j->id_jurusan) }}" method = "POST" class = "inline-block"
                            onsubmit="return confirm('apakah anda yakin hapus data ini?')">
                        @csrf 
                    @method('DELETE')
                <button type = "submit" class = "px-3 py-1 rounded-lg text-[#fffdf2] bg-red-600">Hapus</button>
            </form> 
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
        <div class = "mt-6 flex justify-center">
            {{ $data->links('pagination.tailwind') }}
        </div>   
        </div>  
    </body>
</html>