
@extends('layouts.template')

@section('styles')
    <style>
        body {
            margin: 0;
        }
    </style>
@endsection

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-header">
        <h3>Aplikasi Geospasial CRUD</h3>
        </div>
        <div class="card-body">
            <p>Aplikasi sederhana ini dibuat untuk memenuhi tugas akhir mata kuliah
            Pemrograman Web Lanjut. Aplikasi ini menampilkan peta interaktif yang
            menunjukkan objek dengan geometri titik, garis, dan area yang dapat ditambah,
            ditampilkan, diubah, dan dihapus. Aplikasi ini dikembangkan menggunakan framework
            Laravel untuk backend dan Leaflet untuk frontend. Data disimpan dalam database
            MySQL, dan aplikasi ini menyediakan antarmuka pengguna yang responsif untuk
            mengelola data geospasial dengan mudah.</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-3">
            <div class="card border-primary">
                <div class="card-header">
                    <h3>Jumlah Point</h3>
                </div>
                <div class="card-body text-center">
                    <h1>
                        {{ $points_count }}
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card border-success">
                <div class="card-header">
                    <h3>Jumlah Polyline</h3>
                </div>
                <div class="card-body text-center">
                    <h1>
                        {{ $polylines_count }}
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card border-danger">
                <div class="card-header">
                    <h3>Jumlah Polygon</h3>
                </div>
                <div class="card-body text-center">
                    <h1>
                        {{ $polygones_count }}
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card border-warning">
                <div class="card-header">
                    <h3>Jumlah User</h3>
                </div>
                <div class="card-body text-center">
                    <h1>
                        {{ $users_count }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
