<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_produk extends MY_Controller
{ 
	public function __construct()
	{
		parent::__construct(); 
  
		$this->load->model('kategori_model');
	}

	public function index()
	{  
		$data = array(
			'data' => $this->kategori_model->get_all()
		);

		$this->render('admin/master/kategori_produk/index', $data);
	}

	public function tambah()
	{   
		$this->generateCsrf();
		$this->render('admin/master/kategori_produk/tambah');
	}

	public function simpan()
	{
		$data = $this->input->post();

		$this->kategori_model->insert($data);

		$this->go("admin/master/kategori_produk");
	}

	public function edit($id)
	{  
		$kategori_produk = $this->kategori_model->get($id);

		$data = array(
			'data' => $kategori_produk
		);

		$this->generateCsrf();
		$this->render('admin/master/kategori_produk/edit', $data);
	}

	public function ubah()
	{
		$data = $this->input->post();

		unset($data['id']);

		$this->kategori_model->update($data, $this->input->post('id'));

		$this->go("admin/master/kategori_produk");
	}

	public function hapus($id)
	{
		$delete = $this->kategori_model->delete($id);

		$this->go("admin/master/kategori_produk");
	}

}