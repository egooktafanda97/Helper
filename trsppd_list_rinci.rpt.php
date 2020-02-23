<?php 
function rp($rupiah = null){
		$rp = "Rp. ".number_format($rupiah,2,",",".");
		return $rp;
}
	$vaData	= array() ; 
	$dbData	= $scDb->Browse("rincian,sppd","*","rincian.code = sppd.code AND rincian.tgl LIKE '%$data%' Order by tgl DESC") ; 
	$nRow 	= 1;
	$vaData[]		= array("NO"=>1,"Code"=>2,"Memberi Perintah"=>3,"DI perintah"=>4,"Uang Muka"=>5,"Uang Jalan"=> 6,"Uang Lain"=> 7,"Uang Sisa"=> 8,"Tanggal"=> 9) ;

	while($dbRow 	= $scDb->GetRow($dbData)){	
		$pjb = $dbRow['nip_pejabat'];
		$diperintah = $dbRow['nip_leader'];
		$db_ 	= scSys::GetKeterangan("nama","nip = '$pjb'","pegawai") ;
		$db__ 	= scSys::GetKeterangan("nama","nip = '$diperintah'","pegawai") ;
		$vaData[]		= array("NO"=>$nRow++,
						  "Code"=>$dbRow['code'],
						  "Memberi Perintah"=> $db_['nama'],
						  "DI perintah" 	=> $db__['nama'],
						  "Uang Muka" => rp($dbRow['uang_muka']),
						  "Uang Jalan"=> rp($dbRow['uang_jalan']),
						  "Uang Lain"=>  rp($dbRow['lain_lain']),
						  "Uang Sisa"=>  rp($dbRow['sisa']),
						  "Tanggal"=> $dbRow['tgl']


						);
	} 

	$vaDate 	= scDate::Date2Var(date("Y-m-d")) ; 
	$nFont		= 8 ; 
	$pdf 		= new Cezpdf("A4","L",$vaOpt) ; 
	$pdf->ezHeader("<b>PT Nasional Hijau Lestari</b>",array("fontSize"=>$nFont+2));
	$pdf->ezHeader("<b>Daftar Karyawan Sistem Informasi Pengajuan Perjalanan Dinas</b>",array("fontSize"=>$nFont+2)); 
	$pdf->ezHeader("<b>Bulan ".$vaDate['Bulan'] . " " . $vaDate['Tahun'] ."</b>",array("fontSize"=>$nFont+2)); 
	$pdf->ezHeader("") ; 
	$pdf->ezTable($vaData,"","",array("fontSize"=>$nFont, 
						"cols"=>array("NO"=>array("width"=>3,"justification"=>"center"), 
									"NAMA"=>array("width"=>12,"wrap"=>1,"justification"=>"center"),
									"NIK"=>array("width"=>8,"wrap"=>1,"justification"=>"center"),
									"ALAMAT"=>array("width"=>16,"wrap"=>1,"justification"=>"center"),  
									"DEPARTEMEN"=>array("width"=>10,"wrap"=>1,"justification"=>"center"),
									//"PANGKAT;TMT"=>array("width"=>4,"wrap"=>1,"justification"=>"center"),
									"JABATAN"=>array("width"=>10,"wrap"=>1,"justification"=>"center"),
									//"JABATAN;TMT"=>array("width"=>4,"wrap"=>1,"justification"=>"center"),
									"MASA KERJA;THN"=>array("width"=>4,"wrap"=>1,"justification"=>"center"),
									"MASA KERJA;THN"=>array("width"=>4,"wrap"=>1,"justification"=>"center") ))) ; 
	$pdf->ezStream() ; 

?>
