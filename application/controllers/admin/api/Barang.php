<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends MY_Controller
{
	
	public function __construct()
	{
        parent::__construct(); 
        
        $this->db = $this->load->database('default', TRUE);
        $this->load->model('barang_model');
	}

	public function byId($kode)
	{    
        $search = $this->db->query("SELECT * from barang where kode_barang = '$kode'")->row();
 
        if (isset($search)) {
            $stok   = $this->barang_model->getStok($search->id);  
            $search = array_merge((array)$search, ['sisa_stok' => $stok]);

            toJson($search);
        } else {
            toJson(['status' => 0]); 
        }
	}

	public function byName()
	{  
        $nama = $this->input->get("nama");

        $search = $this->db->query("SELECT * from barang where nama_barang like '%$nama%'")->result();

        if (isset($search)) {
            echo json_encode($search);
        } else {
            echo json_encode(['status' => 0]);
        }
	}

}