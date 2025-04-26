<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenCageService {
	public function obtenerCoordenadas($nombre, $pais, $codigoPostal) {
		$apiKey = config('services.opencage.key');

		$query = "{$nombre}, {$codigoPostal}, {$pais}";

		$response = Http::get("https://api.opencagedata.com/geocode/v1/json", [
			'q' 		=> $query,
			'key'		=> $apiKey,
			'limit' 	=> 1,
			'language' 	=> 'es',
		]);

		if ($response->successful() && isset($response->json()['results'][0])) {
			$resultado = $response->json()['results'][0]['geometry'];

			return [
				'latitud' 	=> $resultado['lat'],
				'longitud' 	=> $resultado['lng'],
			];
		}

		return null;
	}
}

