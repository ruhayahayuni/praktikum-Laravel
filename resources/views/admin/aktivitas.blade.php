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
        background-color: #EC7063;
    }

    .sidebar {
        height: 100%;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        background-color:#EC7063;
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
        background-color: #EC7063;
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

        <div class="row mt-4">
            <div class="col"></div>
            <div class="col-6">
                <form action="{{ route('admin.aktivitas') }}" method="GET">
                    @csrf
                    <div class="input-group">
                        <input type="search" name="search" class="form-control rounded"
                            placeholder="Cari judul aktivitas" aria-label="Search" aria-describedby="search-addon" />
                        <button type="submit" class="btn btn-outline-primary">search</button>
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>
        <div class="row mt-5">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col-2">
                <a class="btn btn-success" href="{{route('admin.tambahAktivitas') }}"
                    style="text-decoration: none; margin-left: 30px">Tambah Data +</a>
            </div>
        </div>
        <table class="table" style="margin-top: 10px">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Konten</th>
                    <th scope="col">Tanggal Upload</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($data as $index => $aktivitas)
                <tr>
                    <td scope="row">{{ $index + $data->firstItem() }}</td>
                    <td>
                        <img style="width: 50px" src="{{asset('/images/' . $aktivitas->gambar) }}" alt="cover buku">
                    </td>
                    <td>{{ $aktivitas->judul}}</td>
                    <td>{{ $aktivitas->penulis }}</td>
                    <td>{{ $aktivitas->konten }}</td>
                    <td>{{ $aktivitas->tu }}</td>
                    <td>
                        <a class="btn btn-outline-warning" href="/admin/editAktivitas/{{ $aktivitas->id }}">Edit</a>
                        <a class="btn btn-outline-danger" href="/admin/deleteAktivitas/{{ $aktivitas->id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table><br>
        {{ $data->links() }}
    </d
iv>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>