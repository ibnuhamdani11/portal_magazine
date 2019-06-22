<?php 
// menu_status = 1 (enabled)
class Post extends CI_Controller{
	private $TABLE = "ms_post";
	private $WHERE = "post_id";
	
	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('upload');
		$this->load->model('M_general');
        $this->load->helper('url');
	
		if($this->session->userdata('status') != "loginAdmin"){
			redirect(base_url("admin/login"));
		}
	}

	function index(){
		$data['data_table'] = $this->db->query("SELECT mp.*, mka.nama AS nama_kategori FROM ms_post AS mp 
                                                LEFT JOIN ms_kategori AS mka ON(mp.kategori_post = mka.kategori_id)
												WHERE mp.status='1' ORDER BY post_id DESC")->result();
		$data['data_kategori'] = $this->db->query("SELECT * FROM ms_kategori WHERE status='1' ORDER BY nama DESC")->result();

		if(isset($_GET['action'])){
            switch ($_GET['action']){
                case "show":
                $data['data_show'] = $this->db->query("SELECT * FROM $this->TABLE
                                                        WHERE $this->WHERE = '$_GET[val]'")->row();
                break;
                case "edit":
                $data['data_edit'] = $this->db->query("SELECT * FROM $this->TABLE
                                                        WHERE $this->WHERE = '$_GET[val]'")->row();
                break;
            }
		}
		
		$data['content'] = './admin/V_posting';
		$this->load->view('./admin/Main', $data);
	}

	public function simpan(){
        // $this->load->model('mupload');
        
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        // $config['upload_path'] = './assets/uploads/'; //path folder
        $config['upload_path'] = './upload/image_post/'; 
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
		$config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        
        if($_FILES['gambar_judul']['name'] AND $_FILES['gambar_banner']['name'])
        {
			$upload_img_judul = $this->upload->do_upload('gambar_judul');
			$img_judul = $this->upload->data();
			$upload_img_banner = $this->upload->do_upload('gambar_banner');
			$img_banner = $this->upload->data();
            if ($upload_img_judul AND $upload_img_banner)
            {   
                $data = array(
                    'judul_post'       	=> $this->input->post('judul'),
                    'isi_post'     		=> $this->input->post('isi'),
                    'gambar_judul'     	=> $img_judul['file_name'],
                    'gambar_banner'     => $img_banner['file_name'],
                    'penulis' 			=> $this->input->post('penulis'),
                    'kategori_post'     => $this->input->post('kategori'),
                    'created_by'       	=> $this->input->post('created_by'),
                    'created_date'      => date('Y-m-d H:i:s'),
                    'updated_date' 		=> date('Y-m-d H:i:s'),
                    'status'   			=> $this->input->post('status')
                  
                );

                $this->M_general->Insert($this->TABLE, $data);
                ?>
                    <script>
                        alert('The data has been saved');
                        window.location.href='<?=base_url('admin/post'); ?>';
                    </script>
                <?php } else { ?>
                    <script>
                        alert('The data not has been saved');
                        window.history.back();
                    </script>
                <?php
            }
        }
	}
	
	public function edit(){
        $id = $this->input->post('id');
        
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        // $config['upload_path'] = './assets/uploads/'; //path folder
        $config['upload_path'] = './upload/image_post/'; 
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5048'; //maksimum besar file 2M
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
		$config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if($this->input->post('ganti_gambar') == "0"){
			$data = array(
				'judul_post'       	=> $this->input->post('judul'),
				'isi_post'     		=> $this->input->post('isi'),
				'penulis' 			=> $this->input->post('penulis'),
				'kategori_post'     => $this->input->post('kategori'),
				'created_by'       	=> $this->input->post('created_by'),
				'created_date'      => date('Y-m-d H:i:s'),
				'updated_date' 		=> date('Y-m-d H:i:s'),
				'status'   			=> $this->input->post('status')
			  
			);
			$prosesUpdate = $this->M_general->Update($this->TABLE, $data, $this->WHERE, $id);
			if($prosesUpdate){
				?>
				<script>
					alert('The data has been updated');
					window.location.href='<?=base_url('admin/post'); ?>';
				</script>
				<?php
			}else{
				?>
				<script>
					alert('The data not has been updated');
					// window.history.back();
				</script>
				<?php
			}
		}else{
			if(isset($_FILES['gambar_judul']['name']) AND isset($_FILES['gambar_banner']['name']))
			{
	
				$upload_img_judul = $this->upload->do_upload('gambar_judul');
				$img_judul = $this->upload->data();
				$upload_img_banner = $this->upload->do_upload('gambar_banner');
				$img_banner = $this->upload->data();
				if ($upload_img_judul AND $upload_img_banner)
				{   
					// delete gambar
					$data_gambar = $this->db->query("SELECT * FROM $this->TABLE WHERE $this->WHERE = '$id'")->row();
					$cek = $this->db->query("SELECT * FROM $this->TABLE WHERE $this->WHERE = '$id'")->num_rows();
					if($cek > 0){
						if(file_exists('./upload/image_post/'.$data_gambar->gambar_judul)AND file_exists('./upload/image_post/'.$data_gambar->gambar_banner)){
							unlink('./upload/image_post/'.$data_gambar->gambar_judul);
							unlink('./upload/image_post/'.$data_gambar->gambar_banner);
						}
						
					}
	
					$data = array(
						'judul_post'       	=> $this->input->post('judul'),
						'isi_post'     		=> $this->input->post('isi'),
						'gambar_judul'     	=> $img_judul['file_name'],
						'gambar_banner'     => $img_banner['file_name'],
						'penulis' 			=> $this->input->post('penulis'),
						'kategori_post'     => $this->input->post('kategori'),
						'created_by'       	=> $this->input->post('created_by'),
						'created_date'      => date('Y-m-d H:i:s'),
						'updated_date' 		=> date('Y-m-d H:i:s'),
						'status'   			=> $this->input->post('status')
					  
					);
	
					$this->M_general->Update($this->TABLE, $data, $this->WHERE, $id)
					?>
						<script>
							alert('The data has been updated');
							window.location.href='<?=base_url('admin/post'); ?>';
						</script>
					<?php } else { ?>
						<script>
							alert('The data not has been updated');
							window.history.back();
						</script>
					<?php
				}
			}
		}
        
	}

	function hapus($id){
		// delete gambar
		$data_gambar = $this->db->query("SELECT * FROM $this->TABLE WHERE $this->WHERE = '$id'")->row();
		$cek = $this->db->query("SELECT * FROM $this->TABLE WHERE $this->WHERE = '$id'")->num_rows();
		if($cek > 0){
			if(file_exists('./upload/image_post/'.$data_gambar->gambar_judul) AND file_exists('./upload/image_post/'.$data_gambar->gambar_banner)){
				unlink('./upload/image_post/'.$data_gambar->gambar_judul);
				unlink('./upload/image_post/'.$data_gambar->gambar_banner);
			}
			
		}

		$proses = $this->M_general->Delete($this->TABLE, $this->WHERE, $id);
		if($proses){
			// Sukses
			?>
			<script type="text/javascript">
				alert('The data has been deleted');
				window.location.href='<?= base_url('admin/post');?>';
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