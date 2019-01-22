<?php
namespace App\Helpers;

class Helper {
	public static function uploadFile($nombre, $ruta) {
		request()->file($nombre)->store($ruta);
		return request()->file($nombre)->hashName();
	}
}