<?php
Yii::import('ext.fpdf.fpdf', true);

class Certificate extends FPDF {
	private $name;

	function __construct($name) {
		parent::__construct();

		$name = mb_convert_case($name, MB_CASE_TITLE);
		$name = strtr($name, array(' De ' => ' de ', ' Da ' => ' da ', ' Do ' => ' do ', ' Das ' => ' das ', ' Dos ' => ' dos ', ' E ' => ' e '));

		$this->name = $name;
	}

	function Header() {
		$this->Image(YiiBase::getPathOfAlias('webroot.img').'/certificado.png', 0, 0, 297, 210);
	}

	function generate() {
		$this->AddPage('L', 'A4');
		$this->SetXY(20, 63);
		$this->SetFont('Arial', 'B', 40);
		$this->MultiCell(257, (strlen($this->name) > 35)? 13 : 25, $this->name, 0, 'C');
	}
}