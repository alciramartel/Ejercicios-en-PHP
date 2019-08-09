<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class distancia extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('datos_model');
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->database('default');

		if($this->session->userdata('usuario') == null)
			redirect(base_url());
	}
 
	public function index()
	{
        $this->load->view('header_view');
        $this->load->view('distancia_view');
        $this->load->view('footer_view');
	}
}