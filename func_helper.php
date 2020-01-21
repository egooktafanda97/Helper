<?php
// membuat format rupiah
	function rupiah($rupiah = null){
		$rp = "Rp. ".number_format($rupiah,2,",",".");
		return $rp;

	}

 	function random($length = 8){
			$data = 'ABCDEFGHIJKLMNOPQRSTU1234567890';
		    $string = '';
		    for($i = 0; $i < $length; $i++) {
		        $pos = rand(0, strlen($data)-1);
		        $string .= $data{$pos};
		    }
		    return $string;
			
		}




	function acak($str) {
            $kunci = '979a218e0632df2935317f98d47956c7';
            $hasil = '';
            for ($i = 0; $i < strlen($str); $i++) {
                $karakter = substr($str, $i, 1);
                $kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
                $karakter = chr(ord($karakter)+ord($kuncikarakter));
                $hasil .= $karakter;
            }
            return urlencode(base64_encode($hasil));
        }
    function susun($str) {
            $str = base64_decode(urldecode($str));
            $hasil = '';
            $kunci = '979a218e0632df2935317f98d47956c7';
            for ($i = 0; $i < strlen($str); $i++) {
                $karakter = substr($str, $i, 1);
                $kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
                $karakter = chr(ord($karakter)-ord($kuncikarakter));
                $hasil .= $karakter;
            }
            return $hasil;
        }
    function tgl($tgl){
        $tn = explode('/', $tgl);
        $tn = $tn[2].'-'.$tn[0].'-'.$tn[1];
        return $tr;
    }

    function send_Email($email,$pesan){
		$config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'dikic071@gmail.com',
            'smtp_pass' => 'agustus2019',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
           ];

           $CI =& get_instance();
	        // Load library email dan konfigurasinya
	        $CI->load->library('email', $config);

	        // Email dan nama pengirim
	        $CI->email->from('dikic071@gmail.com', 'ARD PICTURE');

	        // Email penerima
	        $CI->email->to($email); // Ganti dengan email tujuan kamu

	        // Lampiran email, isi dengan url/path file
	        //$this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

	        // Subject email
	        $CI->email->subject('Informasi Pesanan anda');

	        // Isi email
	        $CI->email->message($pesan);

	        // Tampilkan pesan sukses atau error
	        if ($CI->email->send()) {
	        	
	        } else {
	            echo 'Error! email tidak dapat dikirim.';
	        }
	}
	function api_json($url){
		$jsons = $url;

		$son = file_get_contents($jsons);
		return $son = json_decode($son);
	}

	function send_Telegram($key,$id_chat,$pesan){
		$pesan = urlencode();
		$token = "bot".$key;
		$chat_id = $id_chat;
		$proxy = "";
		//<ip_proxy>:<port>
		$url = "https://api.telegram.org/$token/sendMessage?parse_mode=markdown&chat_id=$chat_id&text=$pesan";

		$ch = curl_init();
			
		if($proxy==""){
			$optArray = array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_CAINFO => "C:\cacert.pem"	
			);
		}
		else{ 
			$optArray = array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_PROXY => "$proxy",
				CURLOPT_CAINFO => "C:\cacert.pem"	
			);	
		}
			
		curl_setopt_array($ch, $optArray);
		$result = curl_exec($ch);
			
		$err = curl_error($ch);
		curl_close($ch);	
			
		if($err<>"") echo "Error: $err";
		else echo "Pesan Terkirim";

	}

	function up_img($imges,$url){
		    $CI =& get_instance();
			$config['upload_path']          = './'.$url; 
	        $config['allowed_types']        = 'gif|jpg|png|jpeg|JPG|PNG';
	        $config['max_size']             = 500000;

	   		$config['width']     = 75;
			$config['height']   = 50;
			$CI->load->library('image_lib', $config); 
			$CI->image_lib->resize();


			$config['overwrite']=TRUE;
			$config['encrypt_name'] = TRUE;
			$new_name = time();
			$config['file_name'] = $new_name;
			
	        $CI->load->library('upload', $config);
	        $CI->upload->initialize($config);
	        // ------------------------------------------
	       if ( ! $CI->upload->do_upload($imges)){
	           $error = array('error' => $CI->upload->display_errors());
	           var_dump($error);
	            //echo "Foto harus di upload paling tida satu";
			}else{
				$image = $CI->upload->data('file_name');
	            return  $image;
			}
 		}

 		// format tanggal indonesia
 	function tgl_i($tanggal)
	{
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	}

	function bln_i($bln)
	{
		$bulan = array (1 =>   'Januari',
					'Februari',
					'Maret',
					'April',
					'Mei',
					'Juni',
					'Juli',
					'Agustus',
					'September',
					'Oktober',
					'November',
					'Desember'
				);
		
		return $bulan[ (int)$bln ] ;
	}
	function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
	}

	function random_color() {
	    return random_color_part() . random_color_part() . random_color_part();
	}
	function hari($hari){
		switch ($hari) {
		    case "Monday": 
		    $hr = "Senin";  
		        break;
		    case "Tuesday":
		     $hr = "Selasa"; 
		        break;
		    case "Wednesday":
		     $hr = "Rabu";   
		        break;
		    case "Thursday":  
		     $hr = "Kamis";  
		        break;
		    case "Friday":
  				 $hr = "Jum`at"; 
		        break;
		    case "Saturday":
		     $hr = "Sabtu"; 
		        break;
		    case "Sunday":
		     $hr = "Minggu"; 
		        break;
		    default:
		        "";        
		}
		return $hr;
	}
	function class_btn_random(){
		$rand = mt_rand(1, 6 - 2);
		if ($rand == 1) {
			$cls = "success";
		}else if ($rand == 2) {
			$cls = "primary";
		}else if ($rand == 3) {
			$cls = "warning";
		}else if ($rand == 4) {
			$cls = "info";
		}else if ($rand == 5) {
			$cls = "secondary";
		}else if ($rand == 6) {
			$cls = "light";
		}
		return $cls; 
	}
	function kunci($str){
		$look = "abzktyfjekpudwkcht";
		$CI =& get_instance();
		$CI->load->library('Cipher');
		$cipher = new Cipher(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
		$bungkus = $cipher->encrypt($str,$look);
		return $bungkus;

	}
	function buka($code){
		$CI =& get_instance();
		$look = "abzktyfjekpudwkcht";
		$CI->load->library('Cipher');
		$cipher = new Cipher(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
		$lihat = $cipher->decrypt($code, $look);
		return $lihat;
	}
	function unsets($key){
		$CI =& get_instance();
		$CI->session->unset_userdata($key);
	}

	function modal($judul,$pesan){
		echo '<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">'.$judul.'</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		       <div class="isi_modal">'.$pesan.'</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>';
	}
	

?>
