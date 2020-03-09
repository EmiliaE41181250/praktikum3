<?php 

class Crud extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		//oprasional database	
		$this->load->model('m_data');
		$this->load->helper('url');
 
	}
 
	function index(){
		//mengambil data dari data base dan menampilkan data dari data base
		$data['user'] = $this->m_data->tampil_data()->result();
		$this->load->view('v_tampil',$data);
	}
 
	function tambah(){
		//view yg dijadikan form untuk inputan data
		$this->load->view('v_input');
	}
	//pada function ini, pertama yg ditangkap adalah input nama,alamat,pekerjaan
	function tambah_aksi(){
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
 
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
			);
		//menginput data ke database dengan menggunakan model m_data
		$this->m_data->input_data($data,'user');

		//pada parameter kedua, beri nama dari tabelnya. kemudian mengalihkannya ke metod index
		redirect('crud/index');
	}
	//link hapus pada view v_tampil tertuju pada function hapus ini
	//($id) digunakan untuk menangkap data yg dikirim melalui url dari link v_tampil
	function hapus($id){
		$where = array('id' => $id);
		//variabel $where berisi data id, pada parameter kedua masukkan nama tabel
		$this->m_data->hapus_data($where,'user');
		redirect('crud/index');
	}
 
	function edit($id){
		//merubah id menjadi array yg kemudian digunakan untuk mengambil data menurut id dgn menggunakan function edit_data pada model m_data
		$where = array('id' => $id);
		$data['user'] = $this->m_data->edit_data($where,'user')->result();
		$this->load->view('v_edit',$data);
    }
    //menangkap data dari form edit
    function update(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
		
	//masukkan data yg akan di update ke dalam variabel data
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'pekerjaan' => $pekerjaan
        );
	 
	//variabel where menjadi penentu data yg di update/id yg mana  
        $where = array(
            'id' => $id
        );
	 
	//menangkap update_data pada m_data untuk di jalankan	
        $this->m_data->update_data($where,$data,'user');
        redirect('crud/index');
    }
 
}