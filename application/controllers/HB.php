<?php
defined('BASEPATH') or exit('No direct script access allowed');

class hb extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['url', 'my_helper', 'form']);
        $this->load->library(array('session', 'Render', 'form_validation', 'ion_auth'));
        $this->load->model("HB_Model");
    }

    public function index()
    {
        $res = $this->HB_Model->index();
        if ($res["bool"] == false) {
            $data = array(
                "error" => "db",
                "crud" => "r"
            );
            $this->render->view("hb_error", $data);
        } else {
            $res = $res["res"];
            $res["crud"] = "r";
            $this->render->view("hb_interface", $res);
        }
    }
}
