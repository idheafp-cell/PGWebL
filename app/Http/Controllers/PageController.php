<?php

namespace App\Http\Controllers;

use App\Models\PointsModel;
use App\Models\PolygonesModel;
use App\Models\PolylinesModel;
use App\Models\User;
use Illuminate\Http\Request;


class PageController extends Controller
{
    public function __construct()
    {
        $this->points = new PointsModel();
        $this->polylines = new PolylinesModel();
        $this->polygones = new PolygonesModel();
        $this->users = new User();
    }

    public function landingpage()
    {
        $data=[
            'title' => 'PGWL',
            'points_count' => $this->points->count(),
            'polylines_count' => $this->polylines->count(),
            'polygones_count' => $this->polygones->count(),
            'users_count' => $this->users->count(),
        ];
        return view('home', $data);
    }

    public function peta()
    {
        $data=[
            'title' => 'Peta',
        ];
        return view('map', $data);
    }

    public function tabel()
    {
        $data=[
            'title' => 'Tabel',
            'points' => $this->points->all(),
            'polylines' => $this->polylines->all(),
            'polygones' => $this->polygones->all(),
        ];
        return view('table', $data);
    }

}
