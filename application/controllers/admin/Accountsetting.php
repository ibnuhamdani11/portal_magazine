<?php 

class Accountsetting extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('M_general');
		$this->load->helper('url');
	
		if($this->session->userdata('status') != "loginAdmin"){
			redirect(base_url("admin/login"));
		}
	}

 	function index(){
		//$data['data_user'] = $this->M_general->GetData('ms_user')->result();
        $userid = $this->session->userdata('userid');
        $data['data_role'] = $this->M_general->GetData('ms_role')->result();

        $sqlQuery = "SELECT ms_user.* , ms_role.name as role_name from ms_user left join ms_role on ms_user.role_id = ms_role.role_id 
        where ms_user.user_id = '".$userid."'";
        //echo $sqlQuery;
        $event = $this->db->query($sqlQuery);
        $data['data_user'] = $event->result();
        
        $data['content'] = './admin/V_accountsetting';
		$this->load->view('./admin/main', $data);
	}
    
    function input_simpan(){

        $id = 0;
        $data = array(
        'first_name' => $this->input->post('firstname'),
        'last_name' => $this->input->post('lastname'),
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password'),
        'phone' => $this->input->post('phone'),
        'date_birth' => $this->input->post('datebirth'),
        'gender' => $this->input->post('gender'),
        'role_id' => $this->input->post('role'),
        'create_date' => trim($this->input->post('registration')),
        'modified_date' => date("Y-m-d h:i:sa")
        );
        $proses = $this->M_general->Insert('ms_user',$data);   
        if ($proses) {
        // 	# code...
        	redirect('user');

        }
        else {
        	echo "gagal";
        }
        
    }
    
    function detail($id){
		//$data['data'] = $this->M_general->GetDataById('ms_user', 'id', $id)->result();
        $data['data_role'] = $this->M_general->GetData('ms_role')->result();
        $sqlQuery = "select ms_user.* , ms_role.name as role_name from ms_user left join ms_role on ms_user.role_id = ms_role.id where ms_user.id =  ".$id;
        $event = $this->db->query($sqlQuery);
        $data['data'] = $event->result();
        
        $data['content'] = './admin/detail_user';
		$this->load->view('./admin/main', $data);
	}

    function edit_password(){
        $id = $this->input->post('id');
        $currentPassword = $this->input->post('currentPassword');

        $sqlQuery = "SELECT ms_user.*  from ms_user 
        where id = ".$id." and password = '".$currentPassword."' ";
        $event = $this->db->query($sqlQuery);
        $result = $event->result();
        $rowCount = count($result);

        if($rowCount > 0){
            $data = array(
                'password' => $this->input->post('newPassword'),
                'modified_date' => date("Y-m-d H:i:s")
            );
           
           $proses =  $this->M_general->Update('ms_user', $data, 'id', $id);
           if ($proses) {
                $email = $this->input->post('email');
                
                $data_session = array(
                    'username' => $email,
                    'status' => "login"
                );

                $this->session->set_userdata($data_session);
                redirect(base_url("admin"));
                
            }
            else {
                echo "gagal";
            }
        }else{
            echo "current Password Salah";
        }

        
    }
    
    function delete(){
    	$id = $this->uri->segment(3);
        $this->M_general->Delete('ms_role', 'id', $id);
        
        redirect('role');
        
    }
}