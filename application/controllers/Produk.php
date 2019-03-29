<?php

/**
* 
*/
class Produk extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->_accessable = TRUE;

		$this->load->helper(array('dump'));
		$this->load->model(array('produk_model'));
	}

	public function index()
	{  
        $data['data_produk'] = $this->produk_model->get_all();
        // dump($data);
		$this->render('produk/index', $data);
    }
    
    public function tambah()
    {
        $this->generateCsrf(); 
        $this->render('produk/tambah');
    }

    public function simpan()
    {
        $data = $this->input->post();
        $insert = $this->produk_model->insert($data);

        if ($insert) {
            $this->go('produk');
        }
    }

    public function edit($id)
    {
        $data['data'] = $this->produk_model->get($id);

        $this->generateCsrf(); 
        $this->render('produk/edit', $data);
    }

    public function ubah()
    {
        $data = $this->input->post();
        $update = $this->produk_model->update($data, $data['id']);

        if ($update) {
            $this->go('produk');
        }
    }

    public function hapus($id)
    {
        $this->produk_model->delete($id);
        $this->go('produk'); 
    }

}