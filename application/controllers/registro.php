<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class registro extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('datos_model');
		#$this->load->library('encrypt');
		$this->load->library(array('session', 'form_validation', 'encrypt'));
		$this->load->helper(array('url','form'));
		$this->load->database('default');
	}

	public function index()
	{
		$this->load->view('registro_view');
	}

	public function  guardar(){
		$base = $_SERVER['DOCUMENT_ROOT']."/actividades";
		$path = "/assets/uploads/perfiles/";
		$pswd = $_POST["Password"];#$this->encrypt->encode($_POST["Password"]);
		//$file = basename($_FILES["file"]["name"]);
		$file = $_POST['file'];
		$fileName = $_POST['filename'];
		$serverFile = time().$fileName;
		#file_put_contents($path.$serverFile, base64_decode($file));
		#var_dump($file);
		$fp = fopen($base.$path.$serverFile,'w'); //Prepends timestamp to prevent overwriting
		fwrite($fp, base64_decode($file));
		fclose($fp);
		//echo $this->$path.$file;
		$datos = array(
			"Matricula" => $_POST["Matricula"], 
			"Contrasena" => $pswd, 
			"Correo" => $_POST["Correo"], 
			"Nombre" => $_POST["Nombre"], 
			"Apellido" => $_POST["Apellido"],
			"SitioWeb" => $_POST["Sitio"],
			"Descripcion" => $_POST["Descripcion"],
			"imgPerfil " => $path.$serverFile
		);
		#var_dump($datos);
		#return;
		$resp = $this->datos_model->guardarUsuario(0,$datos);
		echo $resp; 
	}
}
?>