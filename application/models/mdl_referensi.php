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
	
	/*GAJIKARYAWAN*/	function gajikaryawan_get_all($count,$offset,$perpage,$filter,$regidrec){		$where = "";		if(strlen($filter)>0){			$where  = "and k.namakomponengaji like '".$filter."%'";		}		if($count){			$query = "Select * from gajikaryawan AS g inner join komponengaji AS k on g.kodekomponengaji=k.kodekomponengaji where g.regidrec=".$regidrec." $where ";		}else{			$query = "Select * from gajikaryawan AS g inner join komponengaji AS k on g.kodekomponengaji=k.kodekomponengaji where g.regidrec=".$regidrec." $where order by g.kodegajikaryawan asc OFFSET $offset ROWS FETCH NEXT $perpage  ROWS ONLY";		}		return $this->db->query($query);	}	function gajikaryawan_select_all($regidrec){		$sql = "select * from gajikaryawan where regidrec=".$regidrec." order by kodegajikaryawan asc";		return $this->db->query($sql);	}	function komponengaji_select_all(){		$sql = "select * from komponengaji AS komp left join kelompokkompgaji AS kel 						on komp.kodekelompokkompgaji=kel.kodekelompokkompgaji order by komp.kodekomponengaji asc";		return $this->db->query($sql);	}	function gajikaryawan_get_byid($kode,$regidrec){		$query = "Select * from gajikaryawan where kodegajikaryawan=".$kode." and regidrec=".$regidrec;		return $this->db->query($query);	}	function gajikaryawan_get_bypotongan($regidrec){		$query = "Select * from gajikaryawan AS g inner join komponengaji AS k on g.kodekomponengaji=k.kodekomponengaji where g.regidrec=".$regidrec." and k.potongan=1 and k.aktif=1";		return $this->db->query($query);	}	function gajikaryawan_get_bytunjangan($regidrec){		$query = "Select * from gajikaryawan AS g inner join komponengaji AS k on g.kodekomponengaji=k.kodekomponengaji where g.regidrec=".$regidrec." and k.potongan=2 and k.aktif=1";		return $this->db->query($query);	}	function gajikaryawan_delete($kode,$regidrec){		$query = "delete from gajikaryawan where kodegajikaryawan=".$kode." and regidrec=".$regidrec;		return $this->db->query($query);	}	function gajikaryawan_save($data,$kode){		if($kode!=""){			$this->db->where('kodegajikaryawan', $kode);			return $this->db->update('gajikaryawan', $data);		}else{			$this->db->select('*');			$this->db->from('gajikaryawan');			$this->db->where('kodekomponengaji='.$data['kodekomponengaji']);			$this->db->where('regidrec='.$data['regidrec']);				if($this->db->count_all_results()>0){								return null;			}else{				return $this->db->insert('gajikaryawan', $data);			}		}	}		function gajibulanan_save($data,$kode,$tahun,$bulan){			$this->db->select('*');			$this->db->from('gajibulanan');			$this->db->where('tahun='.$tahun['tahun']);			$this->db->where('bulan='.$bulan['bulan']);				if($this->db->count_all_results()>0){								return null;			}else{								$query = "insert into gajibulanan '',regidrec,'".$tahun."','".$bulan."','',gajipokokbaru,'','',''";				return $this->db->insert($query);			}	}	/* END GAJIKARYAWAN*/
	/*KOMPONEN GAJI*/		function komponengaji_get_all($count,$offset,$perpage,$filter){		$where = "";		if(strlen($filter)>0){			$where  = "where namakomponengaji like '".$filter."%'";		}		if($count){			$query = "Select * from komponengaji  $where ";		}else{			$query = "Select * from komponengaji  $where order by namakomponengaji asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";		}		return $this->db->query($query);	}	function komponengaji_get_byid($kode){		$query = "Select * from komponengaji where kodekomponengaji=".$kode;		return $this->db->query($query);	}	function komponengaji_delete($kode){		$query = "delete from komponengaji where kodekomponengaji=".$kode;		return $this->db->query($query);	}	function manajemengaji_update_statuskomp($kode){		$query = "update komponengaji set aktif=2 where kodekomponengaji=".$kode;		return $this->db->query($query);	}	function manajemengaji_updatet_statuskomp($kode){		$query = "update komponengaji set aktif=1 where kodekomponengaji=".$kode;		return $this->db->query($query);	}	function komponengaji_save($data,$kode){		if($kode!=""){			$this->db->where('kodekomponengaji', $kode);			return $this->db->update('komponengaji', $data);		}else{			$this->db->select('*');			$this->db->from('komponengaji');			$this->db->where('namakomponengaji',$data['namakomponengaji']); 			if($this->db->count_all_results()>0){				return null;			}else{				return $this->db->insert('komponengaji', $data);			}		}	}	function komponenpotongan_select_all(){		$sql = "select * from komponengaji where aktif = 1 and potongan = 1 order by namakomponengaji asc";		return $this->db->query($sql);	}		function komponentunjangan_select_all(){		$sql = "select * from komponengaji where aktif = 1 and potongan = 2 order by namakomponengaji asc";		return $this->db->query($sql);	}	function kelompokkomponen_select_all(){		$sql = "select * from kelompokkompgaji order by namakelompok asc";		return $this->db->query($sql);	}	/* END KOMPONEN GAJI*/
	/*AGAMA*/
	function agama_get_all($count,$offset,$perpage,$filter){
		$where = "";
		if(strlen($filter)>0){
			$where  = "where agama like '".$filter."%'";
		}
		if($count){
			$query = "Select * from agama  $where ";
		}else{
			$query = "Select * from agama  $where order by agama asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
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

	/*KAWIN*/
	function kawin_get_all($count,$offset,$perpage,$filter){
		$where = "";
		if(strlen($filter)>0){
			$where  = "where kawin like '".$filter."%'";
		}
		if($count){
			$query = "Select * from kawin  $where ";
		}else{
			$query = "Select * from kawin  $where order by kawin asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function kawin_select_all(){
		$sql = "select * from kawin order by kawin asc";
		return $this->db->query($sql);
	}
	function kawin_get_byid($kode){
		$query = "Select * from kawin where kodekawin=".$kode;
		return $this->db->query($query);
	}
	function kawin_delete($kode){
		$query = "delete from kawin where kodekawin=".$kode;
		return $this->db->query($query);
	}
	function kawin_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodekawin', $kode);
			return $this->db->update('kawin', $data);
		}else{
			$this->db->select('*');
			$this->db->from('kawin');
			$this->db->where('kawin',$data['kawin']); 
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('kawin', $data);
			}
		}
	}
	/* END KAWIN*/				/*RECIPIENT*/
	function recipient_get_all($count,$offset,$perpage,$filter){
		$where = "";
		if(strlen($filter)>0){
			$where  = "where recipient like '".$filter."%'";
		}
		if($count){
			$query = "Select * from recipient  $where ";
		}else{
			$query = "Select * from recipient  $where order by namalengkap asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function recipient_select_all(){
		$sql = "select * from recipient order by namalengkap asc";
		return $this->db->query($sql);
	}
	function recipient_get_byid($kode){
		$query = "Select * from recipient where regidrec=".$kode;
		return $this->db->query($query);
	}
	function recipient_delete($kode){
		$query = "delete from recipient where regidrec=".$kode;
		return $this->db->query($query);
	}
	function recipient_save($data,$kode){
		if($kode!=""){
			$this->db->where('regidrec', $kode);
			return $this->db->update('recipient', $data);
		}else{
			$this->db->select('*');
			$this->db->from('recipient');
			$this->db->where('recipient',$data['recipient']); 
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('recipient', $data);
			}
		}
	}
	/* END RECIPIENT*/

	/*KEDUDUKAN*/
	function kedudukan_get_all($count,$offset,$perpage,$filter){
		$where = "";
		if(strlen($filter)>0){
			$where  = "where kedudukan like '".$filter."%'";
		}
		if($count){
			$query = "Select * from kedudukan  $where ";
		}else{
			$query = "Select * from kedudukan  $where order by kedudukan asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function Kedudukan_select_all(){
		$sql = "select * from kedudukan order by kedudukan asc";
		return $this->db->query($sql);
	}
	function Kedudukan_get_byid($kode){
		$query = "Select * from kedudukan where kodekedudukan=".$kode;
		return $this->db->query($query);
	}
	function Kedudukan_delete($kode){
		$query = "delete from kedudukan where kodekedudukan=".$kode;
		return $this->db->query($query);
	}
	function Kedudukan_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodekedudukan', $kode);
			return $this->db->update('kedudukan', $data);
		}else{
			$this->db->select('*');
			$this->db->from('kedudukan');
			$this->db->where('kedudukan',$data['kedudukan']); 
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('kedudukan', $data);
			}
		}
	}
	/* END KEDUDUKAN*/
	
	/*UNIVERSITAS*/
	function universitas_get_all($count,$offset,$perpage,$filter){
		$where = "";
		if(strlen($filter)>0){
			$where  = "where universitas like '".$filter."%'";
		}
		if($count){
			$query = "Select * from universitas  $where ";
		}else{
			$query = "Select * from universitas  $where order by universitas asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
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
			$query = "Select * from jenjang  $where order by jenjang asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
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

	/*JABATAN*/
	function jabatan_get_all($count,$offset,$perpage,$filter){
		$where = "";
		if(strlen($filter)>0){
			$where  = "where jabatan like '".$filter."%'";
		}
		if($count){
			$query = "Select * from jabatan  $where ";
		}else{
			$query = "Select * from jabatan  $where order by jabatan asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function jabatan_select_all(){
		$sql = "select * from jabatan order by kodejabatan asc";
		return $this->db->query($sql);
	}
	function jabatan_get_byid($kode){
		$query = "Select * from jabatan where kodejabatan=".$kode;
		return $this->db->query($query);
	}
	function jabatan_delete($kode){
		$query = "delete from jabatan where kodejabatan=".$kode;
		return $this->db->query($query);
	}
	function jabatan_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodejabatan', $kode);
			return $this->db->update('jabatan', $data);
		}else{
			$this->db->select('*');
			$this->db->from('jabatan');
			$this->db->where('jabatan',$data['jabatan']);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('jabatan', $data);
			}
		}
	}
	/* END JABATAN*/

	/*GOLDAR*/
	function goldar_get_all($count,$offset,$perpage,$filter){
		$where = "";
		if(strlen($filter)>0){
			$where  = "where goldar like '".$filter."%'";
		}
		if($count){
			$query = "Select * from goldar  $where ";
		}else{
			$query = "Select * from goldar  $where order by goldar asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function goldar_select_all(){
		$sql = "select * from goldar order by kodegoldar asc";
		return $this->db->query($sql);
	}
	function goldar_get_byid($kode){
		$query = "Select * from goldar where kodegoldar=".$kode;
		return $this->db->query($query);
	}
	function goldar_delete($kode){
		$query = "delete from goldar where kodegoldar=".$kode;
		return $this->db->query($query);
	}
	function goldar_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodegoldar', $kode);
			return $this->db->update('goldar', $data);
		}else{
			$this->db->select('*');
			$this->db->from('goldar');
			$this->db->where('goldar',$data['goldar']);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('goldar', $data);
			}
		}
	}
	/* END GOLDAR*/
	
	/*PEKERJAAN*/
	function pekerjaan_get_all($count,$offset,$perpage,$filter){
		$where = "";
		if(strlen($filter)>0){
			$where  = "where pekerjaan like '".$filter."%'";
		}
		if($count){
			$query = "Select * from pekerjaan  $where ";
		}else{
			$query = "Select * from pekerjaan  $where order by pekerjaan asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
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
	
	/*KEWIRAUSAHAAN*/
	function kewirausahaan_get_all($count,$offset,$perpage,$filter,$regidrec){
		$where = "";
		if(strlen($filter)>0){
			$where  = "and namausaha like '".$filter."%'";
		}
		if($count){
			$query = "Select * from kewirausahaan where regidreg =".$regidrec." $where ";
		}else{
			$query = "Select * from kewirausahaan where regidreg =".$regidrec." $where order by namausaha asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function kewirausahaan_select_all($regidrec){
		$sql = "select * from kewirausahaan where regidreg =".$regidrec." order by namausaha asc";
		return $this->db->query($sql);
	}
	function kewirausahaan_get_byid($kode,$regidrec){
		$query = "Select * from kewirausahaan where kodekwu =".$kode." and regidreg =".$regidrec;
		return $this->db->query($query);
	}
	function kewirausahaan_get_byanggota($regidrec){
		$query = "Select * from kewirausahaan where regidreg=".$regidrec;
		return $this->db->query($query);
	}
	function kewirausahaan_delete($kode,$regidrec){
		$query = "delete from kewirausahaan where kodekwu=".$kode." and regidreg=".$regidrec;
		return $this->db->query($query);
	}
	function kewirausahaan_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodekwu', $kode);
			return $this->db->update('kewirausahaan', $data);
		}else{
			$this->db->select('*');
			$this->db->from('kewirausahaan');
			$this->db->where('namausaha',$data['namausaha']);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('kewirausahaan', $data);
			}
		}
	}
	/* END KEWIRAUSAHAAN*/
	
	
	
	/*INSTANSI*/
	function instansi_get_all($count,$offset,$perpage,$filter){
		$where = "";
		if(strlen($filter)>0){
			$where  = "where instansi like '".$filter."%'";
		}
		if($count){
			$query = "Select * from instansi  $where ";
		}else{
			$query = "Select * from instansi  $where order by instansi asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
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
			$query = "Select * from keluarga where regidrec=".$regidrec." $where order by nama asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
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
	/* END KELUARGA*/

	/*ORANGTUA*/
	function orangtua_get_all($count,$offset,$perpage,$filter,$regidrec){
		$where = "";
		if(strlen($filter)>0){
			$where  = "and namaorangtua like '".$filter."%'";
		}
		if($count){
			$query = "Select * from orangtua where regidrec=".$regidrec." $where ";
		}else{
			$query = "Select * from orangtua where regidrec=".$regidrec." $where order by namaorangtua asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function orangtua_select_all($regidrec){
		$sql = "select * from orangtua where regidrec=".$regidrec." order by namaorangtua asc";
		return $this->db->query($sql);
	}
	function orangtua_get_byid($kode,$regidrec){
		$query = "Select * from orangtua where kodeorangtua=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function orangtua_get_byanggota($regidrec){
		$query = "Select * from orangtua where regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function orangtua_delete($kode,$regidrec){
		$query = "delete from orangtua where kodeorangtua=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function orangtua_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodeorangtua', $kode);
			return $this->db->update('orangtua', $data);
		}else{
			$this->db->select('*');
			$this->db->from('orangtua');
			$this->db->where('namaorangtua',$data['namaorangtua']);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('orangtua', $data);
			}
		}
	}
	/* END ORANGTUA*/

	/*PASANGAN*/
	function pasangan_get_all($count,$offset,$perpage,$filter,$regidrec){
		$where = "";
		if(strlen($filter)>0){
			$where  = "and namapasangan like '".$filter."%'";
		}
		if($count){
			$query = "Select * from pasangan where regidrec=".$regidrec." $where ";
		}else{
			$query = "Select * from pasangan where regidrec=".$regidrec." $where order by namapasangan asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function pasangan_select_all($regidrec){
		$sql = "select * from pasangan where regidrec=".$regidrec." order by namapasangan asc";
		return $this->db->query($sql);
	}
	function pasangan_get_byid($kode,$regidrec){
		$query = "Select * from pasangan where kodepasangan=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function pasangan_get_byanggota($regidrec){
		$query = "Select * from pasangan where regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function pasangan_delete($kode,$regidrec){
		$query = "delete from pasangan where kodepasangan=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function pasangan_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodepasangan', $kode);
			return $this->db->update('pasangan', $data);
		}else{
			$this->db->select('*');
			$this->db->from('pasangan');
			$this->db->where('namapasangan',$data['namapasangan']);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('pasangan', $data);
			}
		}
	}
	/* END PASANGAN*/

	/*ANAK*/
	function anak_get_all($count,$offset,$perpage,$filter,$regidrec){
		$where = "";
		if(strlen($filter)>0){
			$where  = "and namaanak like '".$filter."%'";
		}
		if($count){
			$query = "Select * from anak where regidrec=".$regidrec." $where ";
		}else{
			$query = "Select * from anak where regidrec=".$regidrec." $where order by namaanak asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function anak_select_all($regidrec){
		$sql = "select * from anak where regidrec=".$regidrec." order by namaanak asc";
		return $this->db->query($sql);
	}
	function anak_get_byid($kode,$regidrec){
		$query = "Select * from anak where kodeanak=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function anak_get_byanggota($regidrec){
		$query = "Select * from anak where regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function anak_delete($kode,$regidrec){
		$query = "delete from anak where kodeanak=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function anak_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodeanak', $kode);
			return $this->db->update('anak', $data);
		}else{
			$this->db->select('*');
			$this->db->from('anak');
			$this->db->where('namaanak',$data['namaanak']);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('anak', $data);
			}
		}
	}
	/* END ANAK*/
	
	/*PENDIDIKAN*/
	function pendidikan_get_all($count,$offset,$perpage,$filter,$regidrec){
		$where = "";
		if(strlen($filter)>0){
			$where  = "and namasekolah like '".$filter."%'";
		}
		if($count){
			$query = "Select * from pendidikan where regidrec=".$regidrec." $where ";
		}else{
			$query = "Select * from pendidikan where regidrec=".$regidrec." $where order by namasekolah asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
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
			$query = "Select * from pendidikannonformal where regidrec=".$regidrec." $where order by namalembaga asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
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
			$query = "Select * from organisasi where regidrec=".$regidrec." $where order by namaorganisasi asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
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

	/*GOLONGAN*/
	function golongan_get_all($count,$offset,$perpage,$filter,$regidrec){
		$where = "";
		if(strlen($filter)>0){
			$where  = "and namagolongan like '".$filter."%'";
		}
		if($count){
			$query = "Select * from golongan where regidrec=".$regidrec." $where ";
		}else{
			$query = "Select * from golongan where regidrec=".$regidrec." $where order by namagolongan asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function golongan_select_all($regidrec){
		$sql = "select * from golongan where regidrec=".$regidrec." order by namagolongan asc";
		return $this->db->query($sql);
	}
	function golongan_get_byid($kode,$regidrec){
		$query = "Select * from golongan where kodegolongan=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function golongan_get_byanggota($regidrec){
		$query = "Select * from golongan where regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function golongan_delete($kode,$regidrec){
		$query = "delete from golongan where kodegolongan=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function golongan_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodegolongan', $kode);
			return $this->db->update('golongan', $data);
		}else{
			$this->db->select('*');
			$this->db->from('golongan');
			$this->db->where('namagolongan',$data['namagolongan']);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('golongan', $data);
			}
		}
	}
	/* END GOLONGAN*/

	/*RIWAYAT JABATAN*/
	function rwytjabatan_get_all($count,$offset,$perpage,$filter,$regidrec){
		$where = "";
		if(strlen($filter)>0){
			$where  = "and namarwytjabatan like '".$filter."%'";
		}
		if($count){
			$query = "Select * from rwytjabatan where regidrec=".$regidrec." $where ";
		}else{
			$query = "Select * from rwytjabatan where regidrec=".$regidrec." $where order by namarwytjabatan asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function rwytjabatan_select_all($regidrec){
		$sql = "select * from rwytjabatan where regidrec=".$regidrec." order by namarwytjabatan asc";
		return $this->db->query($sql);
	}
	function rwytjabatan_get_byid($kode,$regidrec){
		$query = "Select * from rwytjabatan where koderwytjabatan=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function rwytjabatan_get_byanggota($regidrec){
		$query = "Select * from rwytjabatan where regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function rwytjabatan_delete($kode,$regidrec){
		$query = "delete from rwytjabatan where koderwytjabatan=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function rwytjabatan_save($data,$kode){
		if($kode!=""){
			$this->db->where('koderwytjabatan', $kode);
			return $this->db->update('rwytjabatan', $data);
		}else{
			$this->db->select('*');
			$this->db->from('rwytjabatan');
			$this->db->where('namarwytjabatan',$data['namarwytjabatan']);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('rwytjabatan', $data);
			}
		}
	}
	/* END RIWAYAT JABATAN*/

	/*DIKLAT*/
	function diklat_get_all($count,$offset,$perpage,$filter,$regidrec){
		$where = "";
		if(strlen($filter)>0){
			$where  = "and namadiklat like '".$filter."%'";
		}
		if($count){
			$query = "Select * from diklat where regidrec=".$regidrec." $where ";
		}else{
			$query = "Select * from diklat where regidrec=".$regidrec." $where order by namadiklat asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function diklat_select_all($regidrec){
		$sql = "select * from diklat where regidrec=".$regidrec." order by namadiklat asc";
		return $this->db->query($sql);
	}
	function diklat_get_byid($kode,$regidrec){
		$query = "Select * from diklat where kodediklat=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function diklat_get_byanggota($regidrec){
		$query = "Select * from diklat where regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function diklat_delete($kode,$regidrec){
		$query = "delete from diklat where kodediklat=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function diklat_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodediklat', $kode);
			return $this->db->update('diklat', $data);
		}else{
			$this->db->select('*');
			$this->db->from('diklat');
			$this->db->where('namadiklat',$data['namadiklat']);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('diklat', $data);
			}
		}
	}
	/* END DIKLAT*/

	/*KURSUS*/
	function kursus_get_all($count,$offset,$perpage,$filter,$regidrec){
		$where = "";
		if(strlen($filter)>0){
			$where  = "and namakursus like '".$filter."%'";
		}
		if($count){
			$query = "Select * from kursus where regidrec=".$regidrec." $where ";
		}else{
			$query = "Select * from kursus where regidrec=".$regidrec." $where order by namakursus asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function kursus_select_all($regidrec){
		$sql = "select * from kursus where regidrec=".$regidrec." order by namakursus asc";
		return $this->db->query($sql);
	}
	function kursus_get_byid($kode,$regidrec){
		$query = "Select * from kursus where kodekursus=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function kursus_get_byanggota($regidrec){
		$query = "Select * from kursus where regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function kursus_delete($kode,$regidrec){
		$query = "delete from kursus where kodekursus=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function kursus_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodekursus', $kode);
			return $this->db->update('kursus', $data);
		}else{
			$this->db->select('*');
			$this->db->from('kursus');
			$this->db->where('namakursus',$data['namakursus']);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('kursus', $data);
			}
		}
	}
	/* END KURSUS*/

	/*PENGHARGAAN*/
	function penghargaan_get_all($count,$offset,$perpage,$filter,$regidrec){
		$where = "";
		if(strlen($filter)>0){
			$where  = "and namapenghargaan like '".$filter."%'";
		}
		if($count){
			$query = "Select * from penghargaan where regidrec=".$regidrec." $where ";
		}else{
			$query = "Select * from penghargaan where regidrec=".$regidrec." $where order by namapenghargaan asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
		}
		return $this->db->query($query);
	}
	function penghargaan_select_all($regidrec){
		$sql = "select * from penghargaan where regidrec=".$regidrec." order by namapenghargaan asc";
		return $this->db->query($sql);
	}
	function penghargaan_get_byid($kode,$regidrec){
		$query = "Select * from penghargaan where kodepenghargaan=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function penghargaan_get_byanggota($regidrec){
		$query = "Select * from penghargaan where regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function penghargaan_delete($kode,$regidrec){
		$query = "delete from penghargaan where kodepenghargaan=".$kode." and regidrec=".$regidrec;
		return $this->db->query($query);
	}
	function penghargaan_save($data,$kode){
		if($kode!=""){
			$this->db->where('kodepenghargaan', $kode);
			return $this->db->update('penghargaan', $data);
		}else{
			$this->db->select('*');
			$this->db->from('penghargaan');
			$this->db->where('namapenghargaan',$data['namapenghargaan']);
			if($this->db->count_all_results()>0){
				return null;
			}else{
				return $this->db->insert('penghargaan', $data);
			}
		}
	}
	/* END PENGHARGAAN*/
	
	/*KERJA*/
	function kerja_get_all($count,$offset,$perpage,$filter,$regidrec){
		$where = "";
		if(strlen($filter)>0){
			$where  = "and namalembaga like '".$filter."%'";
		}
		if($count){
			$query = "Select * from kerja where regidrec=".$regidrec." $where ";
		}else{
			$query = "Select * from kerja where regidrec=".$regidrec." $where order by namalembaga asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
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
			$query = "Select * from volunteer where regidrec=".$regidrec." $where order by namakegiatan asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
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
			$query = "Select * from prestasi where regidrec=".$regidrec." $where order by bidang asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
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