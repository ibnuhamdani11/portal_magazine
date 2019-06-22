<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
		$this->load->model('M_general');
		$this->load->helper('url');

	}

	function index(){

		// $this->load->view('./admin/login');
		$this->load->view('./admin/login_page');
	} 

	function aksi_login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email' => $email,
			'password' => md5($password)
			);
		$cek = $this->m_login->cek_login("ms_user",$where)->num_rows();
		$detail_users = $this->m_login->detail_user("ms_user",$where);
		if($cek > 0){
			foreach ($detail_users as $detail_user) {
                    $id         = $detail_user['user_id']; 
                    $username   = $detail_user['first_name'];
                    $nama      	= $detail_user['last_name']; 
                    $role		= $detail_user['role_id'];
                }
			$data_session = array(
				'email' 	=> $email,
				'username' 	=> $username,
				'role'		=> $role,
				'userid'	=> $id,
				'status' 	=> "loginAdmin"
				);

			$this->session->set_userdata($data_session);

			?>
			<script>
			// alert('Welcome to Aplikasi');
			window.location.replace("<?=base_url();?>admin/home");
			</script>
			<?php
			$this->load->view('./admin/admin');
		} else {
			?>
			<script>
			alert('Email atau Password anda salah');
			window.location.replace("<?=base_url();?>admin/login");
			</script>
			<?php
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('admin/login'));
	}
}