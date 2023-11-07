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

        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card mt-4" style="width: 1250px">
                    <div class="card-body">
                        <h4 class="card-title text-center bold">Detail Peminjaman</h4>
                        <div class="text-center">
                            <img class="rounded mt-3 mb-4" style="width: 200px"
                                src="{{ asset('images/'.$detailPeminjaman->gambar) }}" alt="cover buku">
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">Peminjaman</th>
                                    <th colspan="2" class="text-center">Buku</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="text-left">ID Peminjaman</th>
                                    <td><input class="form-control" type="text" value="{{$detailPeminjaman->id }}"
                                            disabled readonly></td>
                                    <th class="text-left">ID Buku</th>
                                    <td><input class="form-control" type="text" value="{{$detailPeminjaman->id_buku }}"
                                            disabled readonly></td>
                                </tr>
                                <tr>
                                    <th class="text-left">Tanggal Peminjaman</th>
                                    <td><input class="form-control" type="text"
                                            value="{{$detailPeminjaman->tanggal_pinjam }}" disabled readonly></td>
                                    <th class="text-left">Kode Buku</th>
                                    <td><input class="form-control" type="text"
                                            value="{{$detailPeminjaman->kode_buku }}" disabled readonly></td>
                                </tr>
                                <tr>
                                    <th class="text-left">Tanggal Pengembalian</th>
                                    <td><input class="form-control" type="text"
                                            value="{{$detailPeminjaman->tanggal_kembali }}" disabled readonly></td>
                                    <th class="text-left">Judul Buku</th>
                                    <td><input class="form-control" type="text"
                                            value="{{$detailPeminjaman->judul_buku }}" disabled readonly></td>
                                </tr>
                                <tr>
                                    <th class="text-left">Status Pengembalian</th>
                                    <td><input class="form-control" type="text" value="{{$detailPeminjaman->status }}"
                                            disabled readonly></td>
                                    <th class="text-left">Penulis</th>
                                    <td><input class="form-control" type="text" value="{{$detailPeminjaman->penulis }}"
                                            disabled readonly></td>
                                </tr>
                                <tr>
                                    <th class="text-left">ID Anggota</th>
                                    <td><input class="form-control" type="text" value="{{$detailPeminjaman->id_user }}"
                                            disabled readonly></td>
                                    <th class="text-left">Penerbit</th>
                                    <td><input class="form-control" type="text" value="{{$detailPeminjaman->penerbit }}"
                                            disabled readonly></td>
                                </tr>
                                <tr>
                                    <th class="text-left">Nama Anggota</th>
                                    <td><input class="form-control" type="text" value="{{$detailPeminjaman->name }}"
                                            disabled readonly></td>
                                    <th class="text-left">Tahun Terbit</th>
                                    <td><input class="form-control" type="text"
                                            value="{{$detailPeminjaman->tahun_terbit }}" disabled readonly></td>
                                </tr>
                                <tr>
                                    <th class="text-left">Email Anggota</th>
                                    <td><input class="form-control" type="text" value="{{$detailPeminjaman->email }}"
                                            disabled readonly></td>

       
                             <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>