<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Acara extends MY_Controller
{ 
	public function __construct()
	{
		parent::__construct(); 

		$this->load->model('kategori_acara_model');
		$this->load->model('eo/acara_model', 'acara_model'); 
	}

	public function index()
	{  
		$data = array(
			'data' => $this->acara_model->with_kategori()->get_all()
		);
 
		$this->render('eo/acara/index', $data);
	}

	public function tambah()
	{    
		$data = array(
			'kategori' => $this->kategori_model->get_all()
		);

		$this->generateCsrf();
		$this->render('eo/acara/tambah', $data);
	} 
	public function simpan()
	{
		$data = $this->input->post();
		$stok = $data['stok'];

		unset($data['stok']);
  
		$data['harga_beli']  = str_replace(',', '', $data['harga_beli']);
		$data['harga_jual']  = str_replace(',', '', $data['harga_jual']);
		$data['created_at']  = gmdate("Y-m-d H:i:s", time()+60*60*7); 
		$data['kode_barang'] = kode_barang(); 

		$insert_barang = $this->acara_model->insert($data);

		$data_riwayat_stok = array(
			'id_barang'   => $insert_barang, 
			'jumlah'      => $stok,
			'status'      => 'M',
			'keterangan'  => "Stok awal dari proses input barang",
			'created_at'  => gmdate("Y-m-d H:i:s", time()+60*60*7),
			'created_by'  => 1
		);
		$this->stok_model->insert($data_riwayat_stok);

		$this->go('eo/barang');
	}

	public function edit($id)
	{    
		$data = array(
			'data'	   => $this->acara_model->get($id),
			'kategori' => $this->kategori_model->get_all(),
			'stok'	   => $this->acara_model->getStok($id)
		);

		$this->generateCsrf();
		$this->render('eo/barang/edit', $data);
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
			$this->go('eo/barang');			
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

		$this->go('eo/barang');
	}

	public function detail($id)
	{
		$data['data'] = $this->acara_model->with_kategori()->get($id);
		$data['stok'] = $this->acara_model->getStok($id);

		$this->render('eo/barang/detail', $data);
	}

	public function hapus($id)
	{
		$this->db->where('id_barang', $id);
		$this->db->delete('riwayat_stok'); 

		$this->acara_model->delete($id);
		$this->go('eo/barang');
	}
}