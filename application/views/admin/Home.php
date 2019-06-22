<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('M_general');        
        $this->load->helper(array('form', 'url'));
        include "public/plugin/qrcode/qrlib.php";
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('M_event');

    
    }

    public function index(){
        $tgl=date('Y-m-d');
        $sql="DELETE FROM t_booking where created_date!='$tgl'";
        $query=$this->db->query($sql);

        $user_id = $this->session->userdata('userid');
        $sql2="DELETE FROM t_transaction where status_registration='belum' AND user_id='$user_id'";
        $query=$this->db->query($sql2);

        $sql3="DELETE FROM t_ticket where status_registration='belum' AND user_id='$user_id'";
        $query=$this->db->query($sql3);



        $data['data_slide'] = $this->M_general->GetData('ms_slide')->result();
        
        $page = $this->input->get('per_page'); 
        if(!$page):     //jika page bernilai kosong maka batas akhirna akan di set 0
           $number = 0;
        else:
           $number = $page; // jika tidak kosong maka nilai batas akhir nya akan diset nilai page terakhir
        endif;

        // $sql= "DELETE "

        $jumlah_data = $this->M_event->jumlah_event($tgl);
        $this->load->library('pagination');
        $config['page_query_string'] = TRUE;
        $config['base_url'] = base_url();
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 6;
        $config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
        $config['full_tag_close'] = '</ul></nav>';
         
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
         
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
         
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
         
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
         
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
         
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        
        $this->pagination->initialize($config);      
        $data['data_event'] = $this->M_event->event_default($config['per_page'],$number,$tgl);
        $data['content'] = './guest/Home';
        $data['header'] = './guest/Header';
        $this->load->view('./guest/Main', $data);
    }


    public function search(){
        $user_id = $this->session->userdata('userid');
        $sql2="DELETE FROM t_transaction where status_registration='belum' AND user_id='$user_id'";
        $query=$this->db->query($sql2);

        $sql3="DELETE FROM t_ticket where status_registration='belum' AND user_id='$user_id'";
        $query=$this->db->query($sql3);


        $data['data_slide'] = $this->M_general->GetData('ms_slide')->result();
        $tgl=date('Y-m-d');
        $event=$this->input->get('event');
        $location=$this->input->get('location');
        $page = $this->input->get('per_page'); 
        if(!$page):     //jika page bernilai kosong maka batas akhirna akan di set 0
           $number = 0;
        else:
           $number = $page; // jika tidak kosong maka nilai batas akhir nya akan diset nilai page terakhir
        endif;


        $jumlah_data = $this->M_event->jumlah_cari_event($tgl,$event,$location);
        $this->load->library('pagination');
        $config['page_query_string'] = TRUE;
        $config['base_url'] = base_url().'home/search?event='.$event.'&location='.$location;
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 6;
        $config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
        $config['full_tag_close'] = '</ul></nav>';
         
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
         
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
         
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
         
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
         
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
         
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        
        $this->pagination->initialize($config);      
        $data['data_event'] = $this->M_event->event_cari($tgl,$config['per_page'],$number,$event,$location);
        $data['data_cek'] = $this->M_event->event_cek($tgl,$config['per_page'],$number,$event,$location);
        $data['content'] = './guest/Search';
        $data['header'] = './guest/Header';
        $this->load->view('./guest/Main', $data);
    }



    public function event($id){

        $user_id = $this->session->userdata('userid');
        $sql2="DELETE FROM t_transaction where status_registration='belum' AND user_id='$user_id'";
        $query=$this->db->query($sql2);

        $sql3="DELETE FROM t_ticket where status_registration='belum' AND user_id='$user_id'";
        $query=$this->db->query($sql3);


        $sql="SELECT DATE_FORMAT(ms_event.start_date_event, '%d %b') as tanggal, ms_event.end_date as tanggal_reg,
            DATE_FORMAT(ms_event.end_date_event, '%d %b') as tanggal2, ms_event.*, ms_host.*, ms_event_type.* FROM ms_event 
            LEFT JOIN ms_host ON ms_event.host_id = ms_host.host_id
            LEFT JOIN ms_event_type ON ms_event.eventtype_id = ms_event_type.eventtype_id
            where ms_event.event_id='$id' order by ms_event.start_date_event asc";
        $query = $this->db->query($sql);
        $data['detail_event'] = $query->result();
        $event = $query->row();

        $jml_tags = count($data['detail_event']);
         if($jml_tags > 0){
             $arrTags = explode("#",$data['detail_event'][0]->tags);
             $data['tags'] = $arrTags;
         }else{
             $data['tags'] = '';
         }      
        
        $data['content'] = './guest/Event';
        $data['header'] = './guest/Header';
        $this->load->view('./guest/Main', $data);
    }

    public function eventhost($id){

        $user_id = $this->session->userdata('userid');
        $sql2="DELETE FROM t_transaction where status_registration='belum' AND user_id='$user_id'";
        $query=$this->db->query($sql2);

        $sql3="DELETE FROM t_ticket where status_registration='belum' AND user_id='$user_id'";
        $query=$this->db->query($sql3);


        $event=$this->input->get('event');
        $location=$this->input->get('location');
        $page = $this->input->get('per_page'); 
        if(!$page):     //jika page bernilai kosong maka batas akhirna akan di set 0
           $number = 0;
        else:
           $number = $page; // jika tidak kosong maka nilai batas akhir nya akan diset nilai page terakhir
        endif;

        $sql="SELECT DATE_FORMAT(ms_event.start_date_event, '%d %b') as tanggal,
            DATE_FORMAT(ms_event.end_date_event, '%d %b') as tanggal2, ms_event.*, ms_host.*, ms_event_type.* FROM ms_event 
            LEFT JOIN ms_host ON ms_event.host_id = ms_host.host_id
            LEFT JOIN ms_event_type ON ms_event.eventtype_id = ms_event_type.eventtype_id
            where ms_event.host_id='$id' order by ms_event.start_date_event asc";
        $query = $this->db->query($sql);
        $jumlah_data = $query->num_rows();
        $this->load->library('pagination');
        $config['page_query_string'] = TRUE;
        $config['base_url'] = base_url().'home/eventhost/'.$id.'?event='.$event.'&location='.$location;
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 6;
        $config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
        $config['full_tag_close'] = '</ul></nav>';
         
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
         
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
         
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
         
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
         
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
         
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        
        $this->pagination->initialize($config); 
        $sql="SELECT DATE_FORMAT(ms_event.start_date_event, '%d %b') as tanggal,
            DATE_FORMAT(ms_event.end_date_event, '%d %b') as tanggal2, ms_event.*, ms_host.*, ms_event_type.* FROM ms_event 
            LEFT JOIN ms_host ON ms_event.host_id = ms_host.host_id
            LEFT JOIN ms_event_type ON ms_event.eventtype_id = ms_event_type.eventtype_id
            where ms_event.host_id='$id' order by ms_event.start_date_event asc LIMIT $number,6";
        $query = $this->db->query($sql);
        $data['data_event'] = $query->result();
        $data['eventhost'] = $query->row();
        $data['host_id']=$id;
        $this->load->view('./guest/Host', $data);
    }


    public function search_eventhost($id){

        $user_id = $this->session->userdata('userid');
        $sql2="DELETE FROM t_transaction where status_registration='belum' AND user_id='$user_id'";
        $query=$this->db->query($sql2);

        $sql3="DELETE FROM t_ticket where status_registration='belum' AND user_id='$user_id'";
        $query=$this->db->query($sql3);


        $location=$this->input->get('location');
        $page = $this->input->get('per_page'); 
        if(!$page):     //jika page bernilai kosong maka batas akhirna akan di set 0
           $number = 0;
        else:
           $number = $page; // jika tidak kosong maka nilai batas akhir nya akan diset nilai page terakhir
        endif;

        $sql="SELECT DATE_FORMAT(ms_event.start_date_event, '%d %b') as tanggal,
            DATE_FORMAT(ms_event.end_date_event, '%d %b') as tanggal2, ms_event.*, ms_host.*, ms_event_type.* FROM ms_event 
            LEFT JOIN ms_host ON ms_event.host_id = ms_host.host_id
            LEFT JOIN ms_event_type ON ms_event.eventtype_id = ms_event_type.eventtype_id
            where ms_event.host_id='$id' AND ms_event.location_area like '%$location%' order by ms_event.start_date_event asc";
        $query = $this->db->query($sql);
        $jumlah_data = $query->num_rows();
        $this->load->library('pagination');
        $config['page_query_string'] = TRUE;
        $config['base_url'] = base_url().'home/search_eventhost/'.$id.'?location='.$location;
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 6;
        $config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
        $config['full_tag_close'] = '</ul></nav>';
         
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
         
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
         
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
         
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
         
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
         
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        
        $this->pagination->initialize($config); 
        $sql="SELECT DATE_FORMAT(ms_event.start_date_event, '%d %b') as tanggal,
            DATE_FORMAT(ms_event.end_date_event, '%d %b') as tanggal2, ms_event.*, ms_host.*, ms_event_type.* FROM ms_event 
            LEFT JOIN ms_host ON ms_event.host_id = ms_host.host_id
            LEFT JOIN ms_event_type ON ms_event.eventtype_id = ms_event_type.eventtype_id
            where ms_event.host_id='$id' AND ms_event.location_area like '%$location%' 
            order by ms_event.start_date_event asc LIMIT $number,6";
        $query = $this->db->query($sql);
        $data['data_event'] = $query->result();
        $data['eventhost'] = $query->row();
        $data['host_id']=$id;
        $this->load->view('./guest/Host', $data);
    }

    public function detail_ticket($id){ 
        $user_id = $this->session->userdata('userid');
        $sql2="DELETE FROM t_transaction where status_registration='belum' AND user_id='$user_id'";
        $query=$this->db->query($sql2);

        $sql3="DELETE FROM t_ticket where status_registration='belum' AND user_id='$user_id'";
        $query=$this->db->query($sql3);


        $this->load->view('./guest/Detail_ticket', $data);
    }

    public function ticket_cart(){
        $user_id = $this->session->userdata('userid');
        $sql2="DELETE FROM t_transaction where status_registration='belum' AND user_id='$user_id'";
        $query=$this->db->query($sql2);

        $sql3="DELETE FROM t_ticket where status_registration='belum' AND user_id='$user_id'";
        $query=$this->db->query($sql3);


        if (isset($user_id)) {
            $sql = "
            SELECT DATE_FORMAT(ms_event.start_date_event, '%d %b') as tanggal,
            DATE_FORMAT(ms_event.end_date_event, '%d %b') as tanggal2, t_booking.*, ms_event.*, ms_host.*, ms_event_type.* FROM ms_event 
            LEFT JOIN ms_host ON ms_event.host_id = ms_host.host_id
            LEFT JOIN t_booking ON ms_event.event_id = t_booking.event_id
            LEFT JOIN ms_event_type ON ms_event.eventtype_id = ms_event_type.eventtype_id
            where t_booking.user_id='$user_id'";
        } else {
            $sql = "
            SELECT DATE_FORMAT(ms_event.start_date_event, '%d %b') as tanggal,
            DATE_FORMAT(ms_event.end_date_event, '%d %b') as tanggal2, t_booking.*, ms_event.*, ms_host.*, ms_event_type.* FROM ms_event 
            LEFT JOIN ms_host ON ms_event.host_id = ms_host.host_id
            LEFT JOIN t_booking ON ms_event.event_id = t_booking.event_id
            LEFT JOIN ms_event_type ON ms_event.eventtype_id = ms_event_type.eventtype_id
            where t_booking.session_id='$_SESSION[session]'";
        }

        
        
        $query = $this->db->query($sql);
        $data['cek'] = $query->num_rows();
        $data['data_ticket'] = $query->result();

        $data['content'] = './guest/Ticket_cart';
        $data['header'] = './guest/Header';
        $this->load->view('./guest/Main', $data);
    }


    public function checkout(){
        if($this->session->userdata('status') != "loginUser"){
            redirect(base_url("login"));
        }

        $user_id = $this->session->userdata('userid');
        $sql2="DELETE FROM t_transaction where status_registration='belum' AND user_id='$user_id'";
        $query=$this->db->query($sql2);

        $sql3="DELETE FROM t_ticket where status_registration='belum' AND user_id='$user_id'";
        $query=$this->db->query($sql3);

        $sqlQuery="SELECT DATE_FORMAT(ms_event.start_date_event, '%d %b') as tanggal,
            DATE_FORMAT(ms_event.end_date_event, '%d %b') as tanggal2, t_booking.*, ms_event.*, ms_host.*, ms_event_type.* FROM ms_event 
            LEFT JOIN ms_host ON ms_event.host_id = ms_host.host_id
            LEFT JOIN t_booking ON ms_event.event_id = t_booking.event_id
            LEFT JOIN ms_event_type ON ms_event.eventtype_id = ms_event_type.eventtype_id
            where t_booking.user_id='$user_id'";
        $query = $this->db->query($sqlQuery);
        $data['data'] = $query->result();


        $sqlQuery="SELECT sum(total_price) as total_price from t_booking where user_id='$user_id'";
        $query = $this->db->query($sqlQuery);

        $sqlQuery1="SELECT sum(total_price) as total_price from t_booking where user_id='$user_id'";
        $query = $this->db->query($sqlQuery1);
        $data['total1'] = $query->row();


        $sql="SELECT * FROM ms_user where id='$user_id'";
        $query = $this->db->query($sql);
        $data['user']=$query->row();

        
        $data['link']= 'checkout';
        $data['content'] = './guest/Checkout';
        $data['header'] = './guest/Header';
        $this->load->view('./guest/Main', $data);
    }


    public function checkout_confirm($id){
        if($this->session->userdata('status') != "loginUser"){
            redirect(base_url("login"));
        }
        
        $userId = $this->session->userdata('userid');

        $sqlQuery="SELECT DATE_FORMAT(ms_event.start_date_event, '%d %b') as tanggal,
            DATE_FORMAT(ms_event.end_date_event, '%d %b') as tanggal2, t_booking.*, ms_event.*, ms_host.*, ms_event_type.* FROM ms_event 
            LEFT JOIN ms_host ON ms_event.host_id = ms_host.host_id
            LEFT JOIN t_booking ON ms_event.event_id = t_booking.event_id
            LEFT JOIN ms_event_type ON ms_event.eventtype_id = ms_event_type.eventtype_id
            where t_booking.user_id='$userId'";
        $query = $this->db->query($sqlQuery);
        $data['data'] = $query->result();
        $data['order_id']= $id;

        $sqlQuery1="SELECT sum(total_price) as total_price from t_booking where user_id='$userId'";
        $query = $this->db->query($sqlQuery1);
        $data['total1'] = $query->row();

        $sql="SELECT * FROM ms_user where id='$userId'";
        $query = $this->db->query($sql);
        $data['user']=$query->row();
            
        $data['link']= 'confirm';
        $data['content'] = './guest/Checkout_confirm';
        $this->load->view('./guest/Main', $data);
    }

    public function checkout_payment(){
        if($this->session->userdata('status') != "loginUser"){
            redirect(base_url("login"));
        }

        
        $userId = $this->session->userdata('userid');

        $sqlQuery="SELECT * FROM t_transaction where order_status_id='0' AND user_id='$userId' order by transaction_id";
        $query = $this->db->query($sqlQuery);
        $order = $query->row();
        $data['order_id'] = $order->order_id;
        $order_id = $order->order_id;


        $data2 = array (
            'status_registration' => 'selesai',
            'order_status_id' => '1'
        );
        $data3 = array (
            'status_registration' => 'selesai'
        );

        $proses = $this->M_general->Update('t_transaction', $data2, 'order_id', $order_id);
        $proses = $this->M_general->Update('t_ticket', $data3, 'order_id', $order_id);

        $proses = $this->M_general->Delete('t_booking','user_id', $userId);

        $sqlQuery="SELECT sum(price) as price FROM t_ticket where order_id='$order_id'";
        $query = $this->db->query($sqlQuery);
        $data['harga'] = $query->row();

        $sqlQuery="SELECT * FROM ms_bank";
        $query = $this->db->query($sqlQuery);
        $data['bank'] = $query->row();

        

        $data['content'] = './guest/Checkout_payment';
        $data['header'] = './guest/Header';
        $this->load->view('./guest/Main', $data);
    }

    public function payment_confirm(){
        if($this->session->userdata('status') != "loginUser"){
            redirect(base_url("login"));
        }

        $user_id = $this->session->userdata('userid');
        $sql2="DELETE FROM t_transaction where status_registration='belum' AND user_id='$user_id'";
        $query=$this->db->query($sql2);

        $sql3="DELETE FROM t_ticket where status_registration='belum' AND user_id='$user_id'";
        $query=$this->db->query($sql3);


        $userId = $this->session->userdata('userid');
        $order_id = $this->input->get('order_id');

        $data3 = array (
            'status_registration' => 'selesai'
        );

        $proses = $this->M_general->Update('t_transaction', $data3, 'order_id', $order_id);
        $proses = $this->M_general->Update('t_ticket', $data3, 'order_id', $order_id);


        $sqlQuery="SELECT * FROM t_transaction where order_status_id='1' AND user_id='$userId'";
        $query = $this->db->query($sqlQuery);
        $data['order'] = $query->result(); 

        $sqlQuery2 = "SELECT *, SUM(price) AS total_price FROM t_ticket where order_id='$order_id'";
        $query2 = $this->db->query($sqlQuery2);
        $data['nominal'] = $query2->row();      

        $sqlQuery="SELECT * FROM ms_bank";
        $query = $this->db->query($sqlQuery);
        $data['bank'] = $query->row();

        $data['content'] = './guest/Payment_confirm';
        $data['header'] = './guest/Header';
        $this->load->view('./guest/Main', $data);
    }

    public function complete_payment(){

        $user_id = $this->session->userdata('userid');
        $sql2="DELETE FROM t_transaction where status_registration='belum' AND user_id='$user_id'";
        $query=$this->db->query($sql2);

        $sql3="DELETE FROM t_ticket where status_registration='belum' AND user_id='$user_id'";
        $query=$this->db->query($sql3);


        if($this->session->userdata('status') != "loginUser"){
            redirect(base_url("login"));
        }
        
        $data['content'] = './guest/Complete_payment';
        $data['header'] = './guest/Header';
        $this->load->view('./guest/Main', $data);
    }
}
