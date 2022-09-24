<?php

if (!function_exists("resolvePath")) {
	/**
	 * @param string $path
	 * @return string
	 */
	function resolvePath(...$path)
	{
		$relative = implode("/", [...$path]);
		return $relative;
	}
}

if (!function_exists("dateFormat")) {
	/**
	 * method to generate indonesian format date
	 * @param string $date
	 * @return string
	 */
	function dateFormat($date)
	{
		$month = [
			1 => "Januari",
			"Februari",
			"Maret",
			"April",
			"Mei",
			"Juni",
			"Juli",
			"Agustus",
			"September",
			"Oktober",
			"November",
			"Desember"
		];
		$explode = explode("-", $date);
		$result = [
			$explode[2],
			$month[(int) $explode[1]],
			$explode[0]
		];

		return implode(" ", $result);
	}
}

if (!function_exists("assetFile")) {
	/**
	 * method to get asset path
	 * @param string $file
	 * @param string|array $directory
	 * @return string
	 */
	function assetFile($file, $directory = null)
	{
		$path = [__DIR__, "..", "assets"];

		if (is_array($directory) && count($directory) > 0) {
			$path = [...$path, ...$directory];
		} elseif (is_string($directory)) {
			$path = [...$path, $directory];
		}
		$path = [...$path, $file];

		return resolvePath(...$path);
	}
}
