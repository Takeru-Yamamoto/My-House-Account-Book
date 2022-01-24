<?php
defined('BASEPATH') or exit('No direct script access allowed');

class hb_r extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['url', 'my_helper', 'form']);
        $this->load->library(array('session', 'Render', 'form_validation', 'ion_auth'));
        $this->load->model("HB_R_Model");
    }

    function index()
    {
        $res = $this->HB_R_Model->index();
        if ($res["bool"] == false) {
            $data = array(
                "error" => "db",
                "crud" => "r"
            );
            $this->render->view("hb_error", $data);
        } else {
            $res = $res["res"];
            $res["crud"] = "r";
            $this->render->view("hb_r", $res);
        }
    }

    function create_preparation()
    {
        $res = $this->HB_R_Model->index();
        if ($res["bool"] == false) {
            $data = array(
                "error" => "db",
                "crud" => "r"
            );
            $this->render->view("hb_error", $data);
        } else {
            $res = $res["res"];
            $this->render->view("hb_r_create_preparation", $res);
        }
    }

    function create()
    {
        $posts = $this->input->post();
        $config = array(
            array(
                'field' => 'pace_num',
                'label' => '係数',
                'rules' => 'required'
            ),
            array(
                'field' => 'pace_period',
                'label' => '単位',
                'rules' => 'required'
            ),
            array(
                'field' => 'name',
                'label' => '収入の名称',
                'rules' => 'required'
            ),
            array(
                'field' => 'amount',
                'label' => '収入金額',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == false) {
            $this->render->view("hb_r_create_preparation");
        } else {
            $res = $this->HB_R_Model->create($posts);
            if ($res["bool"] == false) {
                $data = array(
                    "error" => "db",
                    "crud" => "c"
                );
                $this->render->view("hb_error", $data);
            } else {
                $res = $this->HB_R_Model->index();
                if ($res["bool"] == false) {
                    $data = array(
                        "error" => "db",
                        "crud" => "c"
                    );
                    $this->render->view("hb_error", $data);
                } else {
                    $res = $res["res"];
                    $res["crud"] = "c";
                    $this->render->view("hb_r", $res);
                }
            }
        }
    }

    function update_preparation()
    {
        $id = $this->uri->segment(3);
        $res = $this->HB_R_Model->update_preparation($id);
        $this->render->view("hb_r_update", $res);
    }

    function update()
    {
        $posts = $this->input->post();
        $res = $this->HB_R_Model->update($posts);
        if ($res["bool"] == false) {
            $data = array(
                "error" => "db",
                "crud" => "u"
            );
            $this->render->view("hb_error", $data);
        } else {
            $res = $this->HB_R_Model->index();
            if ($res["bool"] == false) {
                $data = array(
                    "error" => "db",
                    "crud" => "u"
                );
                $this->render->view("hb_error", $data);
            } else {
                $res = $res["res"];
                $res["crud"] = "u";
                $this->render->view("hb_r", $res);
            }
        }
    }

    function delete()
    {
        $id = $this->uri->segment(3);
        $amount = $this->uri->segment(4);
        $res = $this->HB_R_Model->delete($id, $amount);
        if ($res["bool"] == false) {
            $data = array(
                "error" => "db",
                "crud" => "d"
            );
            $this->render->view("hb_error", $data);
        } else {
            $res = $this->HB_R_Model->index();
            if ($res["bool"] == false) {
                $data = array(
                    "error" => "db",
                    "crud" => "d"
                );
                $this->render->view("hb_error", $data);
            } else {
                $res = $res["res"];
                $res["crud"] = "d";
                $this->render->view("hb_r", $res);
            }
        }
    }
}
