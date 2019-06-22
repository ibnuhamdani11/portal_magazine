<?php 

class Faq extends CI_Controller{

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
        $query=$this->db->query("SELECT * FROM ms_content where content_id='4'");
        $data['faq']=$query->row();
        $data['content'] = './admin/V_faq';
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
                        window.location.replace("<?=base_url();?>admin/faq");
                    </script>
                <?php

                }else{
                    ?>
                    <script>
                        alert('The data has been not updated');
                        window.location.replace("<?=base_url();?>admin/faq");
                    </script>
                <?php
                }        
       
    }    
    
}