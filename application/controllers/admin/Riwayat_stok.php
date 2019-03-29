<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_stok extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct(); 

		$this->load->model('kategori_model');
		$this->load->model('riwayat_model');
		$this->load->model('stok_model');
	}

	public function index()
	{  
		$data = array(
			'data' => $this->riwayat_model->get_all()
		);
 
		$this->render('admin/riwayat/index', $data);
	}

	public function tambah()
	{    
		$data = array(
			'kategori' => $this->kategori_model->get_all()
		);

		$this->generateCsrf();
		$this->render('admin/riwayat/tambah', $data);
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

		$insert_barang = $this->riwayat_model->insert($data);

		$data_riwayat_stok = array(
			'id_barang'   => $insert_barang, 
			'jumlah'      => $stok,
			'status'      => 'M',
			'keterangan'  => "Stok awal dari proses input barang",
			'created_at'  => gmdate("Y-m-d H:i:s", time()+60*60*7),
			'created_by'  => 1
		);
		$this->stok_model->insert($data_riwayat_stok);

		$this->go('admin/riwayat');
	}

	public function edit($id)
	{    
		$data = array(
			'data'	   => $this->riwayat_model->get($id),
			'kategori' => $this->kategori_model->get_all(),
			'stok'	   => $this->riwayat_model->getStok($id)
		);

		$this->generateCsrf();
		$this->render('admin/riwayat/edit', $data);
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

		$this->riwayat_model->update($data, $this->input->post('id'));

		if ($stok_awal == $stok_input) {
			$this->go('admin/riwayat');			
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

		$this->go('admin/riwayat');
	}

	public function hapus($id)
	{
		$this->db->where('id_barang', $id);
		$this->db->delete('riwayat_stok'); 

		$this->riwayat_model->delete($id);
		$this->go('admin/riwayat');
	}
}