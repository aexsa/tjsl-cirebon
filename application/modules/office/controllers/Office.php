<?php
defined('BASEPATH') || exit('No direct script access allowed');
class Office extends MY_Controller

{
    public

    function __construct()
    {
        parent::__construct();
        $this->load->model('skpd/perusahaan_model');
        
        Assets::add_module_js('office', 'js_office.js');

        // $this->auth->restrict('Super');

    }

    // ---------------------------------------------URL

    public

    function index()
    {

        $data=$this->perusahaan_model->get_notif_perusahaan();
        Template::set('status_perusahaan',$data);
        Template::render();
    }
     
   
}

/* End of file Cabang_controller.php */