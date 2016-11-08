<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class mdl_reports extends CI_Model {
 
	function __construct(){
		parent::__construct(); 
		
		
	}  
	function count_fakultas($periode1,$periode2,$universitas){
		$sql = "select count(fakultas) as jumlah,r.fakultas 
				from recipient r 
				inner join universitas u on u.kodeuniversitas=r.kodeuniversitas
				where 
				CONVERT(VARCHAR(7),r.tglmasukanggota,126) between '".$periode1."' and '".$periode2."' 
						and r.kodeuniversitas=".$universitas."
				group by fakultas";
		 
		return $this->db->query($sql);
	}
	function count_universitas_by($tahun,$periode1,$periode2,$kodeuniversitas,$kelompok,$universitas){
		$sql = "select r.*,u.universitas 
		        from recipient r 
		        inner join universitas u on u.kodeuniversitas=r.kodeuniversitas
		        where year(r.tglmasukanggota)='".$tahun."' and
				CONVERT(VARCHAR(7),r.tglmasukanggota,126) between '".$periode1."' and '".$periode2."' ";
		if($kelompok!="0"){
			$sql .= " and r.kodekelompok=".$kelompok." ";
		}
		
		if($universitas!="0"){
			$sql .= " and r.kodeuniversitas=".$universitas." ";
		}				
		$sql .= "and r.kodeuniversitas=".$kodeuniversitas;
		 
		return $this->db->query($sql);
	}
	function count_universitas_bychart($periode1,$periode2,$kodeuniversitas,$kelompok,$universitas){
		$sql = "select r.*,u.universitas,u.singkatan
		        from recipient r
		        inner join universitas u on u.kodeuniversitas=r.kodeuniversitas where
		        CONVERT(VARCHAR(7),r.tglmasukanggota,126) between '".$periode1."' and '".$periode2."' ";
		if($kelompok!="0"){
			$sql .= " and r.kodekelompok=".$kelompok." ";
		}
	
		if($universitas!="0"){
			$sql .= " and r.kodeuniversitas=".$universitas." ";
		}
		$sql .= "and r.kodeuniversitas=".$kodeuniversitas;
			
		return $this->db->query($sql);
	}
	function select_tahun_anggota($periode1,$periode2,$kelompok,$universitas){
		$sql = "select tahun from				( 						select CONVERT(VARCHAR(4),tglmasukanggota,126) as tahun,CONVERT(VARCHAR(7),tglmasukanggota,126) as tahunbulan
				from recipient 
				where tglmasukanggota is not null and tipekeanggotaan='recipient'
				and CONVERT(VARCHAR(7),tglmasukanggota,126) between '".$periode1."' and '".$periode2."' 								) as x ";
		if($kelompok!="0"){
			$sql .= " and kodekelompok=".$kelompok." ";
		}
		
		if($universitas!="0"){
			$sql .= " and kodeuniversitas=".$universitas." ";
		}
		
		$sql .= "group by tahun";
		
		return $this->db->query($sql);	
	}
	function select_detail_tahun($kodeuniversitas,$tahun){
		$sql = "select u.universitas, r.fakultas,count(r.fakultas) as jumlah
				from recipient r
				inner join universitas u on u.kodeuniversitas=r.kodeuniversitas
				where CONVERT(VARCHAR(4),tglmasukanggota,126) ='".$tahun."' ";
		if(strlen($kodeuniversitas)>0){
			$sql .= "and r.kodeuniversitas=".$kodeuniversitas." ";
		}
		$sql .="group by r.fakultas";
		return $this->db->query($sql);
	}
	function select_detail($kodeuniversitas,$periode1,$periode2){
		$sql = "select u.universitas, r.fakultas,count(r.fakultas) as jumlah 
				from recipient r
				inner join universitas u on u.kodeuniversitas=r.kodeuniversitas
				where CONVERT(VARCHAR(7),tglmasukanggota,126)  between '".$periode1."' and '".$periode2."' ";
		if(strlen($kodeuniversitas)>0){
			$sql .= "and r.kodeuniversitas=".$kodeuniversitas." ";
		}
		$sql .="group by r.fakultas";
		return $this->db->query($sql);
	} 
	function select_detailanggota($kodeuniversitas,$fklts,$tahun){
		$sql = "select r.*,u.universitas, k.kelompok 
				from recipient r
				inner join universitas u on u.kodeuniversitas=r.kodeuniversitas
				inner join kelompok k on k.kodekelompok=r.kodekelompok
				where CONVERT(VARCHAR(4),r.tglmasukanggota,126) ='".$tahun."' ";
		if(strlen($kodeuniversitas)>0){
			$sql .= "and r.kodeuniversitas='".$kodeuniversitas."' ";
		} 
		if(strlen($fklts)>0){ 
			$sql .= "and r.fakultas='".$fklts."' ";
		} 
	 	 
		return $this->db->query($sql);
	}
	function select_detailanggota_periode($kodeuniversitas,$fklts,$periode1,$periode2){
		$sql = "select r.*,u.universitas, k.kelompok
				from recipient r
				inner join universitas u on u.kodeuniversitas=r.kodeuniversitas
				inner join kelompok k on k.kodekelompok=r.kodekelompok
				where CONVERT(VARCHAR(7),tglmasukanggota,126)  between '".$periode1."' and '".$periode2."' ";
		if(strlen($kodeuniversitas)>0){
			$sql .= "and r.kodeuniversitas='".$kodeuniversitas."' ";
		}
		if(strlen($fklts)>0){
			$sql .= "and r.fakultas='".$fklts."' ";
		}
	 	
		return $this->db->query($sql);
	}
	function form_get_all($count,$offset,$perpage,$filter){
		$where = ""; 
		if(strlen($filter['txt_search'])>0){
			$where  = "where judul like '%".$filter['txt_search']."%'";
		}
      	
		if($count){
			$query = "SELECT * from greetings $where ";
		}else{
			$query = "SELECT * from greetings $where order by judul asc limit $offset,$perpage";
		}
		
		return $this->db->query($query);
	}
	function form_get_byid($kode){ 
		$query = "Select * from greetings where idgreeting=".$kode;
		return $this->db->query($query);
	}
	function form_save($data,$kode){
		if($kode!=""){
			$this->db->where('idgreeting', $kode);
			return $this->db->update('greetings', $data);
		}else{
			return $this->db->insert('greetings', $data);			 
		}
	} 
	function form_delete($kode){		
		$query = "delete from greetings where idgreeting=".$kode; 
		return $this->db->query($query);
	}
	
	function select_tahun_anggotainstitusi($periode1,$periode2,$institusi){
		$sql = "select tahun from( 						select date_format(tglmasukanggota,'%Y') as tahun,date_format(tglmasukanggota,'%Y-%m') as tahunbulan
				from recipient
				where tglmasukanggota is not null and tipekeanggotaan='recipient'
				and CONVERT(VARCHAR(7),tglmasukanggota,126)  between '".$periode1."' and '".$periode2."' 								) as x ";		  
		if($institusi!="0"){
			$sql .= " and kodeinstitusi=".$institusi." ";
		}
	
		$sql .= "group by tahun";
	
		return $this->db->query($sql);
	}
	function select_detailinstitusi($kodeinstitusi,$periode1,$periode2){
		$sql = "select i.institusi,count(i.institusi) as jumlah
				from recipient r
				inner join institusi i on i.kodeinstitusi=r.kodeinstitusi
				where CONVERT(VARCHAR(7),r,tglmasukanggota,126)  between '".$periode1."' and '".$periode2."' ";
		if(strlen($kodeinstitusi)>0 & $kodeinstitusi>0){
			$sql .= "and r.kodeinstitusi=".$kodeinstitusi." ";
		}
		$sql .="group by i.institusi"; 
		return $this->db->query($sql);
	}
	function select_detailanggotainstitusi($kodeinstitusi,$periode1,$periode2){
		$sql = "select r.*,i.institusi
				from recipient r
				inner join institusi i on i.kodeinstitusi=r.kodeinstitusi
				where CONVERT(VARCHAR(7),r.tglmasukanggota,126)  between '".$periode1."' and '".$periode2."' ";
		if(strlen($kodeinstitusi)>0){
			$sql .= "and r.kodeinstitusi=".$kodeinstitusi." ";
		} 
		return $this->db->query($sql);
	}
}