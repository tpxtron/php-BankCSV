<?php

class BankCSV {

	const TYPE_UNKNOWN = 0;
	const TYPE_COBA = 1;
	const TYPE_DIBA = 2;
	const TYPE_SPK_CSV_GENERIC = 3;
	const TYPE_SPK_CSV_CAMT = 4;
	const TYPE_SPK_CSV_MT940 = 5;
	const TYPE_SPK_MT940 = 6;
	const TYPE_SPK_CAMT52 = 7;

	public function __construct() {

	}

	/**
	 * Parse CSV from file
	 *
	 * String $filename the full path to the filename
	 */
	public function parseCSV($filename, $type = self::TYPE_UNKNOWN) {
		if($type === self::TYPE_UNKNOWN || $type === null) $type = $this->getTypeByFilename($filename);
	
		var_dump($type);

	}

	public function getTypeByFilename($filename) {
		$basename = basename($filename);

		$type = self::TYPE_UNKNOWN;

		if(preg_match("/^Umsaetze_KtoNr(.*)\.csv$/i",$basename)) {
			// CoBa
			$type = self::TYPE_COBA;
		}
		else if(preg_match("/^Umsatzanzeige_(.*)\.csv$/i",$basename)) {
			// DiBa
			$type = self::TYPE_DIBA;
		}
		else if(preg_match("/^\d{8}\-(.*)\-umsatz\.csv$/i",$basename)) {
			// SPK CSV-CAMT oder CSV-MT940
			$type = self::TYPE_SPK_CSV_GENERIC;
		}
		else if(preg_match("/^\d{8}\-(.*)\-umsMT940\.txt$/i",$basename)) {
			// SPK MT940
			$type = self::TYPE_SPK_MT940;
		}
		else if(preg_match("/^\d{8}\-\d{8}\-(.*)\-camt52Booked\.zip$/i",$basename)) {
			// SPK CAMT52
			$type = self::TYPE_SPK_CAMT52;
		}

		return $type;
	}

}
