<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends MY_Model
{   
    
    public function create_morrid_data($data)
    {
       $chart = array();

       foreach ($data as $row) {
          $sub_array = array();
           foreach ($row as $key => $value) {
              $sub_array[$key]  = $value;
           }
           $chart[] = $sub_array;
       }

       return $chart;
    }

  

    public function count_permohonan_tjsl()
    {
      $data = $this->db->select('count(permohonan_tjsl_id) as jumlah')->from('permohonan_tjsl')->where('deleted', 0)->get()->row();

      return $data->jumlah;
    }

     public function count_permohonan_tjsl_acc()
    {
      $data = $this->db->select('count(permohonan_tjsl_id) as jumlah_acc')->from('permohonan_tjsl')->where('deleted', 0)->where('status', 1)->get()->row();

      return $data->jumlah_acc;
    }

    public function count_permohonan_tjsl_realisasi()
    {
      $data = $this->db->select('count(permohonan_tjsl_id) as jumlah_realisasi')->from('permohonan_tjsl')->where('deleted', 0)->where('status_realisasi', 1)->get()->row();

      return $data->jumlah_realisasi;
    }

    public function total_realisasi()
    {
      $data = $this->db->select('sum(nominal) as total')->from('realisasi_tjsl')->where('deleted', 0)->get()->row();

      return $data->total;
    }

 
    public function get_realisasi_tipe_perusahaan($m, $y, $tipe)
    {
        $data = $this->db->select('c.nama_tipe_perusahaan as tipe_perusahaan, sum(b.nominal) as realisasi')
        ->from('permohonan_tjsl a')->join('realisasi_tjsl b','a.permohonan_tjsl_id = b.permohonan_tjsl_id')
        ->join('tipe_perusahaan c', 'a.tipe_perusahaan_id = c.tipe_perusahaan_id', 'right')->group_by('c.tipe_perusahaan_id')->get()->result();
        
        $chart = $this->create_morrid_data($data);
        return $chart;
    }

    public function get_realisasi($m, $y, $tipe = false)
    {
      $data = $this->db->select('date(a.created_on) as tanggal, sum(a.nominal) as value')
      ->from('realisasi_tjsl a')->join('users b','a.created_by = b.id')->group_by('date(a.created_on)')
      ->get()->result();

      $chart = $this->create_morrid_data($data);
      return $chart;
    }

    

    public function get_dashboard($m, $y, $tipe=false)
    {
        $result = array();
        $result['realisasi_tipe_perusahaan'] = $this->get_realisasi_tipe_perusahaan($m, $y, $tipe);
        $result['jumlah_permohonan_tjsl'] = $this->count_permohonan_tjsl();
        $result['jumlah_permohonan_tjsl_acc'] = $this->count_permohonan_tjsl_acc();
        $result['jumlah_permohonan_tjsl_realisasi'] = $this->count_permohonan_tjsl_realisasi();
        $result['total_realisasi'] = $this->total_realisasi();
        $result['realisasi'] =  $this->get_realisasi($m, $y, $tipe);


        return $result;
    }
}