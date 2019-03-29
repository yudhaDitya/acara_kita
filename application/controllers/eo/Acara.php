<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Acara extends MY_Controller
{ 
	public function __construct()
	{
		parent::__construct(); 

		$this->load->model('ruang_model');
		$this->load->model('kecamatan_model');
		$this->load->model('kategori_acara_model');
		$this->load->model('eo/acara_model', 'acara_model'); 
	}

	public function index()
	{  
		$data = array(
			'data' => $this->acara_model->with_kategori()->with_ruang()->get_all()
		);
 
		$this->render('eo/acara/index', $data);
	}

	public function tambah()
	{    
		$data = array(
			'kategori_acara' => $this->kategori_acara_model->with_kecamatan()->get_all(),
			'ruang_terbuka'  => $this->ruang_model->get_all()
		);

		$this->generateCsrf();
		$this->render('eo/acara/tambah', $data);
	} 
	public function simpan()
	{
		$data = $this->input->post();
		
		$data['nominal_dana']  = str_replace(',', '', $data['nominal_dana']);

		if (!empty($_FILES['proposal']['name'])) {
			$proposal         = $this->upload_proposal();
			$data['proposal'] = $proposal; 
		}
		// if (!empty($_FILES['foto']['name'])) {
		// 	$foto         = $this->upload_foto();
		// 	$data['foto'] = $foto; 
		// } 
		

		$this->acara_model->insert($data);
		$this->message("Data berhasil disimpan", 'success');

		$this->go('eo/acara');
	}

	public function edit($id)
	{    
		$data = array(
			'data'	   => $this->acara_model->get($id),
			'kategori' => $this->kategori_model->get_all(),
			'stok'	   => $this->acara_model->getStok($id)
		);

		$this->generateCsrf();
		$this->render('eo/acara/edit', $data);
	}
	public function ubah()
	{
		$data       = $this->input->post();
		$stok_awal  = $data['stok_awal'];
		$stok_input = $data['stok'];
		$id 	    = $data['id'];

		unset($data['stok']);
		unset($data['stok_awal']);
		unset($data['id']);
  
		$data['harga_beli']  = str_replace(',', '', $data['harga_beli']);
		$data['harga_jual']  = str_replace(',', '', $data['harga_jual']);
		$data['updated_at']  = gmdate("Y-m-d H:i:s", time()+60*60*7);  
		$data['updated_by']  = 1;  

		$this->acara_model->update($data, $this->input->post('id'));

		if ($stok_awal == $stok_input) {
			$this->go('eo/acara');			
		} else if ($stok_input < $stok_awal) {
			$jumlah = $stok_awal - $stok_input;
			$status = 'K';
		} else if ($stok_input > $stok_awal) { 
			$jumlah = $stok_input - $stok_awal;
			$status = 'M';
		} 

		$data_riwayat_stok = array(
			'id_barang'   => $id, 
			'jumlah'      => $jumlah,
			'status'      => $status,
			'keterangan'  => "Perubahan stok di edit data",
			'updated_at'  => gmdate("Y-m-d H:i:s", time()+60*60*7),
			'updated_by'  => 1,
		);
		$this->stok_model->insert($data_riwayat_stok);

		$this->go('eo/acara');
	}

	public function detail($id)
	{
		$data['data'] = $this->acara_model->with_kategori()->get($id);
		$data['stok'] = $this->acara_model->getStok($id);

		$this->render('eo/acara/detail', $data);
	}

	public function hapus($id)
	{
		$this->db->where('id_barang', $id);
		$this->db->delete('riwayat_stok'); 

		$this->acara_model->delete($id);
		$this->go('eo/acara');
	}

	
	function upload_proposal(){ 
        $set_name   = fileName(1, 'P','',8);
        $path       = $_FILES['proposal']['name'];
        $extension  = ".".pathinfo($path, PATHINFO_EXTENSION); 

        $config['upload_path']          = './uploads/acara/proposal/';
        $config['allowed_types']        = 'pdf|doc|docx';
        $config['max_size']             = 9024; 
        $config['file_name']            = $set_name.$extension; 
		$this->load->library('upload', $config);
		
        $upload = $this->upload->do_upload('proposal');

        if ($upload == FALSE) {
			$error = $this->upload->display_errors();
			dump($error);
			$this->message($error, 'danger'); 
        }
 
        $upload = $this->upload->data(); 

        return $upload['file_name'];
	} 
	
	function upload_foto(){ 
		$set_name   = fileName(1, 'ACR','',8);
        $path       = $_FILES['foto']['name'];
        $extension  = ".".pathinfo($path, PATHINFO_EXTENSION); 

		$config = [];
        $config['upload_path']          = './uploads/acara/foto/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 9024; 
        $config['file_name']            = $set_name.$extension; 
		$this->load->library('upload', $config);
		
        $upload = $this->upload->do_upload('foto');

        if ($upload == FALSE) { 
            $error = $this->upload->display_errors();
			$this->message($error, 'danger');
			dump($error);
        }
 
        $upload = $this->upload->data(); 

        return $upload['file_name'];
    } 
}