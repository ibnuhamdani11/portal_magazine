<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('M_general');
        $this->load->helper('url');
        $this->load->helper('file');
    
        // if($this->session->userdata('status') != "loginAdmin"){
        //     redirect(base_url("admin/login"));
        // }
    }

	public function index()
	{
        $data['data_latest_news'] = $this->db->query("SELECT mp.*, mk.nama AS kategori_name FROM ms_post AS mp
                                                        INNER JOIN ms_kategori AS mk ON(mp.kategori_post = mk.kategori_id)
                                                        WHERE mp.status = '1' ORDER BY post_id DESC")->result();
        $data['content'] = 'guest/V_home';
		$this->load->view('guest/V_main', $data);
	}
}
