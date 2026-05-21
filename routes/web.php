<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\PolylinesController;
use App\Http\Controllers\PolygonsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'landingpage'])->name('home');

Route::get('/peta', [PageController::class, 'peta'])
->middleware(['auth', 'verified'])
->name('peta');
    
Route::get('/tabel', [PageController::class, 'tabel'])->name('tabel');

// points
Route::post('/store-points', [PointsController::class, 'store'])
->name('points.store');

# delete points
Route::delete('/delete-points/{id}', [PointsController::class, 'destroy'])
->name('points.delete');

# edit points
Route::get('/edit-point/{id}', [PointsController::class, 'edit'])
->name('point.edit');

# route untuk update points
Route::patch('/update-point/{id}', [PointsController::class, 'update'])
->name('point.update');

// polylines
Route::post('/store-polylines', [PolylinesController::class, 'store'])
->name('polylines.store');

Route::delete('/delete-polylines/{id}', [PolylinesController::class, 'destroy'])
->name('polylines.delete');

# edit polylines
Route::get('/edit-polyline/{id}', [PolylinesController::class, 'edit'])
->name('polyline.edit');

# route untuk update polylines
Route::patch('/update-polyline/{id}', [PolylinesController::class, 'update'])
->name('polyline.update');

// polygons
Route::post('/store-polygons', [PolygonsController::class, 'store'])
->name('polygons.store');

Route::delete('/delete-polygons/{id}', [PolygonsController::class, 'destroy'])
->name('polygons.delete');

# edit polygons
Route::get('/edit-polygon/{id}', [PolygonsController::class, 'edit'])
->name('polygon.edit');

# route untuk update polygons
Route::patch('/update-polygon/{id}', [PolygonsController::class, 'update'])
->name('polygon.update');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/settings.php';
