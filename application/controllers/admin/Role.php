<?php 

class Role extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('M_general');
		$this->load->helper('url');
	
		if($this->session->userdata('status') != "loginAdmin"){
			redirect(base_url("admin/login"));
		}
	}

 	function index(){
		$data['data_role'] = $this->db->query("SELECT * FROM ms_role where role_status='1'")->result();
        $data['data_menu'] = $this->db->query("SELECT * FROM ms_menu where menu_status='1'")->result();
        
        $data['content'] = './admin/V_role';
		$this->load->view('./admin/main', $data);
	}


    function role_hidden(){
        $data['data_role'] = $this->db->query("SELECT * FROM ms_role where role_status='0'")->result();
        
        $data['content'] = './admin/V_hidden_role';
        $this->load->view('./admin/main', $data);
    }


    function detail($role_id){

        $data['role'] = $this->M_general->GetDataById('ms_role', 'role_id', $role_id)->row();
        $data['data_menu'] = $this->M_general->GetData('ms_menu')->result();
        $data['content'] = './admin/V_detail_role';
        $this->load->view('./admin/main', $data);
    }
    
    function insert(){
        $cek = $this->input->post('view');
        $data = array(
        'role_name' => $this->input->post('name'),
        'role_description' => $this->input->post('description')
        );

        $proses = $this->M_general->Insert('ms_role',$data);  

        if ($proses) {
            $role = $this->db->query("SELECT * from ms_role order by role_id desc")->row();

            foreach ($cek as $menu) {
                $data = array(
                    'role_id' => $role->role_id,
                    'menu_id' => $menu
                     );

                $this->M_general->Insert('ms_role_detail', $data);
            }

            ?>
                <script>
                    alert('The data has been saved');
                    window.location.replace("<?=base_url();?>admin/role");
                </script>

            <?php } else { ?>

                <script>
                    alert('Data not saved');
                    window.location.replace("<?=base_url();?>admin/role");
                </script>
            <?php
        }
        
    }
    
    

    function edit(){
        $cek = $this->input->post('view');
        
        $role_id = $this->input->post('id');
        $data = array(
        'name' => $this->input->post('name'),
        'description' => $this->input->post('description')
        );
       
       $proses =  $this->M_general->Update('ms_role', $data, 'role_id', $role_id);
       if ($proses) {
            $this->M_general->Delete('ms_role_detail', 'role_id', $role_id);

            foreach ($cek as $menu) {
                $data = array(
                    'role_id' => $role_id,
                    'menu_id' => $menu
                     );

                $this->M_general->Insert('ms_role_detail', $data);
            }

            ?>
                <script>
                    alert('The data has been updated');
                    window.location.replace("<?=base_url('admin/role/detail/'.$role_id);?>");
                </script>

            <?php } else { ?>

                <script>
                    alert('Data not updated');
                    window.location.replace("<?=base_url('admin/role/detail/'.$role_id);?>");
                </script>
            <?php
        }
       
    }
    
    function hidden($role_id){
        $data = array(
            'role_status' => '0'
            );
        $this->M_general->Update('ms_role', $data, 'role_id', $role_id);
        ?>
            <script>
                alert('The data has been disabled');
                window.location.replace("<?=base_url('admin/role');?>");
            </script>
        <?php
    }


    function restore($role_id){
        $data = array(
            'role_status' => '1'
            );
        $this->M_general->Update('ms_role', $data, 'role_id', $role_id);
        ?>
            <script>
                alert('The data has been enabled');
                window.location.replace("<?=base_url('admin/role/role_hidden');?>");
            </script>
        <?php
    }
    
}