<?php
// event_status = 1 (ebanbled)
defined('BASEPATH') OR exit('No direct script access allowed');
class M_event extends CI_Model{
	function event_default($offset,$number,$tanggal){
		return $query = $this->db->query("SELECT DATE_FORMAT(ms_event.start_date_event, '%d %b') as tanggal,
			DATE_FORMAT(ms_event.end_date_event, '%d %b') as tanggal2, ms_event.*, ms_host.*, ms_event_type.* 
			FROM ms_event
			LEFT JOIN ms_host ON  ms_event.host_id = ms_host.host_id
			LEFT JOIN ms_event_type ON  ms_event.eventtype_id = ms_event_type.eventtype_id
			where
            ms_event.end_date >= '$tanggal' AND ms_event.event_status ='1' AND ms_event.type_event='Non Private'
            order by ms_event.start_date_event asc limit $number,$offset")->result();	
	}

	function event_cari($tanggal,$offset,$number,$event,$location){
		return $query = $this->db->query("SELECT DATE_FORMAT(ms_event.start_date_event, '%d %b') as tanggal,
			DATE_FORMAT(ms_event.end_date_event, '%d %b') as tanggal2, ms_event.*, ms_host.*, ms_event_type.* FROM ms_event

			LEFT JOIN ms_host ON  ms_event.host_id = ms_host.host_id
			LEFT JOIN ms_event_type ON  ms_event.eventtype_id = ms_event_type.eventtype_id
			where 
            (ms_event.event_name like '%$event%' OR ms_event.tags like '%$event%') AND
            ms_event.location_area like '%$location%' AND 
            ms_event.end_date >= '$tanggal' AND ms_event.event_status ='1' AND ms_event.type_event='Non Private'
            order by ms_event.start_date_event asc
            limit $number,$offset")->result();		
	}

	function event_cek($tanggal,$offset,$number,$event,$location){
		return $query = $this->db->query("SELECT DATE_FORMAT(ms_event.start_date_event, '%d %b') as tanggal,
			DATE_FORMAT(ms_event.end_date_event, '%d %b') as tanggal2, ms_event.*, ms_host.*, ms_event_type.* FROM ms_event

			LEFT JOIN ms_host ON  ms_event.host_id = ms_host.host_id
			LEFT JOIN ms_event_type ON  ms_event.eventtype_id = ms_event_type.eventtype_id
			where 
            (ms_event.event_name like '%$event%' OR ms_event.tags like '%$event%') AND
            ms_event.location_area like '%$location%' AND 
            ms_event.end_date >= '$tanggal' AND ms_event.event_status ='1' 
            AND ms_event.type_event='Non Private'
            order by ms_event.start_date_event asc
            limit $number,$offset")->result();		
	}
 
	function jumlah_event($tanggal){
		return $query = $this->db->query("SELECT * FROM ms_event where end_date >= '$tanggal' AND ms_event.event_status ='1' AND ms_event.type_event='Non Private'")->num_rows();
	}


	function jumlah_cari_event($tanggal,$event,$location){
		return $query = $this->db->query("SELECT * FROM ms_event where event_name like '%$event%' AND location_area like '%$location%' AND end_date >= '$tanggal' AND ms_event.event_status ='1' AND ms_event.type_event='Non Private'")->num_rows();
	}


}
?>