<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class mdl_institusi extends CI_Model 
{ 
	function __construct(){
		parent::__construct();
	}  
	function institusi_get_all($count,$offset,$perpage,$filter){
		$where = "";
		if(strlen($filter)>0){
			$where  = "where institusi like '".$filter."%'";
		}
		if($count){
			$query = "Select * from institusi $where ";
		}else{
			$query = "Select * from institusi $where order by institusi asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
		}
		return $this->db->query($query);
	} 
	function institusi_select_all(){
		$sql = "select * from institusi order by institusi asc";
		return $this->db->query($sql);
	}
	function institusi_get_byid($kode){					
		$query = "Select * from institusi where kodeinstitusi=".$kode;
		return $this->db->query($query);
	} 
	function institusi_delete($kode){		
		$query = "delete from institusi where kodeinstitusi=".$kode;
		return $this->db->query($query);
	} 
	function institusi_save($data,$kode){  
		if($kode!=""){
			$this->db->where('kodeinstitusi', $kode);
			return $this->db->update('institusi', $data);
		}else{
			$this->db->select('*');
			$this->db->from('institusi');
			$this->db->where('institusi',$data['institusi']);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('institusi', $data);
			}
		} 
	} 
}