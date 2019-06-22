<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_post extends CI_Controller {

    function __construct(){
        parent::__construct();
        // $this->load->model('M_general');
        $this->load->helper('url');
    
        // if($this->session->userdata('status') != "loginAdmin"){
        //     redirect(base_url("admin/login"));
        // }
    }

	public function index()
	{
        $data['content'] = 'guest/V_blog_post';
		$this->load->view('guest/V_main', $data);
    }
    public function judul($judul)
	{
        // function convert_text($text) {
            
        //     $t = $text;
            
        //     $specChars = array(
        //         '!' => '%21',    '"' => '%22',
        //         '#' => '%23',    '$' => '%24',    '%' => '%25',
        //         '&' => '%26',    '\'' => '%27',   '(' => '%28',
        //         ')' => '%29',    '*' => '%2A',    '+' => '%2B',
        //         ',' => '%2C',    '-' => '%2D',    '.' => '%2E',
        //         '/' => '%2F',    ':' => '%3A',    ';' => '%3B',
        //         '<' => '%3C',    '=' => '%3D',    '>' => '%3E',
        //         '?' => '%3F',    '@' => '%40',    '[' => '%5B',
        //         '\\' => '%5C',   ']' => '%5D',    '^' => '%5E',
        //         '_' => '%5F',    '`' => '%60',    '{' => '%7B',
        //         '|' => '%7C',    '}' => '%7D',    '~' => '%7E',
        //         ',' => '%E2%80%9A',  ' ' => '%20'
        //     );
            
        //     foreach ($specChars as $k => $v) {
        //         $t = str_replace($k, $v, $t);
        //     }
            
        //     return $t;
        // }
        // $judul_convert = convert_text($judul);
        // echo "$judul_convert";
        $data['data_blog_pos'] = $this->db->query("SELECT mp.*, mk.nama AS kategori_name FROM ms_post AS mp
                                                        INNER JOIN ms_kategori AS mk ON(mp.kategori_post = mk.kategori_id)
                                                        WHERE mp.post_id = '$judul' ORDER BY post_id DESC")->row();
        $data['content'] = 'guest/V_blog_post';
		$this->load->view('guest/V_main', $data);
    }
    
}
