<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Eo_model extends MY_Model
{  
	public function __construct()
	{
        $this->table = 'event_organizer';
        $this->primary_key = 'id';
		$this->protected = array('id'); 
		$this->timestamps = FALSE;

		parent::__construct();
	}   
}