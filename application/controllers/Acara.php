<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Acara extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->_accessable = TRUE; 

		$this->load->model("ruang_model");
		$this->load->model("admin/acara_model");
	}

	public function index()
	{
		$data['acara']         = $this->acara_model->with_kategori()->where('status', 1)->get_all();
		$data['ruang_terbuka'] = $this->ruang_model->with_kecamatan()->limit(4)->order_by('rand()')->get_all();

		$this->render('homepage', $data);
	}

	public function detail($id)
	{ 
		$data['data'] = $this->acara_model->with_kategori()->with_eo()->with_ruang()->get($id);

		$this->render('acara/detail', $data);
	}

}