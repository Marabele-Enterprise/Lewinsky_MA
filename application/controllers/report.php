<?php
/**
* Class Report
* The report controller
*/

class Report extends Controller {
	/**
	* Construct this object by extending the basic Controller class
	*/
	public function __construct() {
		Auth::handleLogin();
		
		parent::__construct();
	}
	
	/**
	* Entry page into this controller
	*/
	public function index() {
		$this->view->render("report/index");
	}
	
	public function age_analysis() {
		$this->view->render("report/age_analysis");
	}
	
	public function transaction_summary() {
		$this->view->render("report/transaction_summary");
	}
	
	public function audit_trail() {
		$this->view->render("report/audit_trail");
	}
	
	public function daily_listing() {
		$this->view->render("report/daily_listing");
	}
	
	public function payment_profile() {
		$this->view->render("report/payment_profile");
	}
	
	public function vat_report() {
		$this->view->render("report/vat_report");
	}
	
	public function statements() {
		$this->view->render("report/statements");
	}
}
