<?php

class BankCSV {

	public const TYPE_UNKNOWN = 0;
	public const TYPE_COBA = 1;
	public const TYPE_DIBA = 2;
	public const TYPE_SPK_CSV_GENERIC = 3;
	public const TYPE_SPK_CSV_CAMT = 4;
	public const TYPE_SPK_CSV_MT940 = 5;
	public const TYPE_SPK_MT940 = 6;
	public const TYPE_SPK_CAMT52 = 7:

	public function __construct() {

	}

	/**
	 * Parse CSV from file
	 *
	 * String $filename the full path to the filename
	 */
	public function parseCSV(String $filename) {
		$type = $this->TYPE_UNKNOWN;

		if(preg_match("/^Umsaetze_KtoNr(.*)\.csv/i",$filename)) {
			// CoBa
			$type = $this->TYPE_COBA;
		}
		else if(preg_match("/^Umsatzanzeige_(.*)\.csv/i",$filename)) {
			// DiBa
			$type = $this->TYPE_DIBA;
		}
		else if(preg_match("/^\d{8}\-(.*)\-umsatz\.csv/i",$filename)) {
			// SPK CSV-CAMT oder CSV-MT940
			$type = $this->TYPE_SPK_CSV_GENERIC;
		}
		else if(preg_match("/^\d{8}\-(.*)\-umsMT940\.txt/i",$filename)) {
			// SPK MT940
			$type = $this->TYPE_SPK_MT940;
		}
		else if(preg_match("/^\d{8}\-\d{8}\-(.*)\-camt52Booked\.txt/i",$filename)) {
			// SPK CAMT52
			$type = $this->TYPE_SPK_CAMT52;
		}
	
		$rawData = file_get_contents($filename);

	}

}
