<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct(); 

		$this->load->model('kategori_model');
		$this->load->model('auth_model'); 
	}

	public function index()
	{  
		$data = array(
			'data' => $this->auth_model->get_all()
		);
 
		$this->render('admin/pengguna/index', $data);
	}

	public function tambah()
	{      
		$this->generateCsrf();
		$this->render('admin/pengguna/tambah');
	} 
	public function simpan()
	{ 
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('nama_user', 'Nama', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('reenter_password', 'Ulangi Password', 'required|matches[password]');  
		$this->form_validation->set_error_delimiters('<div>', '</div>');

		if ($this->form_validation->run() == FALSE) { 
			$this->generateCsrf();
			$this->render('admin/pengguna/tambah'); 
		} else {
			$data = $this->input->post(); 

			unset($data['reenter_password']);
			$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
 
			$this->auth_model->insert($data);

			$this->message("Data berhasil disimpan", 'success');
			$this->go('admin/pengguna');
		} 
	}

	public function edit($id)
	{    
		$data = array(
			'data' => $this->auth_model->get($id), 
		);

		$this->generateCsrf();
		$this->render('admin/pengguna/edit', $data);
	}
	public function ubah()
	{
		$data = $this->input->post();  

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('nama_user', 'Nama', 'required');  
		$this->form_validation->set_error_delimiters('<div>', '</div>');

		if ($this->form_validation->run() == FALSE) { 
			$data['data'] = (object)$data;

			$this->generateCsrf();
			$this->render('admin/pengguna/edit', $data); 
		} else { 
			$data = $this->input->post(); 
			$id   = $this->input->post('id'); 

			unset($data['id']);

			if (!empty($data['password'])) { 
				$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
			} else { 
				unset($data['reenter_password']);
				unset($data['password']);
			} 
 
			$this->auth_model->update($data, $id);

			$this->message("Data berhasil diubah", 'success');
			$this->go('admin/pengguna');
		} 
	}

	public function hapus($id)
	{
		$this->db->where('id_barang', $id);
		$this->db->delete('riwayat_stok'); 

		$this->auth_model->delete($id);
		$this->go('admin/pengguna');
	}
}