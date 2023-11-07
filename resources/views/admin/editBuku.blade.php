<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Admin Dashboard</title>
    <style>
    /* Add your custom CSS styles here */

    body {

        font-family: 'Lato';

    }

    .adminbck {
        background-color: #343434;
    }

    .sidebar {
        height: 100%;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #333;
        padding-top: 20px;
    }

    .sidebar a {
        padding: 10px 20px;
        text-decoration: none;
        font-size: 18px;
        color: #fff;
        display: block;
    }

    .sidebar a:hover {
        background-color: #555;
    }

    .content {
        margin-left: 260px;
        padding: 20px;
    }
    </style>
</head>

<body>
    <div class="sidebar">
        <a href="{{ route('admin.home') }}">Home</a>
        <a href="{{ route('admin.berita') }}">Berita</a>
        <a href="{{ route('admin.datadosen') }}">Data</a>
        <a href="{{ route('admin.buku') }}">Buku</a>
        <a href="{{ route('admin.peminjaman') }}">Peminjaman</a>
        <a href="{{ route('admin.aktivitas') }}">Aktivitas</a>
        <a href="{{ route('admin.lulusan')}}">Lulusan</a>
        <a class="mt-lg-5" href="{{ route('logout') }}">Logout</a>
    </div>

    <div class="content">
        <div class="adminbck rounded px-3 py-2">
            <h1 class="text-white font-weight-bolder">Selamat Datang!</h1>
            <h5 class="text-white">{{ Auth::user()->name }}</h5>
        </div>

        @if (Session::get('success'))
        <div class="alert alert-success">
            <strong>Success!</strong> {{ Session::get('success') }}
        </div>
        @endif
        @if (Session::get('failed'))
        <div class="alert alert-danger">
            <strong>Failed!</strong> {{ Session::get('failed') }}
        </div>
        @endif

        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card mt-4" style="width: 800px">
                    <div class="card-body">
                        <h5 class="card-title text-center">Update Data Buku</h5>
                        <form action="/postEditBuku/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Kode
                                    Buku</label>
                                <input type="text" class="form-control border border-secondary form-control"
                                    name="kodeBuku" required value="{{ $data->kode_buku }}">
                                <span class="text-danger">
                                    @error('kodeBuku')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Judul
                                    Buku</label>
                                <input type="text" class="form-control border border-secondary form-control"
                                    name="judulBuku" required value="{{ $data->judul_buku }}">
                                <span class="text-danger">
                                    @error('judulBuku')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Penulis</label>
                                <input type="text" class="form-control border border-secondary form-control"
                                    name="penulis" required value="{{ $data->penulis }}">
                                <span class="text-danger">
                                    @error('penulis')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Penerbit</label>
                                <input type="text" class="form-control border border-secondary form-control"
                                    name="penerbit" required value="{{ $data->penerbit }}">
                                <span class="text-danger">
                                    @error('penerbit')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Tahun
                                    Terbit</label>
                                <input type="text" class="form-control border border-secondary form-control"
                                    name="tahunTerbit" required value="{{ $data->tahun_terbit }}">
                                <span class="text-danger">
                                    @error('tahunTerbit')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Cover
                                    Buku</label>
                                <input class="form-control mb-2" placeholder="Nama file lama: {{ $data->gambar }}"
                                    disabled>
                                <input class="form-control" type="file" name="gambar">
                                <div class="form-text">Maksimal ukuran
                                    gambar cover buku 5MB</div>
                                <img class="mt-3" style="width: 100px" src="{{ asset('/images/' . $data->gambar) }}"
                                    alt="cover buku">
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Kategori Buku</label>
                                <select class="form-select" aria-label="Floating label select example" name="kategori">
                                    <option value="Programmer" @if ($data->kategori == 'Programmer') selected
                                        @endif>Programmer</option>
                                    <option value="Sains" @if ($data->kategori == 'Sains') selected @endif>Sains
                                    </option>
                                    <option value="Komik" @if ($data->kategori == 'Komik') selected @endif>Komik
                                    </option>
                                    <!-- @foreach ($data as $option)
                                    <option value="{{ $option }}" @if ($option==$data->kategori) selected
                                        @endif>{{ $option }}</option>
                                    @endforeach -->
                                </select>
                            </div>

                            <br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Comments</label>
                                <textarea class="form-control" name="deskripsi" style="height: 250px"
                                    required>{{ $data->deskripsi }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success mt-5">Update Data Buku</button>
                        </form>


                    </div>
       
         </div>
            </div>
        </div><br><br><br><br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>