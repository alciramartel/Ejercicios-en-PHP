<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class utileria extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('encrypt');
        $key = "62D51";
    }

    function encriptar($texto)
    {
        $this->init();
        $pswd = $this->encrypt->encode($texto, $key);
        return $pswd;
    }

    function desencriptar($texto)
    {
        $this->init();
        $plaintext = $this->encrypt->decode($texto, $key);
        return $plaintext;
    }

    function init(){
        $this->encryption->initialize(
            array(
                'cipher' => 'aes-256',
                'mode' => 'ctr',
                'key' => '62D51'
            )
        );
    }
}

?>