<?php 

class About extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('M_general');
        // $this->load->helper('url');
        $this->load->helper(array('form', 'url'));
    
        if($this->session->userdata('status') != "loginAdmin"){
            redirect(base_url("admin/login"));
        }
    }

    function index(){
        $query=$this->db->query("SELECT * FROM ms_content where content_id='1'");
        $data['about']=$query->row();
        $data['content'] = './admin/V_about';
        $this->load->view('./admin/main', $data);
    }
    

    function edit(){
            $id = $this->input->post('id');
            $data = array(
                    'description' => $this->input->post('isi')
                );
                $proses = $this->M_general->Update('ms_content', $data, 'content_id', $id);
                if ($proses) {
                    # code...
                    ?>
                    <script>
                        alert('The data has been updated');
                        window.location.replace("<?=base_url();?>admin/about");
                    </script>
                <?php

                }else{
                    ?>
                    <script>
                        alert('Data have no updated');
                        window.location.replace("<?=base_url();?>admin/about");
                    </script>
                <?php
                }        
       
    }    
    
}