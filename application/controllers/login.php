<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('login_model');
		#$this->load->library('encrypt');
		$this->load->library(array('session', 'form_validation', 'encrypt'));
		$this->load->helper(array('url','form'));
		$this->load->database('default');
    }
	
	public function index()
	{	
		if($this->session->userdata('usuario') != null){
			redirect('index', 'refresh');
		}
		else {
			$this->session->sess_destroy();
			$this->load->view('login_view');
		}
	}

	public function validarusuario()
	{
		#$Usuario =$_POST["Usuario"];
  		#$Contra =$_POST["Password"]; 
  		$this->load->library('form_validation');
  		$this->form_validation->set_rules('matricula', 'Matricula', 'trim|required|xss_clean');
   		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_inciarsesion');
   		$acceso = $this->form_validation->run();
   		
   		if($acceso == false){
   			$this->load->view('login_view');
   		}
   		else{
   			$this->session->set_flashdata('usuario', $this->input->post('usuario'));
   			#$data['usuario'] = $this->session->flashdata('usuario');
   			#$this->session->set_userdata('usuario', $this->input->post('usuario'));
   			$this->load->view('header_view');
      		$this->load->view('footer_view');
      		redirect('index', 'refresh');
   		}
	}
	
	function logout_ci()
	{
		$this->session->sess_destroy();
		#$this->index();
		#$this->load->view('login_view');
		
		redirect('login', 'refresh');
	}

	function inciarsesion($password){
		#$this->encrypt->initialize();
		#$pswd = $this->encrypt->encode($password);
		#$plaintext_string = $this->encrypt->decode($pswd);
		$username = $this->input->post('matricula');
		$result = $this->login_model->login($username, $password);
		if($result == null){
			$this->form_validation->set_message('inciarsesion', 'Matrícula y/o Contraseña invalidos.');
			return fasle;
		}
		$this->session->set_userdata('usuario', $result);
		return true;
	}
}
?>