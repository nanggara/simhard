<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class mdl_blastemail extends CI_Model {
 
	function __construct(){
		parent::__construct();
	}  
	
	function form_get_all($count,$offset,$perpage,$filter){
		$where = ""; 
		if(strlen($filter['txt_search'])>0){
			$where  = "where subjek like '%".$filter['txt_search']."%'";
		}
      	
		if($count){
			$query = "SELECT * from blastemail $where ";
		}else{
			$query = "SELECT * from blastemail $where order by tanggal asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
		}
		 
		return $this->db->query($query);
	} 
	function form_delete($kode){		
		$query = "delete from blastemail where kodeemail=".$kode; 
		return $this->db->query($query);
	}
	function select_blast_by_kode($kode){
		$query = "SELECT * from blastemail where kodeemail=".$kode;
		return $this->db->query($query);
	}
}