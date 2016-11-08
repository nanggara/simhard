<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class mdl_search extends CI_Model {
 
	function __construct(){
		parent::__construct();
	}  
	
	function form_get_all($count,$offset,$perpage,$filter){
		$where = ""; 
		//Jika Advanced 
		if(strlen($filter['hdn_search'])>0){
			if($filter['ddl_filter1']=='r.jeniskelamin'){
				$jeniskelamin = '0';
				if(strtolower($filter['txt_search_adv1'])=='laki-laki'){
					$jeniskelamin = '1';
				}
				$filter['txt_search_adv1'] = $jeniskelamin;
			}
			
			if($filter['ddl_filter2']=='r.jeniskelamin'){
				$jeniskelamin = '0';
				if(strtolower($filter['txt_search_adv2'])=='laki-laki'){
					$jeniskelamin = '1';
				}
				$filter['txt_search_adv2'] = $jeniskelamin;
			}
			
			if($filter['ddl_filter3']=='r.jeniskelamin'){
				$jeniskelamin = '0';
				if(strtolower($filter['txt_search_adv3'])=='laki-laki'){
					$jeniskelamin = '1';
				}
				$filter['txt_search_adv3'] = $jeniskelamin;
			}
			
			if(strlen($filter['txt_search_adv1'])>0){
				$where  = "where ".$filter['ddl_filter1']." ".$filter['ddl_like1'];
				if($filter['ddl_like1']=="like"){
					$where .= " '%".$filter['txt_search_adv1']."%'";
				}else{
					$where .= " '".$filter['txt_search_adv1']."'";
				}
			}
		
			if(strlen($filter['txt_search_adv2'])>0){
				$where  .= " ".$filter['ddl_op1']." ".$filter['ddl_filter2']." ".$filter['ddl_like2'];
				if($filter['ddl_like2']=="like"){
					$where .= " '%".$filter['txt_search_adv2']."%'";
				}else{
					$where .= " '".$filter['txt_search_adv2']."'";
				}
			}
			
			if(strlen($filter['txt_search_adv3'])>0){
				$where  .= " ".$filter['ddl_op2']." ".$filter['ddl_filter3']." ".$filter['ddl_like3'];
				if($filter['ddl_like3']=="like"){
					$where .= " '%".$filter['txt_search_adv3']."%'";
				}else{
					$where .= " '".$filter['txt_search_adv3']."'";
				}
			}
		}
		
		//Jika Bukan Advanced
		else if(strlen($filter['txt_search'])>0){
			$where  = "where r.namalengkap like '%".$filter['txt_search']."%' or r.alamat like '%".$filter['txt_search']."%' or r.fakultas like '%".$filter['txt_search']."%' 
			           or r.programstudi like '%".$filter['txt_search']."%' or u.universitas like '%".$filter['txt_search']."%' " ;
		}
      	
		if($count){
			$query = "SELECT r.regidrec,r.noanggota,r.namalengkap,r.alamat,r.jeniskelamin,r.catatan,k.kelompok,r.cvpath,
			(SELECT top 1 telepon FROM telepon WHERE regid=r.regidrec ORDER BY urut ASC ) AS telepon,
			(SELECT top 1 email FROM daftaremail WHERE regid=r.regidrec ORDER BY urut ASC ) AS email,r.tipekeanggotaan,
			case r.jeniskelamin when 0 then 'Perempuan' else 'Laki-Laki' end as jeniskelamin,u.universitas,r.fakultas,
			r.programstudi,r.tglmasukanggota
			FROM recipient r
			LEFT JOIN kelompok k ON k.kodekelompok=r.kodekelompok  
			LEFT JOIN universitas u ON u.kodeuniversitas=r.kodeuniversitas
			LEFT JOIN agama a ON a.kodeagama=r.kodeagama
			LEFT JOIN kewirausahaan w ON w.regidreg=r.regidrec
			$where ";
		}else{
			$query = "SELECT r.regidrec,r.noanggota,r.namalengkap,r.alamat,r.jeniskelamin,r.catatan,k.kelompok,r.cvpath,
			(SELECT top 1 telepon FROM telepon WHERE regid=r.regidrec ORDER BY urut ASC ) AS telepon,
			(SELECT top 1 email FROM daftaremail WHERE regid=r.regidrec ORDER BY urut ASC ) AS email,r.tipekeanggotaan,
			case r.jeniskelamin when 0 then 'Perempuan' else 'Laki-Laki' end as jeniskelamin,u.universitas,r.fakultas,
			r.programstudi,r.tglmasukanggota
			FROM recipient r
			LEFT JOIN kelompok k ON k.kodekelompok=r.kodekelompok 
			LEFT JOIN universitas u ON u.kodeuniversitas=r.kodeuniversitas
			LEFT JOIN agama a ON a.kodeagama=r.kodeagama
			LEFT JOIN kewirausahaan w ON w.regidreg=r.regidrec
			$where order by r.namalengkap asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
		}
		
		 
		return $this->db->query($query);
	} 
	function member_select_by_id($kode){
		// query cv
		$query = "Select r.*,a.agama,u.photo,k.kelompok,u.universitas,
				  j.jenjang,p.pekerjaan,i.instansi 
				  from recipient r
				  left join kelompok k on k.kodekelompok=r.kodekelompok
				  left join agama a on a.kodeagama=r.kodeagama
				  left join instansi i on i.kodeinstansi=r.kodeinstansi
				  inner join jenjang j on j.kodejenjang=r.kodejenjang
				  inner join universitas u on u.kodeuniversitas=r.kodeuniversitas
				  inner join pekerjaan p on p.kodepekerjaan=r.kodepekerjaan
				  where r.noanggota='".$kode."'";
		return $this->db->query($query);
	}
	function member_select_by_regidrec($kode){
		$query = "Select r.*,a.agama, '' as photo
				  from recipient r
				  left join agama a on a.kodeagama=r.kodeagama
				  where r.regidrec='".$kode."'";
		return $this->db->query($query);
	}
	function form_save($data,$kode){
		if($kode!=""){
			$this->db->where('registrationid', $kode);
			return $this->db->update('registrasi', $data);
		}else{
			return $this->db->insert('registrasi', $data);			 
		}
	}
	function update_profil_photo($kode,$filename){
		$this->db->where('registrationid', $kode);
		$data['photoprofil'] = $filename;
		return $this->db->update('registrasi', $data);
	}
	function update_cv($kode,$filename){
		$this->db->where('registrationid', $kode);
		$data['cvpath'] = $filename;
		return $this->db->update('registrasi', $data);
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
		$query = "delete from registrasi where registrationid=".$kode;
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
	function attachment_byanggota($regid){
		$sql = "select * from daftarattachment where regid=".$regid;
		return $this->db->query($sql); 
	}
}