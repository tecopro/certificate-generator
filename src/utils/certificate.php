<?php

/**
 * Certificate Generator
 * Technology Community
 * Periode 2020/2021
 * 
 * @package		Certificate
 * @category	Project
 * 
 * @link		https://teco.smkn1pml.sch.id/certificate
 * @author		Suluh Sulistiawan <suluh.webdevelopers@hotmail.com>
 * @author 		Sofa Machabba Haeta <mail@sofa.my.id>
 * @license		https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 */

// reference simpleimage namespace
use claviska\SimpleImage;

class Certificate
{
	/**
	 * property to create images
	 * @var SimpleImage
	 */
	private $image;

	/**
	 * class constructor
	 */
	function __construct()
	{
		// instantiate simpleimage class
		$image = new SimpleImage();
		// import skeleton file for further processing
		$skeleton = assetFile("skeleton/2020.jpg");
		$image->fromFile($skeleton);

		// set "image" property
		$this->image = $image;
	}

	/**
	 * method to set certificate header
	 * @param string $header
	 * @return Certificate
	 */
	public function setHeader($header)
	{
		$font = assetFile("madenaparlling-400.ttf", "fonts/2020");

		$this->image->text($header, [
			"fontFile" => $font,
			"size" => 325,
			"color" => "#000000",
			"anchor" => "top",
			"yOffset" => 100,
			"xOffset" => 80
		]);

		return $this;
	}

	/**
	 * method to set certificate number
	 * @param string $number
	 * @return Certificate
	 */
	public function setNumber($number)
	{
		$font = assetFile("montserrat-300.ttf", "fonts/2020");

		$this->image->text($number, [
			"fontFile" => $font,
			"size" => 48,
			"color" => "#ED1E24",
			"anchor" => "top",
			"yOffset" => 450,
			"xOffset" => 45
		]);

		return $this;
	}

	/**
	 * method to set receiver participant
	 * @param string $participant
	 * @return Certificate
	 */
	public function setGiveTo($participant)
	{
		$participant = $participant;
		$font = assetFile("montserrat-400.ttf", "fonts/2020");

		$this->image->text($participant, [
			"fontFile" => $font,
			"size" => 90,
			"color" => "#111",
			"anchor" => "top",
			"yOffset" => 600,
			"xOffset" => 80
		]);

		return $this;
	}

	/**
	 * method to set receiver name
	 * @param string $name
	 * @return Certificate
	 */
	public function setName($name)
	{
		$font = assetFile("berlinsansfbdemi-700", "fonts/2020");

		$this->image->text($name, [
			"fontFile" => $font,
			"size" => 180,
			"color" => "#3951A3",
			"anchor" => "top",
			"yOffset" => 735,
			"xOffset" => 80
		]);

		return $this;
	}

	/**
	 * method to set receiver predicate and position
	 * @param string $predicate, $position
	 * @return Certificate
	 */
	public function setPredicate($predicate, $position)
	{
		$predicate = "Dengan predikat " . $predicate . ", atas partisipasinya sebagai " . $position;
		$font = assetFile("montserrat-400.ttf", "fonts/2020");

		$this->image->text($predicate, [
			"fontFile" => $font,
			"size" => 80,
			"color" => "#111",
			"anchor" => "top",
			"yOffset" => 980,
			"xOffset" => 80
		]);

		return $this;
	}

	/**
	 * method to set organization's name
	 * @param string $teco
	 * @return Certificate
	 */
	public function setOrganization($teco)
	{
		$font = assetFile("meiryo-700.ttc", "fonts/2020");

		$this->image->text($teco, [
			"fontFile" => $font,
			"size" => 120,
			"color" => "#111",
			"anchor" => "top",
			"yOffset" => 1125,
			"xOffset" => 80
		]);

		return $this;
	}

	/**
	 * method to set receiver School's name
	 * @param string $nepal
	 * @return Certificate
	 */
	public function setSchool($nepal)
	{
		$font = assetFile("meiryo-700.ttc", "fonts/2020");

		$this->image->text($nepal, [
			"fontFile" => $font,
			"size" => 140,
			"color" => "#111",
			"anchor" => "top",
			"yOffset" => 1280,
			"xOffset" => 80
		]);

		return $this;
	}

	/**
	 * method to set period year
	 * @param string $period
	 * @return Certificate
	 */
	public function setPeriod($period)
	{
		$period = "Periode " . $period;
		$font = assetFile("montserrat-400.ttf", "fonts/2020");

		$this->image->text($period, [
			"fontFile" => $font,
			"size" => 72,
			"color" => "#111",
			"anchor" => "top right",
			"yOffset" => 425,
			"xOffset" => -135,
		]);

		return $this;
	}

	/**
	 * method to set publication date
	 * @param string $at
	 * @return Certificate
	 */
	public function setPublished($at)
	{
		$font = assetFile("montserrat-400.ttf", "fonts/2020");

		$this->image->text($at, [
			"fontFile" => $font,
			"size" => 72,
			"color" => "#111",
			"anchor" => "top",
			"yOffset" => 1500,
			"xOffset" => 150
		]);

		return $this;
	}

	/**
	 * method to set qrcode image
	 * @param mixed $qrcode
	 * @return Certificate
	 */
	public function setQrcode($qrcode)
	{
		$this->image->overlay(
			$qrcode,
			"top left",
			1,
			780,
			110
		);

		return $this;
	}

	/**
	 * method to render image to file
	 * @param string $filename
	 * @return bool
	 */
	public function toFile($filename)
	{
		$path = resolvePath(__DIR__, "..", "..", "result", "certificate", $filename);
		$this->image->toFile($path);

		return true;
	}

	/**
	 * method to render image to browser
	 * @return bool
	 */
	public function toScreen()
	{
		$this->image->toScreen();

		return true;
	}
}
