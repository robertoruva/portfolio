<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenWeatherService {
	public function obtenerClima ($latitud, $longitud) {
		$apiKey = config('service.openweather.key');

		$url = "https://api.openweathermap.org/data/2.5/weather";

		$response = Http::get($url, [
			'lat'		=> $latitud,
			'long'		=> $longitud,
			'appid'		=> $apiKey,
			'units'		=> 'metric',
			'lang'		=> 'es',
		]);

		if($response->successful()) {
			return $response->json();
		}

		return null;
	}
}