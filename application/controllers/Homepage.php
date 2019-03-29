<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Homepage extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->_accessable = TRUE; 
	}

	public function index()
	{
		$this->render('homepage');
	}

}