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

    public function count($cabang)
    {
      if ($cabang != 'all') {
       $this->db->where('cabang_id', $cabang);
      }
      $data = $this->db->select('count(id) as jumlah')->from('users')->where('role_id', 13)->get()->row();

      return $data->jumlah;
    }

    public function count_konsumen($own = false)
    {
      if ($own == true) {
       // $this->db->where('cabang_id', $cabang);
      }
      $data = $this->db->select('count(id) as jumlah')->from('konsumen')->where('deleted', 0)->get()->row();

      return $data->jumlah;
    }

    public function get_item_terjual($m, $y, $cabang, $own = false)
    {
        if ($cabang != 'all') {
         $this->db->where('c.cabang_id', $cabang);
        }

        if ($own == true) {
          $this->db->where('a.created_by', $this->auth->user_id());
        }
        $data = $this->db->select('b.nama label, sum(a.qty) as value')
        ->from('penjualan_detail a')
        ->join('items b','a.items_id = b.id')
        ->join('users c', 'a.created_by = c.id')
        ->where('month(a.created_on)', $m)
        ->where('year(a.created_on)', $y)
        ->group_by('a.items_id')
        ->get()->result();

        $chart = $this->create_morrid_data($data);
        return $chart;
    }
 
    public function get_penjualan_cabang($m, $y, $cabang)
    {
        $data = $this->db->select('c.kota as cabang, sum(a.qty*a.harga) as penjualan')->from('penjualan_detail a')->join('users b','a.created_by = b.id')->join('cabang c', 'b.cabang_id = c.id', 'right')->group_by('c.id')->get()->result();
        
        $chart = $this->create_morrid_data($data);
        return $chart;
    }

    public function get_penjualan($m, $y, $cabang, $own = false)
    {
      if ($cabang != 'all') {
       $this->db->where('b.cabang_id', $cabang);
      }

      if ($own == true) {
          $this->db->where('a.created_by', $this->auth->user_id());
        }
      $data = $this->db->select('date(a.created_on) as tanggal, sum(a.total) as value')->from('penjualan a')->join('users b','a.created_by = b.id')->group_by('date(a.created_on)')->get()->result();

      $chart = $this->create_morrid_data($data);
      return $chart;
    }

    public function get_top_konsumen($m, $y, $cabang)
    {
        if ($cabang != 'all') {
         $this->db->where('c.cabang_id', $cabang);
        }
        $data = $this->db->select('b.nama, sum(total) as pembelian')
        ->from('penjualan a')
        ->join('konsumen b','a.konsumen_id = b.id')
        ->join('users c', 'a.created_by = c.id')
        ->where('month(a.created_on)', $m)
        ->where('year(a.created_on)', $y)
        ->group_by('a.konsumen_id')->order_by('sum(total)','desc')
        ->limit(5)
        ->get()->result();
        return $data;
    }

    public function get_top($m, $y, $cabang)
    {
        if ($cabang != 'all') {
         $this->db->where('b.cabang_id', $cabang);
        }
        $data = $this->db->select('b.display_name as nama, sum(total) as penjualan')
        ->from('penjualan a')
        ->join('users b','a.created_by = b.id')
        ->where('month(a.created_on)', $m)
        ->where('year(a.created_on)', $y)
        ->group_by('a.created_by')
        ->order_by('sum(total)','desc')
        ->limit(5
        )->get()->result();
        return $data;
    }

    public function get_dashboard($m, $y, $cabang, $own = false)
    {
        $result = array();
        
        
        $result['item_terjual'] = $this->get_item_terjual($m, $y, $cabang, $own);;
        $result['penjualan_cabang'] = $this->get_penjualan_cabang($m, $y, $cabang);
        $result['top_konsumen'] = $this->get_top_konsumen($m, $y, $cabang);
        $result['top'] = $this->get_top($m, $y, $cabang);
        $result['jumlah'] = $this->count($cabang);
        $result['jumlah_konsumen'] = $this->count_konsumen();
        $result['penjualan'] =  $this->get_penjualan($m, $y, $cabang, $own);


        return $result;
    }
}