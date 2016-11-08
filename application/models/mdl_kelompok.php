<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class mdl_kelompok extends CI_Model 
{ 
	function __construct(){
		parent::__construct();
	}  
	function kelompok_get_all($count,$offset,$perpage,$filter,$page){
		$where = "";
		if(strlen($filter)>0){
			$where  = "and kelompok like '".$filter."%'";
		}
		if($count){
			$query = "Select * from kelompok where page='".$page."' $where ";
		}else{
			$query = "Select * from kelompok  where page='".$page."' $where order by kelompok asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
		}
		return $this->db->query($query);
	} 
	function kelompok_select_all($page){
		$sql = "select * from kelompok where page='".$page."' order by kelompok asc";
		return $this->db->query($sql);
	}
	function kelompok_get_byid($kode,$page){
		if(strlen($page)==0){
			$query = "Select * from kelompok where kodekelompok=".$kode;
		}else{				
			$query = "Select * from kelompok where kodekelompok=".$kode." and page='".$page."'";
		}
		return $this->db->query($query);
	} 
	function kelompok_delete($kode,$page){		
		$query = "delete from kelompok where kodekelompok=".$kode." and page='".$page."'";
		return $this->db->query($query);
	} 
	function kelompok_save($data,$kode,$page){  
		if($kode!=""){
			$this->db->where('kodekelompok', $kode);
			return $this->db->update('kelompok', $data);
		}else{
			$this->db->select('*');
			$this->db->from('kelompok');
			$this->db->where('kelompok',$data['kelompok']);
			$this->db->where('page',$page);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('kelompok', $data);
			}
		} 
	} 
	
}