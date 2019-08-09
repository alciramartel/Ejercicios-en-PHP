<?php
Class login_model extends CI_Model{
  function login($username, $password){
    $this -> db -> select('*');
    $this -> db -> from('Usuario');
    $this -> db -> where('Matricula', $username);
    $this -> db -> where('Contrasena', $password);
    $this -> db -> limit(1);
    
    $query = $this -> db -> get();
    
    if($query -> num_rows() == 1)
    {
      return $query->result()[0];
    }
    else
    {
      return null;
    }
  }
}
?>