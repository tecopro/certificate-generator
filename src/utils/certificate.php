<?php

/**
 * Certificate Generator
 * Technology Community
 * Periode 2019/2020
 * 
 * @package		Certificate
 * @category	Project
 * 
 * @link		https://teco.smkn1pml.sch.id/certificate
 * @author		Suluh Sulistiawan <suluh.webdevelopers@hotmail.com>
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
		$skeleton = assetFile("skeleton.jpg");
		$image->fromFile($skeleton);

		// set "image" property
		$this->image = $image;
	}

	/**
	 * method to set certificate number
	 * @param string $number
	 * @return Certificate
	 */
	public function setNumber($number)
	{
		$font = assetFile("montserrat-300.ttf", "fonts");

		$this->image->text($number, [
			"fontFile" => $font,
			"size" => 48,
			"color" => "#ED1E24",
			"anchor" => "top",
			"yOffset" => 879
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
		$font = assetFile("greatvibes-400.ttf", "fonts");

		$this->image->text($name, [
			"fontFile" => $font,
			"size" => 180,
			"color" => "#3951A3",
			"anchor" => "top",
			"yOffset" => 1223
		]);

		return $this;
	}

	/**
	 * method to set receiver predicate
	 * @param string $predicate
	 * @return Certificate
	 */
	public function setPredicate($predicate)
	{
		$predicate = "Dengan Predikat " . $predicate;
		$font = assetFile("montserrat-400.ttf", "fonts");

		$this->image->text($predicate, [
			"fontFile" => $font,
			"size" => 72,
			"color" => "#111",
			"anchor" => "top",
			"yOffset" => 1458
		]);

		return $this;
	}

	/**
	 * method to set receiver position
	 * @param string $position
	 * @return Certificate
	 */
	public function setPosition($position)
	{
		$position = "Atas partisipasinya sebagai " . $position;
		$font = assetFile("montserrat-400.ttf", "fonts");

		$this->image->text($position, [
			"fontFile" => $font,
			"size" => 72,
			"color" => "#111",
			"anchor" => "top",
			"yOffset" => 1645
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
		$font = assetFile("montserrat-400.ttf", "fonts");

		$this->image->text($period, [
			"fontFile" => $font,
			"size" => 72,
			"color" => "#111",
			"anchor" => "top",
			"yOffset" => 1925
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
		$font = assetFile("montserrat-400.ttf", "fonts");

		$this->image->text($at, [
			"fontFile" => $font,
			"size" => 72,
			"color" => "#111",
			"anchor" => "top",
			"yOffset" => 2165
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
			"top right",
			1,
			-180,
			180
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
