<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class mdl_emailtemplate extends CI_Model {
 
	function __construct(){
		parent::__construct();
	}  
	
	function form_get_all($count,$offset,$perpage,$filter){
		$where = ""; 
		if(strlen($filter['txt_search'])>0){
			$where  = "where judul like '%".$filter['txt_search']."%'";
		}
      	
		if($count){
			$query = "SELECT * from template $where ";
		}else{
			$query = "SELECT * from template $where order by judul asc OFFSET $offset ROWS FETCH NEXT $perpage  ROWS ONLY";
		}
		
		return $this->db->query($query);
	}
	function form_get_byid($kode){ 
		$query = "Select * from template where idtemplate=".$kode;
		return $this->db->query($query);
	}
	function form_save($data,$kode){
		if($kode!=""){
			$this->db->where('idtemplate', $kode);
			return $this->db->update('template', $data);
		}else{
			return $this->db->insert('template', $data);			 
		}
	} 
	function form_delete($kode){		
		$query = "delete from template where idtemplate=".$kode; 
		return $this->db->query($query);
	}
}