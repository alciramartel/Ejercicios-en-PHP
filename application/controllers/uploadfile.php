<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class uploadfile extends CI_Controller {
	var $path;
	function __construct() 
	{
		parent::__construct();
		$this->load->model('datos_model');
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->database('default');
		$this->path = "assets/uploads/files";

		if($this->session->userdata('usuario') == null)
			redirect(base_url());
	}
 
	public function index()
	{
        $this->load->view('header_view');
        $this->load->view('uploadfile_view');
        $this->load->view('footer_view');
	}

	public function uploadFiles(){
		$name = $_POST["name"];
		$file = $_POST["file"];
		$filepath = $this->path.'/'.$name;
		if(!file_exists($filepath)){
			$fp = fopen($filepath,'w');
			fwrite($fp, base64_decode($file));
			fclose($fp);
		}
		echo "Ok";
	}

	public function readFiles(){
		$path    = $this->path;
		$files = scandir($path);
		$files = array_diff(scandir($path), array('.', '..'));
		$archivos = array();
		foreach ($files as $i => $value) {
		 	$archivos[] = array(
		 		"Nombre" => $value,
		 		"Url" => base_url().$path.'/'.$value
		 	);
		 } 
		echo json_encode($archivos);
	}

	public function deleteFile(){
		$file_name = $_POST["file"];
		$filepath = $this->path.'/'.$file_name;
		if(file_exists($filepath)){
			unlink($filepath);
		}
		echo "imagen eliminado";
	}
}
?>