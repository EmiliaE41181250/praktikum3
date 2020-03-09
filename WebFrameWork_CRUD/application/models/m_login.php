<?php 
 
class M_login extends CI_Model{	

	//mengambil data dari database untuk mengecek username dan password untuk login
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
    }	
    
}
