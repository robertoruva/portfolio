<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLugarRequest;
use App\Http\Requests\UpdateLugarRequest;
use App\Models\Lugar;
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
	public function store(StoreLugarRequest $request) {
		Lugar::create($request->validated());

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
