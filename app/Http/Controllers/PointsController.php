<?php

namespace App\Http\Controllers;

use App\Models\PointsModel;
use Illuminate\Http\Request;

class PointsController extends Controller
{
    public function __construct()
    {
        $this->points = new PointsModel();
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
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ],
            [
                'geometry_point.required' => 'Field Geometry Point harus diisi.',
                'name.required' => 'Field Name harus diisi.',
                'name.string' => 'Field Name harus berupa string.',
                'name.max' => 'Field Name tidak boleh lebih dari 255 karakter.',
                'description.required' => 'Field Description harus diisi.',
                'description.string' => 'Field Description harus berupa string.',
                'image.image' => 'Field Image harus berupa file gambar.',
                'image.mimes' => 'Field Image harus berupa file dengan ekstensi: jpeg, png, jpg.',
                'image.max' => 'Field Image tidak boleh lebih dari 2MB.',
            ]
        );

        // buat folder untuk menyimpan gambar jika belum ada
        if (!is_dir('storage/images')) {
            mkdir('./storage/images', 0777);
        }

        // proses upload gambar jika ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_image = time() . "_point." . strtolower($image->getClientOriginalExtension());
            $image->move('storage/images', $name_image);
        } else {
            $name_image = null;
        }

        $data = [
            'geom' => $request->geometry_point,
            'name' => $request->name,
            'description' => $request->description,
            'image' => $name_image,
        ];

        // simpan data ke database
        if (!$this->points->create($data)) {
            return redirect()->route('peta')->with('error', 'Gagal menyimpan data point');
        };

        // kembali ke halaman peta
        return redirect()->route('peta')->with('success', 'Data point berhasil disimpan');
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
