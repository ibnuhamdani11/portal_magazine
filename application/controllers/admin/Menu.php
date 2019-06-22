<?php 

class Menu extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('M_general');
        $this->load->helper('url');
    
        if($this->session->userdata('status') != "loginAdmin"){
            redirect(base_url("admin/login"));
        }
    }

    function index(){
        $data['menu'] = $this->M_general->GetData('ms_menu')->result();
        $data['content'] = './admin/V_menu';
        $this->load->view('./admin/main', $data);
    }
    
    function insert(){
        $data = array(
        'name'              => $this->input->post('name'),
        'link'              => $this->input->post('link'),
        'position_number'   => $this->input->post('position_number'),
        'description'       => $this->input->post('description'),
        'menu_status'       => '1' // aktif
        );
        $proses = $this->M_general->Insert('ms_menu',$data);   
        if ($proses) {
            ?>
                <script>
                    alert('The data has been saved');
                    window.location.replace("<?=base_url();?>admin/menu");
                </script>

            <?php } else { ?>

                <script>
                    alert('Data not saved');
                    window.location.replace("<?=base_url();?>admin/menu");
                </script>
            <?php
        }
        
    }
    


    function edit(){
       $menu_id = $this->input->post('menu_id');
       $data = array(
        'name' => $this->input->post('menu_name'),
        'link' => $this->input->post('menu_link'),
        'position_number' => $this->input->post('menu_position'),
        'description' => $this->input->post('menu_description')
        );

       $query = $this->M_general->Update('ms_menu', $data, 'menu_id', $menu_id);
       if ($query) {
        ?>
            <script>
                alert('The data has been updated');
                window.location.replace("<?=base_url('admin/menu/?act=detail&id='.$menu_id);?>");
            </script>
        <?php
       }else{
        ?>
            <script>
                alert('Data not updated');
                window.location.replace("<?=base_url('admin/menu/?act=detail&id='.$menu_id);?>");
            </script>
        <?php
       }
       
    }
    
    function delete($menu_id){
        $this->M_general->Delete('ms_menu', 'menu_id', $menu_id);
        ?>
            <script>
                alert('The data has been deleted');
                window.location.replace("<?=base_url('admin/menu');?>");
            </script>
        <?php
        
    }

    function enable($menu_id){
        $data = array(
            'menu_status' => '1'
            );
        $this->M_general->Update('ms_menu', $data, 'menu_id', $menu_id);
        ?>
            <script>
                alert('The data has been enabled');
                window.location.replace("<?=base_url('admin/menu');?>");
            </script>
        <?php
    }

    function disabled($menu_id){
        $data = array(
            'menu_status' => '0'
            );
        $this->M_general->Update('ms_menu', $data, 'menu_id', $menu_id);
        ?>
            <script>
                alert('The data has been disabled');
                window.location.replace("<?=base_url('admin/menu');?>");
            </script>
        <?php
    }
}