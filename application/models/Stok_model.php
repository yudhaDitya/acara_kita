<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_model extends MY_Model
{  
	public function __construct()
	{
        $this->table = 'riwayat_stok';
        $this->primary_key = 'id';
		$this->protected = array('id'); 
		$this->timestamps = FALSE;

		parent::__construct();
	}   
}