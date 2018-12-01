<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tjsl_model extends BF_Model {

	protected $table			= "";
	protected $key				= "id";
	protected $soft_deletes		= true;
	protected $date_format		= "datetime";
	protected $set_created		= true;
	protected $set_modified 	= true;
	protected $created_field 	= "created_on";
	protected $modified_field 	= "modified_on";

	//---------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	public function get_kode(){
        $q = $this->db->query("SELECT MAX(RIGHT(kode_permohonan,4)) AS kd_max FROM permohonan_tjsl WHERE DATE(created_on)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dmy').$kd;
    }

    public function get_program_prioritas(){
        $this->db->select('*');
		$this->db->from('program_prioritas');
		$this->db->where('deleted = 0');
		//Get contents
		return $this->db->get()->result_array();
    }

	public function get_sub_program_prioritas($id){
		$sub_program="<option value=''>--pilih--</option>";

		$this->db->select('*');
		$this->db->from('sub_program_prioritas');
		$this->db->where('program_prioritas_id', $id);

		//Get contents
		foreach ($this->db->get()->result_array() as $data ){
			$sub_program.= "<option value='$data[sub_program_prioritas_id]'>$data[nama_sub_program_prioritas]</option>";
		}

		return $sub_program;
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

	public function get_perusahaan($id){
		$perusahaan="<option value=''>--pilih--</option>";

		$this->db->select('*');
		$this->db->from('perusahaan');
		$this->db->where('tipe_perusahaan_id', $id);
		$this->db->where('status_validasi', 1);
		
		//Get contents
		foreach ($this->db->get()->result_array() as $data ){
			$perusahaan.= "<option value='$data[perusahaan_id]'>$data[nama_perusahaan]</option>";
		}

		return $perusahaan;
	}

	public function upload_file(){

        $config['upload_path'] = './uploads/files';
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

    public function save($upload){
        $this->db->insert('permohonan_tjsl', $upload);
    }



}
