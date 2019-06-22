<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_general');
		$this->load->helper('url');
	
	}

	public function index(){
		// $data['data_role'] = $this->M_general->GetData('m_role')->result();
  //       $data['data_menu'] = $this->M_general->GetData('m_menu')->result();
  //       $data['data_id'] = $this->M_general->GetId('m_role', 'id')->result();
  //       $data['data_count'] = $this->M_general->GetCount('m_menu')->result();
        
        $data['content'] = './guest/About';
        $data['header'] = './guest/Header';
		$this->load->view('./guest/Main', $data);
	}
}
