<?php

namespace App\Http\Controllers;

use App\Models\PolygonesModel;
use Illuminate\Http\Request;

class PolygonsController extends Controller
{
    // fungsi untuk menghubungkan dengan model ke controller
    public function __construct()
    {
        $this->polygones = new PolygonesModel();
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
                'geometry_polygon' => 'required',
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ],
            [
                'geometry_polygon.required' => 'Field Geometry Polygon harus diisi.',
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
            $name_image = time() . "_polygons." . strtolower($image->getClientOriginalExtension());
            $image->move('storage/images', $name_image);
        } else {
            $name_image = null;
        }

        $data = [
        'geom' => $request->geometry_polygon,
        'name' => $request->name,
        'description' => $request->description,
        'image' => $name_image,
        ];

        // simpan data ke database
        if(!$this->polygones->create($data)) {
            return redirect()->route('peta')->with('error', 'Gagal menyimpan data polygon');
        };

        // kembali ke halaman peta
        return redirect()->route('peta')-> with('success', 'Data polygon berhasil disimpan');

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
        // mencari nama file gambar berdasarkan ID
        $image = $this->polygones->find($id)->image;

        // hapus file gambar jika ada
        if ($image != null) {
            if (file_exists('./storage/images/' . $image)) {
                unlink('./storage/images/' . $image);
            }
        }

        // hapus data dari database
        if (!$this->polygones->destroy($id)) {
            return redirect()->route('peta')->with('error', 'Gagal menghapus data polygon');
        };

        // kembali ke halaman peta
        return redirect()->route('peta')->with('success', 'Data polygon berhasil dihapus');
    }
}
