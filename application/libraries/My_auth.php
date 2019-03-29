<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_auth 
{

        public function __construct()
	{
                $this->CI =& get_instance();
                $this->CI->load->library('session'); 
                $this->CI->load->model('auth_model');  
                $this->CI->load->model('eo_model');  
        } 

        public function check($u, $p)
        {
                $user = $this->CI->auth_model->where('username', $u)->get();
                
                if ($user) {
                        $check_password = password_verify($p, $user->password);

                        if ($check_password) { 
                                $session_data = array(
                                        'id_user'	    => $user->id,
                                        'nama'		    => $user->nama, 
                                        'user_type'	    => 'admin',
                                        'username'	    => $user->username,
                                        'user_level'	    => $user->hak_akses, 
                                ); 
                                dump($user->hak_akses);
                                if ($user->hak_akses == 'E') {
                                        $event_organizer = $this->CI->eo_model->where('id_pengguna', $user->id)->get();
                                        $session_data = $event_organizer->id;
                                }
                                $this->CI->session->set_userdata($session_data);

                                return $user;
                        } else { 
                                return false;
                        }
                } else {  
                        return false;
                }
        }

        public function check_user_app($u, $p)
        {
                $user = $this->CI->auth_model->where('username', $u)->get(); 

                if ($user) {   
                        $check_password = password_verify($p, $user->password);
                        if ($check_password) { 
                                 
                                $session_data = array(
                                        'id_user'       => $user->id,
                                        'username'      => $user->username,
                                        'hak_akses'     => $user->hak_akses,
                                        'nama'	        => $user->nama_user,  
                                ); 
                                
                                if ($user->hak_akses == 'E') {
                                        $event_organizer = $this->CI->eo_model->where('id_pengguna', $user->id)->get();
                                        $session_data['eo_id'] = $event_organizer->id;
                                }  
                                $this->CI->session->set_userdata($session_data);

                                return $user;
                        } else { 
                                return 1;
                        }
                } else {  
                        return 1;
                }
        }

	function is_logged_in()
	{  
		if ($this->CI->session->userdata('id_user'))
		{
			return true;
		} else {
                        return false; 
                }
	}

	function do_logout()
	{
                $this->CI->session->sess_destroy();
                return true;	
	}
}