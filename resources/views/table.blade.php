
@extends('layouts.template')

@section('styles')
    <style>
        body {
            margin: 0;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
        <h3>Tabel Data</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                       <td>1</td>
                       <td>Bundaran UGM</td>
                      <td>Jl. Pancasila</td>
                    </tr>
                    <tr>
                       <td>2</td>
                       <td>Stadion Kridosono</td>
                       <td>Kota Baru</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Bandara Adisucipto</td>
                        <td>Bandaran Internasional</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Gedung Pusat UGM</td>
                        <td>Kantor Pusat UGM</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Gembira Loka Zoo</td>
                        <td>Kebun Binatang</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection