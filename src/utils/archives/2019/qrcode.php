<?php

/**
 * Certificate Generator
 * Technology Community
 * Periode 2019/2020
 * 
 * @package		Qrcode
 * @category	Project
 * 
 * @link		https://teco.smkn1pml.sch.id/certificate
 * @author		Suluh Sulistiawan <suluh.webdevelopers@hotmail.com>
 * @license		https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 */

// reference qrcode namespace
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class Qrcode
{
	/**
	 * property to hold text to be qrcode
	 * @var string
	 */
	private $text;

	/**
	 * property for qrcode result size
	 * @var int
	 */
	private $size;

	/**
	 * property for qrcode result margin
	 * @var int
	 */
	private $margin;

	/**
	 * class constructor
	 */
	function __construct($text, $size = 400, $margin = 30)
	{
		// set value of property
		$this->text = $text;
		$this->size = $size;
		$this->margin = $margin;
	}

	/**
	 * method to make qrcode into data uri
	 * @return mixed
	 */
	public function render()
	{
		$writer = new PngWriter();
		$encoding = new Encoding("UTF-8");
		$errorCorrection = new ErrorCorrectionLevelLow();
		$roundBlock = new RoundBlockSizeModeMargin();

		$qrcode = Builder::create()
			->writer($writer)
			->data($this->text)
			->encoding($encoding)
			->errorCorrectionLevel($errorCorrection)
			->size($this->size)
			->margin($this->margin)
			->roundBlockSizeMode($roundBlock)
			->build();

		$result = $qrcode->getDataUri();
		return $result;
	}
}
