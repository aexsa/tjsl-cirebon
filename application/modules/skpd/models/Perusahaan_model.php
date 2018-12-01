<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class perusahaan_model extends MY_Model
    {

		protected $table_name        = 'perusahaan';
		protected $key               = 'perusahaan_id';
		protected $set_created       = TRUE;
		protected $created_field     = 'created_on';
		protected $created_by_field  = 'created_by';
		
		protected $set_modified      = TRUE;
		protected $modified_field    = 'modified_on';
		protected $modified_by_field = 'modified_by';
		protected $soft_deletes      = TRUE;
		protected $date_format       = 'datetime';

        //---------------------------------------------------------------


        public function get_all_perusahaan()
        {

        	$data =$this->db->select('a.*,b.*,c.*,d.*,c.nama as nama_kec, d.nama as nama_kel')
                        ->from('perusahaan a')
                        ->join('tipe_perusahaan b', 'a.tipe_perusahaan_id = b.tipe_perusahaan_id')
                        ->join('kecamatan c', 'a.kecamatan = c.id')
                        ->join('kelurahan d', 'a.kelurahan = d.id')
                        ->where('a.deleted',0)
                        ->get()->result();

        	$output = array();
        	 if (empty($data)){
	            	$output['data']=array("-","-","-","-","-","-","-");
	        	
	       	 }else{
	        foreach ($data as $row) {
	        	// untuk keterangan status tjsl
		        if($row->status == 0){
	              $status = "<a href='#'' class='btn waves-effect waves-light btn-xs btn-danger' >Belum Tjsl</a>";
	             } else {
	              $status = "<a href='#'' class='btn waves-effect waves-light btn-xs btn-success'>Sudah Tjsl</a>";
	             } 

	             // untuk keterangan status validasi
		        if($row->status_validasi == 0){
	              $status_validasi = "<a href='#' class='btn waves-effect waves-light btn-xs btn-danger' disabled>Belum Validasi</a>";
              	  $validasi = "<button type='button' class='validasi btn waves-effect waves-light btn-xs btn-success' data-id='$row->perusahaan_id'><i class='fa fa-check-square'></i> Validasi </button> ";
	             } else {
	              $status_validasi = "<a href='#'' class='btn waves-effect waves-light btn-xs btn-success' disabled><i class='fa fa-check-square'> </i> Sudah Validasi</a>";
              	  $batal = "<button type='button' class='batal btn waves-effect waves-light btn-xs btn-danger' data-id='$row->perusahaan_id' ><i class='fa fa-close'></i> Batalkan </button> ";
	            	
	             } 

	            $array = array();
	            $array[] = $row->perusahaan_id;
	            $array[] = $row->nama_perusahaan;
	            $array[] = $row->nama_tipe_perusahaan;
	            $array[] = $row->nama_kec;
	            $array[] = $row->nama_kel;
	            $array[] = $row->alamat;
	            $array[] = $status;
	             if($row->status_validasi == 0){
	            	$array[] = $status_validasi .' | '. $validasi;
	             }else{
	             	$array[] = $status_validasi .' | '. $batal;
	             }
	            // $array[] = $row->ket;
	            // $array[] = "<button type='button' class='btn waves-effect waves-light btn-xs btn-info'>Tiny .btn-xs</button>";
	            $array[] = '<a class="preview_siup btn waves-effect waves-light btn-xs btn-warning" data-id="'.$row->perusahaan_id.'" data-file="'.$row->siup.'" style="color:#FFF;"><i class="fa fa-file-pdf-o"></i> Cek SIUP</a>
	            				<a class="edit btn waves-effect waves-light btn-xs btn-info" data-id="'.$row->perusahaan_id.'" style="color:#FFF;"><i class="fa fa-edit"></i> Edit</a>	
	            				<a class="delete btn waves-effect waves-light btn-xs btn-danger" data-id="'.$row->perusahaan_id.'" style="color:#FFF;"><i class="fa fa-trash-o"></i> Hapus</a> ';
	           
	            $output['data'][] = $array;     
	        }
	    }

	        return $output;
        }

        public function get_option_select()
        {
        	$data = $this->where('deleted',0)->find_all();
        	$output = array();

        	foreach ($data as $row) {
        		$output[$row->perusahaan_id]=$row->nama_perusahaan;
        	}
        	return $output;
        }

        public function get_kecamatan(){
		$this->db->select('*');
		$this->db->from('kecamatan');
		//Get contents
		return $this->db->get()->result_array();
	}

	public function get_kelurahan($id){
		$kelurahan="<option value=''>--pilih--</option>";

		$this->db->select('*');
		$this->db->from('kelurahan');
		$this->db->where('id_kec', $id);
		//Get contents
		foreach ($this->db->get()->result_array() as $data ){
			$kelurahan.= "<option value='$data[id]'>$data[nama]</option>";
		}

		return $kelurahan;
	}

		// savve perusahaan ketika pertama kali register

	public function upload_file(){

        $config['upload_path'] = './uploads/siup';
        $config['allowed_types'] = 'jpg|png|jpeg|xls|doc|pdf|docx';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;

        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        if($this->upload->do_upload('files')){ // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        }else{
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

	public

    function save_perusahaan($data_perusahaan)
    {
        $id_perusahaan = $this->db->insert('perusahaan', $data_perusahaan);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

     public function get_perusahaan($id = '')
        {
        	// print_r($id);die();

        	$data =$this->db->select('a.*,b.*,c.*,d.*,c.nama as nama_kec, d.nama as nama_kel')
                        ->from('perusahaan a')
                        ->join('tipe_perusahaan b', 'a.tipe_perusahaan_id = b.tipe_perusahaan_id')
                        ->join('kecamatan c', 'a.kecamatan = c.id')
                        ->join('kelurahan d', 'a.kelurahan = d.id')
                        ->where('a.deleted',0)
                        ->where('a.perusahaan_id',$id)
                        ->get()->row();

	        return $data;
        }

// buat ngambil keterangan validasi atau belum
          public function get_notif_perusahaan()
        {
            $users_id = $this->auth->user_id();
            // var_dump($users_id); die();

        	$data =$this->db->select('a.nama_perusahaan, a.status_validasi, b.id')
                        ->from('perusahaan a')
                        ->join('users b', 'a.perusahaan_id = b.perusahaan_id')
                        ->where('a.deleted',0)
                        ->where('b.id',$users_id)
                        ->get()->result();

	        return $data;


        }



    }