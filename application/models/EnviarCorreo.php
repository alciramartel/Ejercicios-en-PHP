<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EnviarCorreo extends CI_Model {

    function enviar($Configuraciones)
    {
        $config = Array(
            'protocol'   => 'smtp',
            'smtp_host'  => $this->config->item('host'),
            'smtp_port'  => $this->config->item('puerto'),
            'smtp_user'  => $this->config->item('correo'),
            'smtp_pass'  => $this->config->item('pass'),
            'mailtype'   => 'html', 
            'charset'    => 'utf-8',
            'validation' => TRUE
        );

        $Conf = json_decode($Configuraciones,TRUE);
        

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        
        $this->email->from($this->config->item('correo'), 'CRM CSL');
        $this->email->to($Conf["correo"]);
        $this->email->subject($Conf["asunto"]);
        $mensaje = '';
        if ($Conf["conformato"])
        {
            $data = $Conf["datos"];
            $mensaje = $this->load->view($Conf["formato"],$data,TRUE);
        }
        else
            $mensaje = $Conf["mensaje"];

        $this->email->message($mensaje);

        if(array_key_exists("adjuntos", $Conf))
        {
            foreach ($Conf["adjuntos"] as $value) {
                $this->email->attach($value);
            }
        }

        $res = '';
        if ($this->email->send())
            $res = "El correo ha sido enviado";
        else
            $res = "<p>Ocurrio un problema al enviar el correo<br/>".$this->email->print_debugger()."</p>";
        //con esto podemos ver el resultado
        //var_dump($this->email->print_debugger());
        return $res;
    }
       
}

?>