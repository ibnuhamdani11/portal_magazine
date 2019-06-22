<?php 
// menu_status = 1 (enabled)
class Kategori extends CI_Controller{
    private $TABLE = "ms_kategori";
    private $WHERE = "kategori_id";
    
	function __construct(){
		parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_general');
        $this->load->helper('url');
       
	
		if($this->session->userdata('status') != "loginAdmin"){
			redirect(base_url("admin/login"));
		}
	}

	function index(){
		$data['data_table'] = $this->db->query("SELECT * FROM ms_kategori ORDER BY kategori_id DESC")->result();
        if(isset($_GET['action'])){
            switch ($_GET['action']){
                case "show":
                $data['data_show'] = $this->db->query("SELECT * FROM ms_kategori
                                                        WHERE kategori_id = '$_GET[val]'")->row();
                break;
                case "edit":
                $data['data_edit'] = $this->db->query("SELECT * FROM ms_kategori
                                                        WHERE kategori_id = '$_GET[val]'")->row();
                break;
            }
        }
        
		$data['content'] = './admin/V_kategori';
		$this->load->view('./admin/Main', $data);
    }

    function simpan(){
        $data = array(
        'nama'              => $this->input->post('name'),
        'created_by'        => $this->input->post('created_by'),
        'created_date'      => date('Y-m-d'),
        'status'            => $this->input->post('status')
        );

        $proses = $this->M_general->Insert('ms_kategori',$data); 
        if($proses){
            // Sukses
            ?>
            <script type="text/javascript">
                alert('The data has been saved');
                window.location.href = '<?= base_url('admin/kategori');?>';
            </script>
            <?php
        }else{
            // Gagal
            ?>
            <script type="text/javascript">
                alert('The data not has been saved');
                window.history.back();
            </script>
            <?php
        }
    }

    function edit(){
        $id = $this->input->post('id');
        $data = array(
        'nama'              => $this->input->post('name'),
        'created_by'        => $this->input->post('created_by'),
        'created_date'      => date('Y-m-d H:i:s'),
        'status'            => $this->input->post('status')
        );

        $proses = $this->M_general->Update($this->TABLE, $data, $this->WHERE, $id);
        if($proses){
            // Sukses
            ?>
            <script type="text/javascript">
                alert('The data has been updated');
                window.location.href = '<?= base_url('admin/kategori');?>';
            </script>
            <?php
        }else{
            // Gagal
            ?>
            <script type="text/javascript">
                alert('The data not has been updated');
                window.history.back();
            </script>
            <?php
        }
    }

    function hapus($id){

        $proses = $this->M_general->Delete($this->TABLE, $this->WHERE, $id);
        if($proses){
            // Sukses
            ?>
            <script type="text/javascript">
                alert('The data has been deleted');
                window.location.href='<?= base_url('admin/kategori');?>';
            </script>
            <?php
        }else{
            // Gagal
            ?>
            <script type="text/javascript">
                alert('The data not has been deleted');
                window.history.back();
            </script>
            <?php
        }
    }
}