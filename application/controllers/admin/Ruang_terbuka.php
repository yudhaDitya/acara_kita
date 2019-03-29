<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang_terbuka extends MY_Controller
{ 
	public function __construct()
	{
		parent::__construct(); 
 
		$this->load->model('ruang_model'); 
		$this->load->model('kecamatan_model'); 
	}

	public function index()
	{  
		$data = array(
			'data' => $this->ruang_model->with_kecamatan()->get_all()
		); 
 
		$this->render('admin/ruang_terbuka/index', $data);
	}

	public function tambah()
	{
		$data = array(
			'kecamatan'	=> $this->kecamatan_model->get_all()
		);

		$this->generateCsrf();
		$this->render('admin/ruang_terbuka/tambah', $data);
	} 
	public function simpan()
	{
		$data = $this->input->post();  

		if (!empty($_FILES['foto']['name'])) {
			$foto         = $this->upload_foto();
			$data['foto'] = $foto; 
		}
  
		// $data['harga_beli']  = str_replace(',', '', $data['harga_beli']); 

		$this->ruang_model->insert($data); 
		$this->message("Data berhasil disimpan", 'success');

		$this->go('admin/ruang_terbuka');
	}

	public function edit($id)
	{    
		$data = array(
			'data'	   => $this->ruang_model->get($id), 
		);

		$this->generateCsrf();
		$this->render('admin/ruang_terbuka/edit', $data);
	}
	public function ubah()
	{
		$data       = $this->input->post(); 

		if (!empty($_FILES['foto']['name'])) {
			$foto         = $this->upload_foto();
			$data['foto'] = $foto; 
		} 
		unset($data['id']);

		$this->ruang_model->update($data, $this->input->post('id'));
		$this->message("Data berhasil diubah", 'success');
  
		$this->go('admin/ruang_terbuka');
	}

	public function detail($id)
	{
		$data['data'] = $this->ruang_model->with_kategori()->get($id);
		$data['stok'] = $this->ruang_model->getStok($id);

		$this->render('admin/ruang_terbuka/detail', $data);
	}

	public function hapus($id)
	{
		$this->db->where('id_barang', $id);
		$this->db->delete('riwayat_stok'); 

		$this->ruang_model->delete($id);
		$this->go('admin/ruang_terbuka');
	}


	function upload_foto(){ 
        $set_name   = fileName(1, 'RT','',8);
        $path       = $_FILES['foto']['name'];
        $extension  = ".".pathinfo($path, PATHINFO_EXTENSION); 

        $config['upload_path']          = './uploads/ruang_terbuka/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 9024; 
        $config['file_name']            = $set_name.$extension; 
		$this->load->library('upload', $config);
		
        $upload = $this->upload->do_upload('foto');

        if ($upload == FALSE) { 
            $error = $this->upload->display_errors();
			$this->message($error, 'danger');
			$this->go('auth/last_form');  
        }
 
        $upload = $this->upload->data(); 

        return $upload['file_name'];
    } 
}