<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct(); 

		$this->_accessable = TRUE;
		$this->load->model('eo_model');
		$this->load->model('auth_model');
	}

	public function login()
	{   
		$this->generateCsrf();
		$this->render('auth/login');
	} 
	public function doLogin()
	{      
		$username = $this->input->post('username');
		$password = $this->input->post('password'); 

		$check_result = $this->my_auth->check_user_app($username, $password);    
  
		if ($check_result) { 
			$hak_akses = $this->session->userdata('hak_akses');
			if ($hak_akses == 'E') {
				$this->go('eo/dashboard'); 
			} else {
				$this->go('admin/dashboard');  
			}
			// $this->message("Selamat datang ".$check_result, 'danger');
		} else {
			$this->message("Username atau Password Salah", 'danger');
			$this->go('auth/login');   
		}  
	} 

	public function register()
	{
		$this->generateCsrf();
		$this->render('auth/register');
	}
	public function doRegister()
	{ 
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('nama_user', 'Nama', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('re_password', 'Ulangi Password', 'required|matches[password]');  
		$this->form_validation->set_error_delimiters('<div>', '</div>');

		if ($this->form_validation->run() == FALSE) { 
			$this->generateCsrf();
			$this->render('auth/register'); 
		} else {
			$data = $this->input->post(); 
			unset($data['reenter_password']);

			$data_user = [
				'nama_user'  => $data['nama_user'],
				'username'   => $data['username'],
				'username'   => $data['username'],
				'created_at' => gmdate("Y-m-d H:i:s", time()+60*60*7),
				'hak_akses'  => 'E'
			]; 
			$data_user['password'] = password_hash($data['password'], PASSWORD_DEFAULT);  
			$id_user               = $this->auth_model->insert($data_user);
			
			$data_eo = [
				'id_pengguna' => $id_user,
				'nama_eo'     => $data['nama_eo'],
				'telp'        => $data['telp'], 
				'asal'        => $data['asal'], 
			]; 
			$this->eo_model->insert($data_eo);

			$session_data = array(
				'id_user'       => $id_user,
				'username'      => $data['username'],
				'hak_akses'     => $data['hak_akses'],
				'nama'	        => $data['nama_user'],  
			);  
			
			if ($data['hak_akses'] == 'E') {
					$event_organizer       = $this->eo_model->where('id_pengguna', $data['id'])->get();
					$session_data['eo_id'] = $event_organizer->id;
			}
			$this->CI->session->set_userdata($session_data);

			$this->message("Pendaftaran Berhasil", 'success');
			$this->go('eo/dashboard');
		} 
	}
	 
	public function logout()
	{
		$this->my_auth->do_logout();

		$this->go('auth/login');
	}

}