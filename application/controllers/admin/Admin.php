<?php 
// menu_status = 1 (enabled)
class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	
		if($this->session->userdata('status') != "loginAdmin"){
			redirect(base_url("admin/login"));
		}
	}

	function index(){
		$email = $this->session->userdata('email');
		$data['menu'] = $this->db->query("SELECT * 
                                FROM ms_role_detail 
                                left join ms_role on ms_role_detail.role_id = ms_role.role_id
                                left join ms_menu on ms_role_detail.menu_id = ms_menu.menu_id
                                left join ms_user on ms_role.role_id = ms_user.role_id
                                where email = '".$email."' AND menu_status='1'
                                ")->result();

		$data['content'] = './admin/dashboard';
		$this->load->view('./admin/main', $data);
	}
}