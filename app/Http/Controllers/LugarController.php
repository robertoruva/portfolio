<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLugarRequest;
use App\Http\Requests\UpdateLugarRequest;
use App\Models\Lugar;
use App\Services\OpenCageService;
use App\Services\OpenWeatherService;
use Illuminate\Http\Request;

class LugarController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		$lugares = Lugar::all();

		return view('lugares.index', compact('lugares'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create() {
		return view('lugares.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreLugarRequest $request, OpenCageService $geoService, OpenWeatherService $weatherService) {
		dd($request);
		$validated = Lugar::create($request->validated());

		$coordenadas = $geoService->obtenerCoordenadas($validated['nombre'], $validated['pais'], $validated['codigo_postal']);
		if (!$coordenadas) {
			return redirect()->back()->with('error', 'No se pudieron obtener las coordenadas. Revisa los datos introducidos.');
		}

		$lugar = Lugar::create([
			'nombre'	=> $validated['nombre'],
			'pais'		=> $validated['pais'],
			'codigo_postal' => $validated['codigo_postal'],
			'latitud'   => $coordenadas['latitud'],
			'longitud'  => $coordenadas['longitud'],
		]);

		$clima = $weatherService->obtenerClima($lugar->latitud, $lugar->longitud);
		
		if (strtolower($clima['name']) !== strtolower($lugar->nombre)) {
			return redirect()->back()->with('warning', 'Las coordenadas no parecen corresponder a ' . $lugar->nombre);
		}
		
		if($clima) {
			$lugar->update([
				'temperatura_actual'   => $clima['main']['temp'],
				'humedad'              => $clima['main']['humidity'],
				'estado_clima'         => $clima['weather'][0]['description'],
				'ultima_actualizacion' => now(),
			]);
		} else {
			return redirect()->route('lugares.index')->with('warning', 'Lugar creado, pero no se pudo obtener el clima.');
		}
		return redirect()->route('lugares.index')->with('success', 'Lugar creado');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Lugar $lugar) {
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Lugar $lugar) {
		return view('lugares.edit', compact('lugar'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateLugarRequest $request, Lugar $lugar) {
		$lugar->update($request->validated());

		return redirect()->route('lugares.index')->with('success', 'Lugar actualizado');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Lugar $lugar) {
		//
	}
}
