<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Acara_model extends MY_Model
{  
	public function __construct()
	{
        $this->table       = 'acara';
        $this->primary_key = 'id'; 
        $this->protected   = array('id');
		// $this->timestamps  = FALSE;

        $this->has_one['kategori'] = array('Kategori_acara_model', 'id', 'id_ktg_acara');
        $this->has_one['ruang']    = array('Ruang_model', 'id', 'id_rt');
        $this->has_one['eo']       = array('Eo_model', 'id', 'id_eo');
        
		parent::__construct();
	}   
}
