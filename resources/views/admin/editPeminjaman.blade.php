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
        <br>
        <div class="alert alert-success">
            <strong>Success!</strong> {{ Session::get('success') }}
        </div>
        @endif
        @if (Session::get('failed'))
        <br>
        <div class="alert alert-danger">
            <strong>Failed!</strong> {{ Session::get('failed') }}
        </div>
        @endif

        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card mt-4" style="width: 800px">
                    <div class="card-body">
                        <h5 class="card-title text-center">Edit Data</h5>
                        <form action="/postEditPeminjaman/{{$data->id}}" method="POST">
                            @csrf
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Nomor Anggota</label>
                                <select class="form-control border border-secondary form-control" name="idUser"
                                    required>
                                    <option value="">Pilih Nomor Anggota</option>
                                    @foreach ($userList as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == $data->id_user ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    @error('idUser')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>

                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">ID Buku</label>
                                <select class="form-control border border-secondary form-control" name="kodeBuku"
                                    required>
                                    <option value="">Pilih ID Buku</option>
                                    @foreach ($bukuList as $buku)
                                    <option value="{{ $buku->id }}" {{ $buku->id == $data->id_buku ? 'selected' : '' }}>
                                        {{ $buku->kode_buku }}
                                    </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    @error('kodeBuku')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>

                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Tanggal Peminjaman</label>
                                <input type="text" class="form-control border border-secondary form-control"
                                    name="tanggalPeminjaman" required value="{{ $data->tanggal_pinjam }}">
                                <span class="text-danger">
                                    @error('tanggalPeminjaman')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Tanggal Pengembalian</label>
                                <input type="text" class="form-control border border-secondary form-control"
                                    name="tanggalPengembalian" required value="{{ $data->tanggal_kembali }}">
                                <span class="text-danger">
                                    @error('tanggalPengembalian')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary">Pilih Jenis
                                    Kelamin</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status"
                                        value="Belum Dikembalikan" @if ($data->status == 'Belum Dikembalikan') checked
                                    @endif>
                                    <label class="form-check-label" for="inlineRadio1">Belum Dikembalikan</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status"
                                        value="Sudah Dikembalikan" @if ($data->status == 'Sudah Dikembalikan') checked
                                    @endif>
                                    <label class="form-check-label" for="inlineRadio2">Sudah Dikembalikan</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-4">Update Data Peminjaman</button>
                        </form>
                    </div>
                </div>
       
     </div>
        </div><br><br><br><br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>