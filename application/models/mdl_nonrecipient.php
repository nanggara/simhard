<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class mdl_nonrecipient extends CI_Model {
 
	function __construct(){
		parent::__construct();
	}  
	
	function form_get_all($count,$offset,$perpage,$filter){
		$where = "where r.tipekeanggotaan='nonrecipient' ";
		if(strlen($filter)>0){
			$where  .= "and r.namalengkap like '".$filter."%' ";
		}
		if($count){
			$query = "SELECT r.*,i.institusi,
					(SELECT telepon FROM telepon WHERE regid=r.regidrec ORDER BY urut ASC OFFSET 0 ROWS FETCH NEXT 1 ROWS ONLY ) AS telepon,
					(SELECT email FROM daftaremail WHERE regid=r.regidrec ORDER BY urut ASC OFFSET 0 ROWS FETCH NEXT 1 ROWS ONLY ) AS email
					FROM recipient r 
					left join institusi i on  i.kodeinstitusi=r.kodeinstitusi $where ";
		}else{
			$query = "SELECT r.*,i.institusi,
					(SELECT telepon FROM telepon WHERE regid=r.regidrec ORDER BY urut ASC OFFSET 0 ROWS FETCH NEXT 1 ROWS ONLY ) AS telepon,
					(SELECT email FROM daftaremail WHERE regid=r.regidrec ORDER BY urut ASC OFFSET 0 ROWS FETCH NEXT 1 ROWS ONLY ) AS email
				    FROM recipient r 
					left join institusi i on  i.kodeinstitusi=r.kodeinstitusi $where order by r.namalengkap asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function form_get_byid($kode){ 
		$query = "Select *,date_format(tglmasukanggota,'%d-%m-%Y') as tglmasukanggotafrm,
				date_format(tanggallahir,'%d-%m-%Y') as tanggallahirfrm  from recipient where regidrec=".$kode;
		return $this->db->query($query);
	}
	function form_save($data,$kode){
		if($kode!=""){
			$this->db->where('regidrec', $kode);
			return $this->db->update('recipient', $data);
		}else{
			return $this->db->insert('recipient', $data);			 
		}
	}
	function update_profil_photo($kode,$filename){
		$this->db->where('regidrec', $kode);
		$data['photoprofil'] = $filename;
		return $this->db->update('recipient', $data);
	}
	function update_cv($kode,$filename){
		$this->db->where('regidrec', $kode);
		$data['cvpath'] = $filename;
		return $this->db->update('recipient', $data);
	}
	function form_delete_telepon($regid,$telepon){
		$query = "delete from telepon where regid=$regid and telepon not in ($telepon)";
		$this->db->query($query);
	}
	function form_telepon($regid,$telepon){
		$query = "select * from telepon where regid=$regid and telepon='$telepon'";
		if($this->db->query($query)->num_rows()==0){
			$data['regid'] = $regid;
			$data['telepon'] = $telepon;
			return $this->db->insert('telepon', $data);
		}else{
			return 0;
		}
	}
	function form_telepon_selectbyid($regid){
		$query = "select * from telepon where regid=$regid order by urut asc";
		return $this->db->query($query);
	}
	function form_delete_email($regid,$email){
		$query = "delete from daftaremail where regid=$regid and email not in ($email)";
		$this->db->query($query);
	}
	function form_email($regid,$email){
		$query = "select * from daftaremail where regid=$regid and email='$email'";
		if($this->db->query($query)->num_rows()==0){
			$data['regid'] = $regid;
			$data['email'] = $email;
			return $this->db->insert('daftaremail', $data);
		}else{
			return 0;
		}
	}
	function form_email_selectbyid($regid){
		$query = "select * from daftaremail where regid=$regid order by urut asc";
		return $this->db->query($query);
	}
	function form_delete($kode){		
		$query = "delete from recipient where regidrec=".$kode;
		$aff =  $this->db->query($query);
		if($aff){
			$query = "delete from daftaremail where regid=".$kode;
			$aff =  $this->db->query($query);
			if($aff){
				$query = "delete from telepon where regid=".$kode;
				$aff =  $this->db->query($query);
			}
		}
		
		return $aff;
	}
}