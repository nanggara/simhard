<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class mdl_auth extends CI_Model {
 
	function __construct(){
		parent::__construct();
	}  
	 
	function login_user($username, $password)
	{
		$strQuery = "SELECT z.*,g.namagrup ";
	    $strQuery .= "FROM zuser z ";
	    $strQuery .= "INNER JOIN ztrustee t ON t.userid=z.userid ";
	    $strQuery .= "INNER JOIN zgrup g ON g.grupid=t.grupid ";
	    $strQuery .= "WHERE z.username='".$username. "' AND z.PASSWORD='".md5($password)."'; "; 
		return $this->db->query($strQuery);
	}
	function trustee($userid, $module){
		$strQuery = "SELECT o.* ";
		$strQuery .= "FROM zmember m ";
		$strQuery .= "INNER JOIN ztrustee t ON t.grupid=m.grupid ";
		$strQuery .= "INNER JOIN zmodule o ON o.kodemodule=m.kodemodule ";
	    $strQuery .= "INNER JOIN zuser u ON u.userid=t.userid ";
	    $strQuery .= "WHERE u.userid='".$userid."' AND o.menukey='".$module."'; ";
		$result = $this->db->query($strQuery);  
		$module = '';
		foreach($result->result() as $item){
	 		$module = $item->module;
	 	}
		return $module;
	}

}