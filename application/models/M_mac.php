<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_mac extends CI_Model{
    public function mac_address(){
		 //Cara mudah dan sederhana mendapatkan mac address  
		 // Turn on output buffering  
		 // ob_start();  
		 // //mendapatkan detail ipconfing menggunakan CMD  
		 // system('ipconfig /all');  
		 // // mendapatkan output kedalam variable  
		 //   $mycom=ob_get_contents();  
		 // // membersihkan output buffer  
		 //   ob_clean();  
		 // $findme = "Physical";  
		 // // mencari perangkat fisik | menemukan posisi text perangkat fisik  
		 // //Search the "Physical" | Find the position of Physical text  
		 // $pmac = strpos($mycom, $findme);  
		 // // mendapatkan alamat peragkat fisik  
		 // $mac=substr($mycom,($pmac+36),17);  
		 // //menampilkan Mac Address  
		 // return $mac;  

    	

ob_start();
    system('getmac');
    $Content = ob_get_contents();
    ob_clean();
    return substr($Content, strpos($Content,'\\')-20, 17);

	}


}
?> 