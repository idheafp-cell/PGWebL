
@extends('layouts.template')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.css">
    <style>
        body {
            margin: 0;
        }
    </style>
@endsection

@section('content')
<div class="container mt-3">
    {{-- card point --}}
    <div class="card">
        <div class="card-header">
        <h3>Tabel Data Point</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="tabeldatapoint">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Tanggal Dibuat</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $no=1;
                    @endphp
                    @foreach ($points as $p)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $p['name'] }}</td>
                        <td>{{ $p['description'] }}</td>
                        <td>
                            <img src="{{ asset('storage/images/' . $p['image']) }}" alt="Foto" width="300">
                            </td>
                        <td>{{ $p['created_at'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- card polyline--}}
    <div class="card mt-3">
        <div class="card-header">
        <h3>Tabel Data Polyline</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="tabeldatapolyline">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Tanggal Dibuat</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $no=1;
                    @endphp
                    @foreach ($polylines as $p)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $p['name'] }}</td>
                        <td>{{ $p['description'] }}</td>
                        <td>
                            <img src="{{ asset('storage/images/' . $p['image']) }}" alt="Foto" width="300">
                            </td>
                        <td>{{ $p['created_at'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- card polygon--}}
    <div class="card mt-3">
        <div class="card-header">
        <h3>Tabel Data Polygon</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="tabeldatapolygon">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Tanggal Dibuat</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $no=1;
                    @endphp
                    @foreach ($polygones as $p)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $p['name'] }}</td>
                        <td>{{ $p['description'] }}</td>
                        <td>
                            <img src="{{ asset('storage/images/' . $p['image']) }}" alt="Foto" width="300">
                            </td>
                        <td>{{ $p['created_at'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>
    <script>
        new DataTable('#tabeldatapoint');
        new DataTable('#tabeldatapolyline');
        new DataTable('#tabeldatapolygon');
    </script>
@endsection
