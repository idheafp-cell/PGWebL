<?php

namespace App\Http\Controllers;


use App\Models\pointsModel;
use Illuminate\Http\Request;

class PointsController extends Controller
{
    public function __construct()
    {
        $this->points = new pointsModel();
    }

/**
     * Display a listing of the resource.
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate(
            [
                'geometry_point' => 'required',
                'name' => 'required|string|max:255',
                'description' => 'required|string',
            ],
            [
                'geometry_point.required' => 'Field Geometry Point harus diisi.',
                'name.required' => 'Field Name harus diisi.',
                'name.string' => 'Field Name harus berupa string.',
                'name.max' => 'Field Name tidak boleh lebih dari 255 karakter.',
                'description.required' => 'Field Description harus diisi.',
                'description.string' => 'Field Description harus berupa string.',
            ]
        );

        $data = [
        'geom' => $request->geometry_point,
        'name' => $request->name,
        'description' => $request->description,
        ];

        // simpan data ke database
        if(!$this->points->create($data)) {
            return redirect()->route('peta')->with('error', 'Gagal menyimpan data point');
        };

        // kembali ke halaman peta
        return redirect()->route('peta')-> with('success', 'Data point berhasil disimpan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
