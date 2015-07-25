<?php

/**
* PdfModel
* Handles users profile data
*/

require 'application/libs/vendor/autoload.php';

class PdfModel{
	/**
	* Constructor, expects a Database connection
	* @param Database $db The Database object
	*/
	public function __construct(Database $db){
		$this->db = $db;
	}

	public function viewPDF(){	
		// Parse pdf file and build necessary objects.
		$parser = new \Smalot\PdfParser\Parser();
		$pdf    = $parser->parseFile(URL.'/public/tariffs/document.pdf');
		 
		$text = $pdf->getText();
		echo "<code>";
		echo "<pre>";
		echo $text;
		echo "</pre>";
		echo "</code>";
	}

	/**
	* Get a user's profile details, according to the given $user_id
	* @param int $user_id The user's id
	* @return object/null The selected user's profile data
	*/
	public function getUserPdf($user_id){
		$sql = "SELECT user_fname, user_surname, user_id, user_name, user_email, user_active, user_has_avatar
                FROM users WHERE user_id = :user_id";
		$sth = $this->db->prepare($sql);
		$sth->execute(array(':user_id' => $user_id));
		
		$user = $sth->fetch();
		$count =  $sth->rowCount();

		if ($count == 1) {
		    if (USE_GRAVATAR) {
			$user->user_avatar_link = $this->getGravatarLinkFromEmail($user->user_email);
		    } else {
			$user->user_avatar_link = $this->getUserAvatarLocalFilePath($user->user_has_avatar, $user->user_id);
		    }
		} else {
		    $_SESSION["feedback_negative"][] = FEEDBACK_USER_DOES_NOT_EXIST;
		}

		return $user;
	}
	
	/**
	* Get Store details, according to the given $user_id
	* @param int $user_id The user's id
	* @return object/null The selected user's store details
	*/
	public function pdf_test($aid_holder_id, $message){

        $sql = "SELECT * FROM ".PREFIX."aid_holder WHERE aid_holder_id = ".$aid_holder_id;
        $query = $this->db->prepare($sql);
        $query->execute();
		$result = $query->fetchAll();

		$aid_holder_details = $result[0];
		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Kwasi Kgwete');
		$pdf->SetTitle('Statement');
		$pdf->SetSubject('Medical Statement');
		$pdf->SetKeywords('Statement, PDF, medical, test, guide');

		// set default header data
		//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Medical Statement", "for Aid Holder \nwww.medisuit.co.za");
		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, 50, "Medical Statement".' 001', "for ".$aid_holder_details->initials." ".$aid_holder_details->surname."\nwww.medion.co.za", array(0,64,255), array(0,64,128));
		$pdf->setFooterData(array(0,64,0), array(0,64,128));

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

		// set default font subsetting mode
		$pdf->setFontSubsetting(true);

		// Set font
		// dejavusans is a UTF-8 Unicode font, if you only need to
		// print standard ASCII chars, you can use core fonts like
		// helvetica or times to reduce file size.
		$pdf->SetFont('dejavusans', '', 14, '', true);

		// Add a page
		// This method has several options, check the source code documentation for more information.
		$pdf->AddPage();

		// set text shadow effect
		$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

		$html = '
		<table>
			<tr>
				<th>
					<h2 >Narayani Pillay</h2>
					<p>PHYSIOTHERAPIST <br>
					BSc. Hons Physio (UDW) <br>
					Sports Medicine (WITS) <br>
					OMT <br>
					<b>PR: 072 00 037186</b><br>
					</p>
				</th>
				<th><table border="1" cellspacing="2" cellpadding="3" style="float: right; width: 100%; border: 1px solid black; font-size: 14px;" >
					<tbody>
						<tr>
							<td><b>DATE</b></td>
							<td>'.date('Y-m-d').'</td>
						</tr>
						<tr>
							<td><b>ACC. NO.</b></td>
							<td>00002
							</td>
						</tr>
						<tr>
							<td><b>MEDICAL AID</b></td>
							<td>World Bank <br>
								67873287893
							</td>
						</tr>
						<tr>
							<td><b>AUTH CODE</b></td>
							<td>01213</td>
						</tr>
						<tr>
							<td><b>PATIENT</b></td>
							<td>'.$aid_holder_details->initials.' '.$aid_holder_details->surname.'<br>
								201211265728827
							</td>
						</tr>
						<tr>
							<td><b>REF. DOCTOR</b></td>
							<td>Dr Morgan</td>
						</tr>												
					</tbody>
				</table></th>
			</tr>
		</table>
		';

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');

		$html = '
		<table border="1" cellspacing="1" cellpadding="3" style="float: right; width: 100%; border: 1px solid black; font-size: 13px;">
			<thead>
			<tr>
				<th><b>DATE</b></th><th><b>CODE</b></th><th><b>PROCEDURE</b></th><th><b>DEBIT</b></th><th><b>CREDIT</b></th>
			</tr>
			</thead>
			<tbody>
				<tr>
					<td>wtf</td> <td>CODE</td> <td>PROCEDURE</td> <td>DEBIT</td> <td>CREDIT</td>
				</tr>
				<tr>
					<td>DATE</td> <td>CODE</td> <td>PROCEDURE</td> <td>DEBIT</td> <td>CREDIT</td>
				</tr>				
			</tbody>
		</table>
		<table>
			<tr>
				<th>
				</th>
				<th><table border="1" cellspacing="1" cellpadding="3" style="float: right; width: 100%; border: 1px solid black; font-size: 13px;" >
					<tbody>
						<tr>
							<td><b>total</b></td>
							<td>R 673.00</td>
						</tr>												
					</tbody>
				</table></th>
			</tr>
		</table>';

		
		$pdf->writeHTML($html, true, false, true, false, '');

		$html = '
		<br><br>
		<table border="1" cellspacing="1" cellpadding="3" style="float: right; width: 100%; border: 1px solid black; font-size: 13px;">
			<thead>
			<tr>
				<th><b>120 DAYS</b></th><th><b>90 DAYS</b></th><th><b>60 DAYS</b></th><th><b>30 DAYS</b></th><th><b>CURRENT</b></th><th><b>TOTAL</b></th>
			</tr>
			</thead>
			<tbody>
				<tr>
					<td>0.00</td> <td>0.00</td> <td>0.00</td> <td>0.00</td> <td>170.00</td> <td>170.00</td>
				</tr>
			</tbody>
		</table>
		';

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');		

		// ---------------------------------------------------------

		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$pdf->Output('example_001.pdf', 'I');

		//============================================================+
		// END OF FILE
		//============================================================+
	}
	
	/**
	* Get Store details, according to the given $user_id
	* @param int $user_id The user's id
	* @return object/null The selected user's store details
	*/
	public function get_pdf_statement($aid_holder_id, $patient_id, $message){

        $sql = "SELECT * FROM ".PREFIX."aid_holder WHERE aid_holder_id = ".$aid_holder_id;
        $query = $this->db->prepare($sql);
        $query->execute();
		$result = $query->fetchAll();

		$aid_holder_details = $result[0];

        $sql = "SELECT * FROM ".PREFIX."patient WHERE patient_id = ".$patient_id;
        $query = $this->db->prepare($sql);
        $query->execute();
		$result = $query->fetchAll();

		$patient_details = $result[0];

		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Medi Software Solutions');
		$pdf->SetTitle('Statement');
		$pdf->SetSubject('Medical Statement');
		$pdf->SetKeywords('Statement, PDF, medical, test, guide');

		// set default header data
		//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Medical Statement", "for Aid Holder \nwww.medisuit.co.za");
		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, 50, "Medical Statement".' 001', "for ".$aid_holder_details->initials." ".$aid_holder_details->surname."\nwww.medion.co.za", array(0,64,255), array(0,64,128));
		$pdf->setFooterData(array(0,64,0), array(0,64,128));

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

		// set default font subsetting mode
		$pdf->setFontSubsetting(true);

		// Set font
		// dejavusans is a UTF-8 Unicode font, if you only need to
		// print standard ASCII chars, you can use core fonts like
		// helvetica or times to reduce file size.
		$pdf->SetFont('dejavusans', '', 14, '', true);

		// Add a page
		// This method has several options, check the source code documentation for more information.
		$pdf->AddPage();

		// set text shadow effect
		$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

		$html = '
		<table>
			<tr>
				<th>
					<h2 >Narayani Pillay</h2>
					<p>PHYSIOTHERAPIST <br>
					BSc. Hons Physio (UDW) <br>
					Sports Medicine (WITS) <br>
					OMT <br>
					<b>PR: 072 00 037186</b><br>
					</p>
				</th>
				<th><table border="1" cellspacing="2" cellpadding="3" style="float: right; width: 100%; border: 1px solid black; font-size: 14px;" >
					<tbody>
						<tr>
							<td><b>DATE</b></td>
							<td>'.date('Y-m-d').'</td>
						</tr>
						<tr>
							<td><b>ACC. NO.</b></td>
							<td>0000'.$aid_holder_details->aid_holder_id.'
							</td>
						</tr>
						<tr>
							<td><b>MEDICAL AID</b></td>
							<td>'.$aid_holder_details->medical_aid.'<br>
								'.$aid_holder_details->medical_aid_number.'
							</td>
						</tr>
						<tr>
							<td><b>AUTH CODE</b></td>
							<td>'.$aid_holder_details->authorisation_code.'</td>
						</tr>
						<tr>
							<td><b>PATIENT</b></td>
							<td>'.$aid_holder_details->initials.' '.$aid_holder_details->surname.'<br>
								201211265728827
							</td>
						</tr>
						<tr>
							<td><b>REF. DOCTOR</b></td>
							<td>Dr Morgan</td>
						</tr>												
					</tbody>
				</table></th>
			</tr>
		</table>
		';

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');

		$html = '
		<table border="1" cellspacing="1" cellpadding="3" style="float: right; width: 100%; border: 1px solid black; font-size: 13px;">
			<thead>
			<tr>
				<th><b>DATE</b></th><th><b>CODE</b></th><th><b>PROCEDURE</b></th><th><b>DEBIT</b></th><th><b>CREDIT</b></th>
			</tr>
			</thead>
			<tbody>
				<tr>
					<td>wtf</td> <td>CODE</td> <td>PROCEDURE</td> <td>DEBIT</td> <td>CREDIT</td>
				</tr>
				<tr>
					<td>DATE</td> <td>CODE</td> <td>PROCEDURE</td> <td>DEBIT</td> <td>CREDIT</td>
				</tr>				
			</tbody>
		</table>
		<table>
			<tr>
				<th>
				</th>
				<th><table border="1" cellspacing="1" cellpadding="3" style="float: right; width: 100%; border: 1px solid black; font-size: 13px;" >
					<tbody>
						<tr>
							<td><b>total</b></td>
							<td>R 673.00</td>
						</tr>												
					</tbody>
				</table></th>
			</tr>
		</table>';

		
		$pdf->writeHTML($html, true, false, true, false, '');

		$html = '
		<br><br>
		<table border="1" cellspacing="1" cellpadding="3" style="float: right; width: 100%; border: 1px solid black; font-size: 13px;">
			<thead>
			<tr>
				<th><b>120 DAYS</b></th><th><b>90 DAYS</b></th><th><b>60 DAYS</b></th><th><b>30 DAYS</b></th><th><b>CURRENT</b></th><th><b>TOTAL</b></th>
			</tr>
			</thead>
			<tbody>
				<tr>
					<td>0.00</td> <td>0.00</td> <td>0.00</td> <td>0.00</td> <td>170.00</td> <td>170.00</td>
				</tr>
			</tbody>
		</table>
		';

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');		

		// ---------------------------------------------------------

		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$pdf->Output('example_001.pdf', 'I');

		//============================================================+
		// END OF FILE
		//============================================================+
	}	
}
