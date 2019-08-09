<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class archivo extends CI_Controller {
	var $path;
	function __construct() 
	{
		parent::__construct();
		$this->load->model('datos_model');
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->database('default');
		$this->path = "assets/uploads/creados";

		if($this->session->userdata('usuario') == null)
			redirect(base_url());
	}
 
	public function index()
	{
        $this->load->view('header_view');
        $this->load->view('archivo_view');
        $this->load->view('footer_view');
        #$this->createword("Procedimientos y Métodos");
	}

	public function crear(){

	}

	function createword($filename){
		// Create new COM object – word.application
		$word = new COM("word.application");

		// Hide MS Word application window
		$word->Visible = 0;

		//Create new document
		$word->Documents->Add();

		// Define page margins 
		$word->Selection->PageSetup->LeftMargin = '2';
		$word->Selection->PageSetup->RightMargin = '2';

		// Define font settings
		$word->Selection->Font->Name = 'Arial';
		$word->Selection->Font->Size = 10;

		// Add text
		$word->Selection->TypeText("TEXT!");

		// Save document
		//$filename = tempnam($basePath.$path, "word");
		$word->Documents[1]->SaveAs($path.$filename);

		// Close and quit
		$word->quit();
		unset($word);
		return base_url().$path.$filename;
	}
}
?>