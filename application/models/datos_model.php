<?php
Class datos_model extends CI_Model
{
    function guardarUsuario($usuarioid, $data)
    {
        try{
			if($usuarioid == 0){
				$this->db->insert('usuario', $data);
			}
			else{
				$this -> db -> where("UsuarioId",$usuarioid);
				$this->db->update('usuario', $data); 
			}

			return true;
		}
		catch(Exception $e){
        	echo $e->getMessage();
    	}
	}
}
?>