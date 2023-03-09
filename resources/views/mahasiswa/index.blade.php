<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MVC CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <h1 class="text-center mb-3">Data Mahasiswa</h1>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary btn-md m-2">Tambah Data</a>
        @if (session ('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success')}}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NIM</th>
                            <th>NAMA</th>
                            <th>JURUSAN</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($mahasiswa->count() >0)
                            @foreach($mahasiswa as $no => $hasil)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $hasil->nim }}</td>
                                <td>{{ $hasil->nama }}</td>
                                <td>{{ $hasil->jurusan }}</td>
                                <td><form action="{{ route('mahasiswa.destroy', $hasil->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                <a href="{{ route('mahasiswa.edit', $hasil->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10" align="center">Data kosong</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>