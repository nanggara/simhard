<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class mdl_recipient extends CI_Model {
 
	function __construct(){
		parent::__construct();
	}  
	// query search pegawai
	function form_get_all($count,$offset,$perpage,$filter){
		$where = "where r.tipekeanggotaan='recipient' ";
		if(strlen($filter)>0){
			$where  .= "and r.namalengkap like '".$filter."%' ";
		}
		if($count){
			$query = "SELECT r.*,i.instansi,
					(SELECT telepon FROM telepon WHERE regid=r.regidrec ORDER BY urut ASC OFFSET 0 ROWS FETCH NEXT 1 ROWS ONLY) AS telepon,
					(SELECT email FROM daftaremail WHERE regid=r.regidrec ORDER BY urut ASC OFFSET 0 ROWS FETCH NEXT 1 ROWS ONLY) AS email
					FROM recipient As r 
					left join instansi i on  i.kodeinstansi=r.kodeinstansi $where ";
		}else{
			$query = "SELECT r.*,i.instansi,
					(SELECT telepon FROM telepon WHERE regid=r.regidrec ORDER BY urut ASC OFFSET 0 ROWS FETCH NEXT 1  ROWS ONLY ) AS telepon,
					(SELECT email FROM daftaremail WHERE regid=r.regidrec ORDER BY urut ASC OFFSET 0 ROWS FETCH NEXT 1  ROWS ONLY ) AS email
				    FROM recipient AS r 
					left join instansi i on  i.kodeinstansi=r.kodeinstansi $where 										order by r.namalengkap asc OFFSET $offset ROWS FETCH NEXT $perpage ROWS ONLY";
		}
		 
		return $this->db->query($query);
	}
	function form_get_byid($kode){ 
		// $query = "Select *,date_format(tglmasukanggota,'%d-%m-%Y') as tglmasukanggotafrm,
		// 		  date_format(tanggallahir,'%d-%m-%Y') as tanggallahirfrm, date_format(tmtcpns,'%d-%m-%Y') as tmtcpnsfrm
		// 		  from recipient where regidrec=".$kode;
		$query = "SELECT regidrec,noanggota,CONVERT(VARCHAR(10),tglmasukanggota,110) AS tglmasukanggotafrm,namalengkap,panggilan,tempatlahir,
						CONVERT(VARCHAR(10),tanggallahir,110) AS tanggallahirfrm,jeniskelamin,alamat,usia,kodeagama,kodekelompok,kodeuniversitas,
						kodeinstitusi,jabatan,kodejenjang,fakultas,programstudi,jurusan,kodepekerjaan,kodeinstansi,sukubangsa,linkedin,website,
						fb,twitter,catatan,photoprofil,cvpath,tipekeanggotaan,ipk,nipbaru,niplama,gelardpn,gelarblk,kodepos,jns_kepeg,kodekedudukan,
						kodekawin,statuspeg,CONVERT(VARCHAR(10),tmtcpns,110) AS tmtcpnsfrm,CONVERT(VARCHAR(10),tmtpns,110) AS tmtpnsfrm,kodejenjangawl,
						kodejenjangakh,CONVERT(VARCHAR(10),lulusawal,110) AS lulusawalfrm,CONVERT(VARCHAR(10),lulusakhir,110) AS lulusakhirfrm,
						CONVERT(VARCHAR(10),diklatstruktural1,110) AS diklatstruktural1frm,CONVERT(VARCHAR(10),diklatstruktural2,110) AS diklatstruktural2frm,
						CONVERT(VARCHAR(10),diklatstruktural3,110) AS diklatstruktural3frm,CONVERT(VARCHAR(10),diklatstruktural4,110) AS diklatstruktural4frm,
						CONVERT(VARCHAR(10),diklatstruktural5,110) AS diklatstruktural5frm,unitorganisasi,kodejabatan,jabstruk,eseleon,
						CONVERT(VARCHAR(10),tmteseleon,110) AS tmteseleonfrm,jafung,CONVERT(VARCHAR(10),tmtjafung,110) AS tmtjafungfrm,jafungumum,
						CONVERT(VARCHAR(10),tmtjafungumum,110) AS tmtjafungumumfrm,golawal,CONVERT(VARCHAR(10),tmtgolawal,110) AS tmtgolawalfrm,golakhir,
						CONVERT(VARCHAR(10),tmtgolakhir,110) AS tmtgolakhirfrm,gajipokokbaru,nokarpeg,nokaris,noaktalahir,noaskes,notaspen,
						CONVERT(VARCHAR(10),tglaktalahir,110) AS tglaktalahirfrm,nonpwp,CONVERT(VARCHAR(10),tglnpwp,110) AS tglnpwpfrm,kodegoldar
				  from recipient where regidrec=".$kode;
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
	function save_attachment($data){		
		return $this->db->insert('daftarattachment', $data);		
	}
	function update_cv($kode,$filename){
		$this->db->where('regidrec', $kode);
		$data['cvpath'] = $filename;
		return $this->db->update('recipient', $data);
	} 
	function form_delete($kode,$page){		
		$query = "delete from recipient where regidrec=".$kode;
		$aff =  $this->db->query($query);
		if($aff){
			$query = "delete from daftaremail where regid=".$kode." and page='".$page."'";
			$aff =  $this->db->query($query);
			if($aff){
				$query = "delete from telepon where regid=".$kode." and page='".$page."'";
				$aff =  $this->db->query($query);
			}
		}
		
		return $aff;
	}
	function generate_number($parsing){ 
		$query = "SELECT * FROM recipient 
				  WHERE tipekeanggotaan='recipient' and substring(noanggota,1,8)='".$parsing."'
				  ORDER BY regidrec DESC OFFSET 0 ROWS FETCH NEXT 1 ";
		$rst = $this->db->query($query);
		if($rst->num_rows()>0){
			$newno = substr($rst->first_row()->noanggota,8,4)+1;
			$newno = str_pad($newno,4,"0",STR_PAD_LEFT); 
			return $newno;
		}else{
			return "0001";
		}
	}
}