<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang_model extends MY_Model
{  
	public function __construct()
	{
        $this->table = 'ruang_terbuka';
        $this->primary_key = 'id';
		$this->protected = array('id'); 
		$this->timestamps = FALSE;

        $this->has_one['kecamatan'] = array('Kecamatan_model', 'id', 'id_kecamatan');

		parent::__construct();
	}   
}
