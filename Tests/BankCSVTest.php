<?php
require_once("BankCSV.class.php");

class testBankcsv extends PHPUnit_Framework_TestCase
{
	public function setUp() {
		$this->bankcsv = new BankCSV();
	}

	public function testGetTypeByFilenameReturnsCorrectTypeForCOBA()
	{
		$this->assertEquals(BankCSV::TYPE_COBA,$this->bankcsv->getTypeByFilename("Umsaetze_KtoNr123456789_EUR_13-07-2014_1949.CSV"));
	}

	public function testGetTypeByFilenameReturnsCorrectTypeForDIBA()
	{
		$this->assertEquals(BankCSV::TYPE_DIBA,$this->bankcsv->getTypeByFilename("Umsatzanzeige_1234567890_20140713.csv"));
	}

	public function testGetTypeByFilenameReturnsCorrectTypeForSPK_CAMT52()
	{
		$this->assertEquals(BankCSV::TYPE_SPK_CAMT52,$this->bankcsv->getTypeByFilename("20140702-20140711-12345678-camt52Booked.zip"));
	}

	public function testGetTypeByFilenameReturnsCorrectTypeForSPK_CSV_GENERIC()
	{
		$this->assertEquals(BankCSV::TYPE_SPK_CSV_GENERIC,$this->bankcsv->getTypeByFilename("20140713-12345678-umsatz.csv"));
	}

	public function testGetTypeByFilenameReturnsCorrectTypeForSPK_MT940()
	{
		$this->assertEquals(BankCSV::TYPE_SPK_MT940,$this->bankcsv->getTypeByFilename("20140713-12345678-umsMT940.txt"));
	}

}

