<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct(); 
	}

	public function buat()
	{  
		$this->render('admin/transaksi/buat');
	}

}