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

       //  $this->load->model('dashboard_model');
      	// $this->load->model('general/cabang_model');
 
 
    }

    public function index()
    {
        Assets::add_module_js('skpd', 'js_dashboard.js');
        // $user = $this->auth->user();
        // Template::set('list_cabang',$this->cabang_model->get_option_select());
        // Template::set('cabang_id', $user->cabang_id);
        Template::render();
    }

    public function own()
    {
        Assets::add_module_js('pos', 'js_dashboard_own.js');
        $user = $this->auth->user();
        Template::set('list_cabang',$this->cabang_model->get_option_select());
        Template::set('cabang_id', $user->cabang_id);
        Template::render();
    }
    //------------------------------AJAX
    public function get_data($m, $y, $cabang, $own = '')
    {
        if ($own) {
            $x = true;
        }else{
            $x = false;
        }
        $data = $this->dashboard_model->get_dashboard($m, $y, $cabang, $x);
        echo json_encode($data);
    }

}
