<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends MY_Model
{  
	public function __construct()
	{
        $this->table = 'barang';
        $this->primary_key = 'id';
		$this->protected = array('id'); 
		$this->timestamps = FALSE;
 
		$this->has_one['kategori'] = array('Kategori_model', 'id', 'id_jenis_barang');

		parent::__construct();
	}   

	public function getStok($id)
	{
		$stok_masuk = $this->db->query("SELECT sum(jumlah) as stok_masuk from riwayat_stok where id_barang = $id and status = 'M'")->row()->stok_masuk; 

		$stok_keluar = $this->db->query("SELECT sum(jumlah) as stok_keluar from riwayat_stok where id_barang = $id and status = 'K'")->row()->stok_keluar; 

		$stok = $stok_masuk - $stok_keluar;

		return $stok;
	}
}
