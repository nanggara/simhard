<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class mdl_referensi extends CI_Model 
{ 
	function __construct(){
		parent::__construct();
	}  
	function form_delete_telepon($regid,$telepon,$page){
		$query = "delete from telepon where regid=$regid and telepon not in ($telepon) and page='".$page."'";
		$this->db->query($query);
	}
	function form_telepon($regid,$telepon,$page){
		$query = "select * from telepon where regid=$regid and telepon='$telepon' and page='".$page."'";
		if($this->db->query($query)->num_rows()==0){
			$data['regid'] = $regid;
			$data['telepon'] = $telepon;
			$data['page']=$page;
			return $this->db->insert('telepon', $data);
		}else{
			return 0;
		}
	}
	function form_telepon_selectbyid($regid,$page){
		$query = "select * from telepon where regid=$regid and page='".$page."' order by urut asc";
		return $this->db->query($query);
	}
	
	function form_delete_email($regid,$email,$page){
		$query = "delete from daftaremail where regid=$regid and email not in ($email) and page='".$page."'";
		$this->db->query($query);
	}
	function form_email($regid,$email,$page){
		$query = "select * from daftaremail where regid=$regid and email='$email' and page='".$page."'";
		if($this->db->query($query)->num_rows()==0){
			$data['regid'] = $regid;
			$data['email'] = $email;
			$data['page']=$page;
			return $this->db->insert('daftaremail', $data);
		}else{
			return 0;
		}
	}
	function form_email_selectbyid($regid,$page){
		$query = "select * from daftaremail where regid=$regid and page='".$page."' order by urut asc";
		return $this->db->query($query);
	}
	
	/*AGAMA*/
	function agama_get_all($count,$offset,$perpage,$filter){
		$where = "";
		if(strlen($filter)>0){
			$where  = "where agama like '".$filter."%'";
		}
		if($count){
			$query = "Select * from agama  $where ";
		}else{
			$query = "Select * from agama  $where order by agama asc OFFSET $offset ROWS FETCH NEXT $perpage  ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function agama_select_all(){
		$sql = "select * from agama order by agama asc";
		return $this->db->query($sql);
	}
	function agama_get_byid($kode){
		$query = "Select * from agama where kodeagama=".$kode;
		return $this->db->query($query);
	}
	function agama_delete($kode){
		$query = "delete from agama where kodeagama=".$kode;
		return $this->db->query($query);
	}
	function agama_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodeagama', $kode);
			return $this->db->update('agama', $data);
		}else{
			$this->db->select('*');
			$this->db->from('agama');
			$this->db->where('agama',$data['agama']); 
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('agama', $data);
			}
		}
	}
	/* END AGAMA*/
	
	/*UNIVERSITAS*/
	function universitas_get_all($count,$offset,$perpage,$filter){
		$where = "";
		if(strlen($filter)>0){
			$where  = "where universitas like '".$filter."%'";
		}
		if($count){
			$query = "Select * from universitas  $where ";
		}else{
			$query = "Select * from universitas  $where order by universitas asc OFFSET $offset ROWS FETCH NEXT $perpage  ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function universitas_select_all(){
		$sql = "select * from universitas order by universitas asc";
		return $this->db->query($sql);
	}
	function universitas_get_byid($kode){
		$query = "Select * from universitas where kodeuniversitas='".$kode."'";
		return $this->db->query($query);
	}
	function universitas_delete($kode){
		$query = "delete from universitas where kodeuniversitas=".$kode;
		return $this->db->query($query);
	}
	function universitas_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodeuniversitas', $kode);
			return $this->db->update('universitas', $data);
		}else{
			$this->db->select('*');
			$this->db->from('universitas');
			$this->db->where('universitas',$data['universitas']);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('universitas', $data);
			}
		}
	}
	/* END UNIVERSITAS*/
	
	/*JENJANG*/
	function jenjang_get_all($count,$offset,$perpage,$filter){
		$where = "";
		if(strlen($filter)>0){
			$where  = "where jenjang like '".$filter."%'";
		}
		if($count){
			$query = "Select * from jenjang  $where ";
		}else{
			$query = "Select * from jenjang  $where order by jenjang asc OFFSET $offset ROWS FETCH NEXT $perpage  ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function jenjang_select_all(){
		$sql = "select * from jenjang order by kodejenjang asc";
		return $this->db->query($sql);
	}
	function jenjang_get_byid($kode){
		$query = "Select * from jenjang where kodejenjang=".$kode;
		return $this->db->query($query);
	}
	function jenjang_delete($kode){
		$query = "delete from jenjang where kodejenjang=".$kode;
		return $this->db->query($query);
	}
	function jenjang_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodejenjang', $kode);
			return $this->db->update('jenjang', $data);
		}else{
			$this->db->select('*');
			$this->db->from('jenjang');
			$this->db->where('jenjang',$data['jenjang']);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('jenjang', $data);
			}
		}
	}
	/* END JENJANG*/
	
	/*PEKERJAAN*/
	function pekerjaan_get_all($count,$offset,$perpage,$filter){
		$where = "";
		if(strlen($filter)>0){
			$where  = "where pekerjaan like '".$filter."%'";
		}
		if($count){
			$query = "Select * from pekerjaan  $where ";
		}else{
			$query = "Select * from pekerjaan  $where order by pekerjaan asc OFFSET $offset ROWS FETCH NEXT $perpage  ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function pekerjaan_select_all(){
		$sql = "select * from pekerjaan order by pekerjaan asc";
		return $this->db->query($sql);
	}
	function pekerjaan_get_byid($kode){
		$query = "Select * from pekerjaan where kodepekerjaan=".$kode;
		return $this->db->query($query);
	}
	function pekerjaan_delete($kode){
		$query = "delete from pekerjaan where kodepekerjaan=".$kode;
		return $this->db->query($query);
	}
	function pekerjaan_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodepekerjaan', $kode);
			return $this->db->update('pekerjaan', $data);
		}else{
			$this->db->select('*');
			$this->db->from('pekerjaan');
			$this->db->where('pekerjaan',$data['pekerjaan']);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('pekerjaan', $data);
			}
		}
	}
	/* END PEKERJAAN*/
	
	/*INSTANSI*/
	function instansi_get_all($count,$offset,$perpage,$filter){
		$where = "";
		if(strlen($filter)>0){
			$where  = "where instansi like '".$filter."%'";
		}
		if($count){
			$query = "Select * from instansi  $where ";
		}else{
			$query = "Select * from instansi  $where order by instansi asc OFFSET $offset ROWS FETCH NEXT $perpage  ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function instansi_select_all(){
		$sql = "select * from instansi order by instansi asc";
		return $this->db->query($sql);
	}
	function instansi_get_byid($kode){
		$query = "Select * from instansi where kodeinstansi=".$kode;
		return $this->db->query($query);
	}
	function instansi_delete($kode){
		$query = "delete from instansi where kodeinstansi=".$kode;
		return $this->db->query($query);
	}
	function instansi_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodeinstansi', $kode);
			return $this->db->update('instansi', $data);
		}else{
			$this->db->select('*');
			$this->db->from('instansi');
			$this->db->where('instansi',$data['instansi']);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('instansi', $data);
			}
		}
	}
	/* END INSTANSI*/
	
	/*KELUARGA*/
	function keluarga_get_all($count,$offset,$perpage,$filter,$regidrec){
		$where = "";
		if(strlen($filter)>0){
			$where  = "and nama like '".$filter."%'";
		}
		if($count){
			$query = "Select * from keluarga where regidrec=".$regidrec." $where ";
		}else{
			$query = "Select * from keluarga where regidrec=".$regidrec." $where order by nama asc OFFSET $offset ROWS FETCH NEXT $perpage  ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function keluarga_select_all($regidrec){
		$sql = "select * from keluarga where regidrec=".$regidrec." order by nama asc";
		return $this->db->query($sql);
	}
	function keluarga_get_byid($kode,$regidrec){
		$query = "Select * from keluarga where kodekeluarga=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function keluarga_get_byanggota($regidrec){
		$query = "Select * from keluarga where regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function keluarga_delete($kode,$regidrec){
		$query = "delete from keluarga where kodekeluarga=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function keluarga_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodekeluarga', $kode);
			return $this->db->update('keluarga', $data);
		}else{
			$this->db->select('*');
			$this->db->from('keluarga');
			$this->db->where('nama',$data['nama']);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('keluarga', $data);
			}
		}
	}
	/* END KELUARGA*/	/*GAJIKARYAWAN*/
	function gajikaryawan_get_all($count,$offset,$perpage,$filter,$regidrec){
		$where = "";
		if(strlen($filter)>0){
			$where  = "and kodegajikaryawan like '".$filter."%'";
		}
		if($count){
			$query = "Select * from gajikaryawan where regidrec=".$regidrec." $where ";
		}else{
			$query = "Select * from gajikaryawan where regidrec=".$regidrec." $where order by kodegajikaryawan asc OFFSET $offset ROWS FETCH NEXT $perpage  ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function gajikaryawan_select_all($regidrec){
		$sql = "select * from gajikaryawan where regidrec=".$regidrec." order by kodegajikaryawan asc";
		return $this->db->query($sql);
	}
	function gajikaryawan_get_byid($kode,$regidrec){
		$query = "Select * from gajikaryawan where kodegajikaryawan=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function gajikaryawan_get_byanggota($regidrec){
		$query = "Select * from gajikaryawan where regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function gajikaryawan_delete($kode,$regidrec){
		$query = "delete from gajikaryawan where kodegajikaryawan=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function gajikaryawan_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodegajikaryawan', $kode);
			return $this->db->update('gajikaryawan', $data);
		}else{
			$this->db->select('*');
			$this->db->from('gajikaryawan');
			$this->db->where('kodekomponengaji',$data['kodekomponengaji']);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('gajikaryawan', $data);
			}
		}
	}
	/* END GAJIKARYAWAN*/
	
	/*PENDIDIKAN*/
	function pendidikan_get_all($count,$offset,$perpage,$filter,$regidrec){
		$where = "";
		if(strlen($filter)>0){
			$where  = "and namasekolah like '".$filter."%'";
		}
		if($count){
			$query = "Select * from pendidikan where regidrec=".$regidrec." $where ";
		}else{
			$query = "Select * from pendidikan where regidrec=".$regidrec." $where order by namasekolah asc OFFSET $offset ROWS FETCH NEXT $perpage  ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function pendidikan_select_all($regidrec){
		$sql = "select * from pendidikan where regidrec=".$regidrec." order by namasekolah asc";
		return $this->db->query($sql);
	}
	function pendidikan_get_byid($kode,$regidrec){
		$query = "Select * from pendidikan where kodependidikan=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function pendidikan_get_byanggota($regidrec){
		$query = "Select * from pendidikan where regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function pendidikan_delete($kode,$regidrec){
		$query = "delete from pendidikan where kodependidikan=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function pendidikan_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodependidikan', $kode);
			return $this->db->update('pendidikan', $data);
		}else{
			$this->db->select('*');
			$this->db->from('pendidikan');
			$this->db->where('namasekolah',$data['namasekolah']);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('pendidikan', $data);
			}
		}
	}
	/* END PENDIDIKAN*/
	
	/*PENDIDIKAN NON FORMAL*/
	function pendidikannonformal_get_all($count,$offset,$perpage,$filter,$regidrec){
		$where = "";
		if(strlen($filter)>0){
			$where  = "and namalembaga like '".$filter."%'";
		}
		if($count){
			$query = "Select * from pendidikannonformal where regidrec=".$regidrec." $where ";
		}else{
			$query = "Select * from pendidikannonformal where regidrec=".$regidrec." $where order by namalembaga asc OFFSET $offset ROWS FETCH NEXT $perpage  ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function pendidikannonformal_select_all($regidrec){
		$sql = "select * from pendidikannonformal where regidrec=".$regidrec." order by namalembaga asc";
		return $this->db->query($sql);
	}
	function pendidikannonformal_get_byid($kode,$regidrec){
		$query = "Select * from pendidikannonformal where kodependidikannf=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function pendidikannonformal_get_byanggota($regidrec){
		$query = "Select * from pendidikannonformal where regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function pendidikannonformal_delete($kode,$regidrec){
		$query = "delete from pendidikannonformal where kodependidikannf=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function pendidikannonformal_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodependidikannf', $kode);
			return $this->db->update('pendidikannonformal', $data);
		}else{
			$this->db->select('*');
			$this->db->from('pendidikannonformal');
			$this->db->where('namalembaga',$data['namalembaga']);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('pendidikannonformal', $data);
			}
		}
	}
	/* END PENDIDIKAN NON FORMAL*/
	
	/*ORGANISASI*/
	function organisasi_get_all($count,$offset,$perpage,$filter,$regidrec){
		$where = "";
		if(strlen($filter)>0){
			$where  = "and namaorganisasi like '".$filter."%'";
		}
		if($count){
			$query = "Select * from organisasi where regidrec=".$regidrec." $where ";
		}else{
			$query = "Select * from organisasi where regidrec=".$regidrec." $where order by namaorganisasi asc OFFSET $offset ROWS FETCH NEXT $perpage  ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function organisasi_select_all($regidrec){
		$sql = "select * from organisasi where regidrec=".$regidrec." order by namaorganisasi asc";
		return $this->db->query($sql);
	}
	function organisasi_get_byid($kode,$regidrec){
		$query = "Select * from organisasi where kodeorganisasi=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function organisasi_get_byanggota($regidrec){
		$query = "Select * from organisasi where regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function organisasi_delete($kode,$regidrec){
		$query = "delete from organisasi where kodeorganisasi=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function organisasi_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodeorganisasi', $kode);
			return $this->db->update('organisasi', $data);
		}else{
			$this->db->select('*');
			$this->db->from('organisasi');
			$this->db->where('namaorganisasi',$data['namaorganisasi']);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('organisasi', $data);
			}
		}
	}
	/* END ORGANISASI*/
	
	/*KERJA*/
	function kerja_get_all($count,$offset,$perpage,$filter,$regidrec){
		$where = "";
		if(strlen($filter)>0){
			$where  = "and namalembaga like '".$filter."%'";
		}
		if($count){
			$query = "Select * from kerja where regidrec=".$regidrec." $where ";
		}else{
			$query = "Select * from kerja where regidrec=".$regidrec." $where order by namalembaga asc OFFSET $offset ROWS FETCH NEXT $perpage  ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function kerja_select_all($regidrec){
		$sql = "select * from kerja where regidrec=".$regidrec." order by namalembaga asc";
		return $this->db->query($sql);
	}
	function kerja_get_byid($kode,$regidrec){
		$query = "Select * from kerja where kodekerja=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function kerja_get_byanggota($regidrec){
		$query = "Select * from kerja where regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function kerja_delete($kode,$regidrec){
		$query = "delete from kerja where kodekerja=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function kerja_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodekerja', $kode);
			return $this->db->update('kerja', $data);
		}else{
			$this->db->select('*');
			$this->db->from('kerja');
			$this->db->where('namalembaga',$data['namalembaga']);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('kerja', $data);
			}
		}
	}
	/* END KERJA*/
	
	/*VOLUNTEER*/
	function volunteer_get_all($count,$offset,$perpage,$filter,$regidrec){
		$where = "";
		if(strlen($filter)>0){
			$where  = "and namakegiatan like '".$filter."%'";
		}
		if($count){
			$query = "Select * from volunteer where regidrec=".$regidrec." $where ";
		}else{
			$query = "Select * from volunteer where regidrec=".$regidrec." $where order by namakegiatan asc OFFSET $offset ROWS FETCH NEXT $perpage  ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function volunteer_select_all($regidrec){
		$sql = "select * from volunteer where regidrec=".$regidrec." order by namakegiatan asc";
		return $this->db->query($sql);
	}
	function volunteer_get_byid($kode,$regidrec){
		$query = "Select * from volunteer where kodevolunteer=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function volunteer_get_byanggota($regidrec){
		$query = "Select * from volunteer where regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function volunteer_delete($kode,$regidrec){
		$query = "delete from volunteer where kodevolunteer=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function volunteer_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodevolunteer', $kode);
			return $this->db->update('volunteer', $data);
		}else{
			$this->db->select('*');
			$this->db->from('volunteer');
			$this->db->where('namakegiatan',$data['namakegiatan']);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('volunteer', $data);
			}
		}
	}
	/* END PRESTASI*/
	
	/*VOLUNTEER*/
	function prestasi_get_all($count,$offset,$perpage,$filter,$regidrec){
		$where = "";
		if(strlen($filter)>0){
			$where  = "and bidang like '".$filter."%'";
		}
		if($count){
			$query = "Select * from prestasi where regidrec=".$regidrec." $where ";
		}else{
			$query = "Select * from prestasi where regidrec=".$regidrec." $where order by bidang asc OFFSET $offset ROWS FETCH NEXT $perpage  ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function prestasi_select_all($regidrec){
		$sql = "select * from prestasi where regidrec=".$regidrec." order by bidang asc";
		return $this->db->query($sql);
	}
	function prestasi_get_byid($kode,$regidrec){
		$query = "Select * from prestasi where kodeprestasi=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function prestasi_get_byanggota($regidrec){
		$query = "Select * from prestasi where regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function prestasi_delete($kode,$regidrec){
		$query = "delete from prestasi where kodeprestasi=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function prestasi_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodeprestasi', $kode);
			return $this->db->update('prestasi', $data);
		}else{
			$this->db->select('*');
			$this->db->from('prestasi');
			$this->db->where('bidang',$data['bidang']);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('prestasi', $data);
			}
		}
	}
	/* END PRESTASI*/
	
	/*ATTACHMENT*/
	function attachment_get_byid($regid){
		$query = "Select * from daftarattachment where regid=".$regid;
		return $this->db->query($query);
	}
	function attachment_delete($urut){
		$query = "delete from daftarattachment where urut=".$urut;
		return $this->db->query($query);
	}
}