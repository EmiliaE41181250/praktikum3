<?php 
 //controller ini untuk menampilkan form login, melakukan verifikasi username dan password admin yg dimasukkan 
class Login extends CI_Controller{
 
	//untuk mengaktifkan m_login yg terdapat di model
	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
 
	}
 
	function index(){
		$this->load->view('v_login');
	}
 
	//memberikan aksi login ke v_login untuk memberi aksi di form login
	function aksi_login(){

		//data username dan password ditangkap lalu masukkan ke dalam array
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		
		//mengecek ketersediaan username dan password di model m_login
		//num_rows() untuk menghitung jumlah record
		//jika username dan password benar
		$cek = $this->m_login->cek_login("admin",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);

			//jika nama username dan password tidak ditemukan
			$this->session->set_userdata($data_session);
 
			redirect(base_url("admin"));
 
		}else{
			echo "Username dan password salah !";
		}
	}
	//merupakan aksi yg diberikan ke tombol logout
	function logout(){
		//untuk menghapus session dan login dgn codeigniter
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

	
}