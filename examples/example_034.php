<?php
namespace packages\tcpdf\examples;

use packages\base\Process;
use packages\tcpdf\TCPDF;

//============================================================+
// File name   : example_034.php
// Begin       : 2008-07-18
// Last Update : 2013-05-14
//
// Description : Example 034 for TCPDF class
//               Clipping
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Clipping
 * @author Nicola Asuni
 * @since 2008-03-04
 */

class Example_034 extends Process {

	public function run() {

		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 034');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 034', PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('helvetica', 'B', 20);

		// add a page
		$pdf->AddPage();

		$pdf->Write(0, 'Image Clipping using geometric functions', '', 0, 'C', 1, 0, false, false, 0);

		//Start Graphic Transformation
		$pdf->StartTransform();

		// set clipping mask
		$pdf->StarPolygon(105, 100, 30, 10, 3, 0, 1, 'CNZ');

		// draw jpeg image to be clipped
		$pdf->Image(__DIR__ . '/images/image_demo.jpg', 75, 70, 60, 60, '', 'http://www.tcpdf.org', '', true, 72);

		//Stop Graphic Transformation
		$pdf->StopTransform();

		// ---------------------------------------------------------

		//Close and output PDF document
		$pdf->Output('example_034.pdf', 'F');
	}
}

//============================================================+
// END OF FILE
//============================================================+
