<?php defined('BASEPATH') || exit('No direct script access allowed');


class Dashboard extends MY_Controller
{
   
    public function __construct()
    {
        parent::__construct();
        $js = array(
         base_url('themes/adminpress/').'assets/plugins/raphael/raphael-min.js',
         base_url('themes/adminpress/').'assets/plugins/morrisjs/morris.min.js',
        
         // base_url('themes/adminpress/').'js/dashboard1.js',
        );
      	Assets::add_js($js);
        $this->load->model('dashboard_model');
      	
    }

    public function index()
    {
        Assets::add_module_js('office', 'js_dashboard.js');
        Template::render();
    }

 
    //------------------------------AJAX
    public function get_data($m='', $y='', $tipe='')
    {
        
        $data = $this->dashboard_model->get_dashboard($m, $y, $tipe);
        echo json_encode($data);
    }

}
