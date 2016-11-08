<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class mdl_manajemenuser extends CI_Model {
 
	function __construct(){
		parent::__construct();
	}  
	
	function form_get_all($count,$offset,$perpage,$filter){
		$where = " ";
		if(strlen($filter)>0){
			$where  = "where username like '".$filter."%' ";
		} 		if($count){		
			$query = "	SELECT * FROM zuser 
						$where order by username asc";		}else{		
			$query = "	SELECT * FROM zuser 
						$where order by username asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";		}				
		return $this->db->query($query);
	}
	function form_get_byid($kode){ 
		$query = "SELECT u.*,t.grupid
				  FROM zuser u
				  INNER JOIN ztrustee t ON t.userid=u.userid
				  where u.userid=".$kode;
		return $this->db->query($query);
	}
	function form_save($data,$kode){
		if($kode!=""){
			$this->db->where('userid', $kode);
			return $this->db->update('zuser', $data);
		}else{
			return $this->db->insert('zuser', $data);			 
		}
	}
	function form_delete($kode,$grupid){
		$query = "delete from zuser where userid=".$kode;
		$aff = $this->db->query($query);
		if($aff){
			$query = "delete from ztrustee where userid=".$kode." and grupid=".$grupid;
			$aff = $this->db->query($query);
		}
		return $aff;
	}
	function zgrup_select_all(){
		$query = "select * from zgrup";
		return $this->db->query($query);
	}
	function ztrustee_select_all_by($userid,$grupid){
		$aff = 0;
		$query = "select * from ztrustee where userid=".$userid." and grupid=".$grupid;
		if($this->db->query($query)->num_rows()==0){
			$data["userid"] = $userid;
			$data["grupid"] = $grupid;
			$aff = $this->db->insert('ztrustee', $data);
		}
		return $aff;
	}
}