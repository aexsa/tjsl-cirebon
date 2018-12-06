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
      $users_id = $this->auth->user_id();

      $data = $this->db->select('count(a.permohonan_tjsl_id) as jumlah')
      ->from('permohonan_tjsl a')
      ->join('perusahaan b', 'a.perusahaan_id = b.perusahaan_id')
      ->join('users c', 'b.perusahaan_id = c.perusahaan_id')
      ->where('a.deleted',0)
      ->where('c.id',$users_id)
      ->get()->row();

      return $data->jumlah;
    }

     public function count_permohonan_tjsl_acc()
    {
      $users_id = $this->auth->user_id();

      $data = $this->db->select('count(a.permohonan_tjsl_id) as jumlah_acc')
      ->from('permohonan_tjsl a')
      ->join('perusahaan b', 'a.perusahaan_id = b.perusahaan_id')
      ->join('users c', 'b.perusahaan_id = c.perusahaan_id')
      ->where('a.deleted',0)
      ->where('c.id',$users_id)
      ->where('a.status', 1)->get()->row();

      return $data->jumlah_acc;
    }

    public function count_permohonan_tjsl_realisasi()
    {
      $users_id = $this->auth->user_id();

      $data = $this->db->select('count(a.permohonan_tjsl_id) as jumlah_realisasi')
      ->from('permohonan_tjsl a')
      ->join('perusahaan b', 'a.perusahaan_id = b.perusahaan_id')
      ->join('users c', 'b.perusahaan_id = c.perusahaan_id')
      ->where('a.deleted',0)
      ->where('c.id',$users_id)
      ->where('a.status_realisasi', 1)
      ->get()->row();

      return $data->jumlah_realisasi;
    }

    public function total_realisasi()
    {
      $users_id = $this->auth->user_id();

      $data = $this->db->select('sum(a.nominal) as total')
      ->from('realisasi_tjsl a')
      ->join('permohonan_tjsl b', 'a.permohonan_tjsl_id = b.permohonan_tjsl_id')
      ->join('perusahaan c', 'b.perusahaan_id = c.perusahaan_id')
      ->join('users d', 'c.perusahaan_id = d.perusahaan_id')
      ->where('a.deleted',0)
      ->where('d.id',$users_id)
      ->get()->row();

      return $data->total;
    }

 

    public function get_realisasi($m, $y, $tipe = false)
    {
      $users_id = $this->auth->user_id();

      $data = $this->db->select('date(a.created_on) as tanggal, sum(a.nominal) as value')
      ->from('realisasi_tjsl a')
      ->join('users b','a.created_by = b.id')
      ->where('b.id',$users_id)
      ->group_by('date(a.created_on)')
      ->get()->result();

      $chart = $this->create_morrid_data($data);
      return $chart;
    }

    

    public function get_dashboard($m, $y, $tipe=false)
    {
        $result = array();
        $result['jumlah_permohonan_tjsl'] = $this->count_permohonan_tjsl();
        $result['jumlah_permohonan_tjsl_acc'] = $this->count_permohonan_tjsl_acc();
        $result['jumlah_permohonan_tjsl_realisasi'] = $this->count_permohonan_tjsl_realisasi();
        $result['total_realisasi'] = $this->total_realisasi();
        $result['realisasi'] =  $this->get_realisasi($m, $y, $tipe);


        return $result;
    }
}