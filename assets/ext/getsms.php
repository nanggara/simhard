<?php
include("db_config.php");

mysql_pconnect($db_ci_hostname, $db_ci_username, $db_ci_password) or die("Could not connect");
mysql_select_db($db_ci_database) or die("Could not select database");
 
	$sql = "SELECT CONCAT('@p@',p.regidrec)  as id, p.namalengkap as name from recipient p "; 
	$sql .= "WHERE p.namalengkap LIKE '%%%".$_GET["q"]."%%' ";  
	$sql .= "UNION ALL ";
	$sql .= "SELECT CONCAT('@u@',p.kodeuniversitas)  as id, p.universitas as name from universitas p ";
	$sql .= "WHERE p.universitas LIKE '%%%".$_GET["q"]."%%' ";
	$sql .= "UNION ALL ";
	$sql .= "SELECT CONCAT('@k@',p.kodekelompok)  as id, p.kelompok as name from kelompok p ";
	$sql .= "WHERE p.kelompok LIKE '%%%".$_GET["q"]."%%' ";	
	$sql .= "UNION ALL ";
	$sql .= "SELECT 
			CONCAT('@thn@',DATE_FORMAT(p.tglmasukanggota,'%Y-%m-%d')) AS id, 
			CONCAT('Tahun Masuk: ',DATE_FORMAT(p.tglmasukanggota,'%Y')) AS name
			FROM  recipient p
			WHERE DATE_FORMAT(p.tglmasukanggota,'%Y') like '".$_GET["q"]."%' 
			GROUP BY DATE_FORMAT(p.tglmasukanggota,'%Y') ";	
	$sql .= "UNION ALL ";
	$sql .= "SELECT '@r@RECIPIENT' AS id, 'RECIPIENT' AS NAME "; 
	$sql .= "UNION ALL ";
	$sql .= "SELECT '@n@NONRECIPIENT' AS id, 'NONRECIPIENT' AS NAME ";
	$sql .= "LIMIT 0, 10 ";
	
	$arr = array();
	$rs = mysql_query($sql);
	while($obj = mysql_fetch_object($rs)) {
		$arr[] = $obj;
	}
	$json_response = json_encode($arr);
	/*if($_GET["callback"]) {
		$json_response = $_GET["callback"] . "(" . $json_response . ")";
	}*/
	echo $json_response;
 	
?>
