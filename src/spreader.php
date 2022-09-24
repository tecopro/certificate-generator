<?php

/**
 * Certificate Generator
 * Technology Community
 * Periode 2020/2021
 * 
 * @package		Spreader
 * @category		Project
 * 
 * @link		https://teco.smkn1pml.sch.id/certificate
 * @author		Suluh Sulistiawan <suluh.webdevelopers@hotmail.com>
 * @author 		Sofa Machabba Haeta <mail@sofa.my.id>
 * @license		https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 */

// include autoloader
require_once __DIR__ . "/../vendor/autoload.php";

// references to important namespaces
use Keboola\Csv\CsvReader;
use Hashids\Hashids;
use Dotenv\Dotenv;

class Spreader
{
	/**
	 * property to generate short unique id
	 * @var Hashids
	 */
	private $hashids;

	/**
	 * property for period
	 * @var string
	 */
	private $period;

	/**
	 * class constructor
	 */
	function __construct()
	{
		// instantiate hashids class
		$this->hashids = new Hashids("smkn1pml");

		// get environment variable
		$envpath = resolvePath(__DIR__, "..");
		$dotenv = Dotenv::createImmutable($envpath, ".env");
		$dotenv->load();

		// set value of "period" property
		$this->period = $_ENV["PERIOD"];
	}

	/**
	 * generate all certificate
	 * @return void
	 */
	public function run()
	{
		// results array
		$results = [];

		// read csv
		$directory = $this->period;
		$csv = resolvePath(__DIR__, "data", $directory, "data.csv");
		$data = new CsvReader($csv);

		foreach ($data as $index => $row) {
			// skip if index is "0"
			if ($index === 0) {
				continue;
			}

			
			$code = (int) trim($row[0]);
			$code = $this->hashids->encode($code, 220604);
			$number = trim($row[1]);
			// start - name parsing
			$name = strtolower($row[2]);
			$name = preg_replace("/\s+/", " ", $name);
			$name = str_replace(".", "", $name);
			$name = ucwords($name);
			$name = trim($name);
			// end - name parsing
			$predicate = trim($row[4]);
			$position = trim($row[5]);
			$period = str_replace("-", "/", $this->period);
			$date = dateFormat(date("Y-m-d"));

			$url = "https://teco.smkn1pml.sch.id/cert?code=" . $code;
			$qrcode = new Qrcode($url);
			$qrcode = $qrcode->render();

			$header = "Sertifikat";
			$participant = "Diberikan kepada :";
			$teco = "Technology Community";
			$nepal = "SMK Negeri 1 Pemalang";

			// instantiate new certificate class
			$certificate = new Certificate();
			// render certificate image
			$certificate
				->setHeader($header)
				->setNumber($number)
				->setGiveTo($participant)
				->setName($name)
				->setOrganization($organization)
				->setSchool($school)
				->setPredicate($predicate, $position)
				->setPeriod($period)
				->setPublished("Pemalang, " . $date)
				->setQrcode($qrcode)
				->toFile($code . ".png");

			// cli message
			echo $index . ". Successfully made a certificate for " . $name . "\n";

			// push data to results array
			array_push($results, [
				'code' => $code,
				'number' => $number,
				'name' => $name,
				'predicate' => $predicate,
				'position' => $position,
				'period' => $period,
				'date' => $date,
				'file' => $code . ".pdf"
			]);
		}

		// store results array to json
		$results = json_encode($results);
		$json = resolvePath(__DIR__, "..", "result", "data.json");
		file_put_contents($json, $results);

		// cli message
		echo "\n";
		echo "Successfully collected certificate JSON data.\n";

		// setting an environment variable
		// https://docs.github.com/en/actions/reference/workflow-commands-for-github-actions#setting-an-environment-variable
		exec("echo \"period=$directory\" >> \$GITHUB_ENV");
	}
}

try {
	echo "\n";

	// create "result" folder
	$resultDir = resolvePath(__DIR__, "..", "result");
	if (!file_exists($resultDir)) {
		mkdir($resultDir, 0777, true);
	}

	// create "certificate" folder
	$certificateDir = resolvePath($resultDir, "certificate");
	if (!file_exists($certificateDir)) {
		mkdir($certificateDir, 0777, true);
	}

	// instantiate spreader class
	$generator = new Spreader();

	// run generator
	$generator->run();
} catch (Exception $error) {
	// error handler
	echo $error->getMessage();
}
