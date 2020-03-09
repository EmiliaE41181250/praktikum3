<?php 
 
class M_data extends CI_Model{
	function tampil_data(){
		//mengambil data dari database, nama tabel yg akan diambil datanya ditulis pada parameter [return]
		return $this->db->get('user');
	}
	//menginputkan data ke tabel di database yg sudah dibuat
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	//pada function ini terdapat fungsi where yg berguna untuk menyeleksi query dan delete untuk menghapus record
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	//mengedit data di tabel dari database yg sudah dibuat
	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}
 	//mengupdate data di tabel dari database yg sudah dibuat dari fungsi where
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
    }	
    
 
    	
}
    
