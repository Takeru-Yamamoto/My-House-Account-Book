<?php
defined('BASEPATH') or exit('No direct script access allowed');

class hb_g_i extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['url', 'my_helper', 'form']);
        $this->load->library(array('session', 'Render', 'form_validation', 'ion_auth'));
        $this->load->model("HB_G_I_Model");
    }

    function index()
    {
        $res = $this->HB_G_I_Model->index();
        if ($res["bool"] == false) {
            $data = array(
                "error" => "db",
                "crud" => "r"
            );
            $this->render->view("hb_error", $data);
        } else {
            $res = $res["res"];
            $res["crud"] = "r";
            $this->render->view("hb_g_i", $res);
        }
    }

    function create_preparation()
    {
        $res = $this->HB_G_I_Model->index();
        if ($res["bool"] == false) {
            $data = array(
                "error" => "db",
                "crud" => "r"
            );
            $this->render->view("hb_error", $data);
        } else {
            $res = $res["res"];
            $this->render->view("hb_g_i_create_preparation", $res);
        }
    }

    function create()
    {
        $posts = $this->input->post();
        $config = array(
            array(
                'field' => 'genre',
                'label' => '支出ジャンル名',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == false) {
            $this->render->view("hb_g_i_create_preparation");
        } else {
            $res = $this->HB_G_I_Model->create($posts);
            if ($res["bool"] == false) {
                $data = array(
                    "error" => "db",
                    "crud" => "c"
                );
                $this->render->view("hb_error", $data);
            } else {
                $res = $this->HB_G_I_Model->index();
                if ($res["bool"] == false) {
                    $data = array(
                        "error" => "db",
                        "crud" => "c"
                    );
                    $this->render->view("hb_error", $data);
                } else {
                    $res = $res["res"];
                    $res["crud"] = "c";
                    $this->render->view("hb_g_i", $res);
                }
            }
        }
    }

    function update_preparation()
    {
        $id = $this->uri->segment(3);
        $res = $this->HB_G_I_Model->update_preparation($id);
        $this->render->view("hb_g_i_update", $res);
    }

    function update()
    {
        $posts = $this->input->post();
        $res = $this->HB_G_I_Model->update($posts);
        if ($res["bool"] == false) {
            $data = array(
                "error" => "db",
                "crud" => "u"
            );
            $this->render->view("hb_error", $data);
        } else {
            $res = $this->HB_G_I_Model->index();
            if ($res["bool"] == false) {
                $data = array(
                    "error" => "db",
                    "crud" => "u"
                );
                $this->render->view("hb_error", $data);
            } else {
                $res = $res["res"];
                $res["crud"] = "u";
                $this->render->view("hb_g_i", $res);
            }
        }
    }

    function delete()
    {
        $id = $this->uri->segment(3);
        $res = $this->HB_G_I_Model->delete($id);
        if ($res["bool"] == false) {
            $data = array(
                "error" => "db",
                "crud" => "d"
            );
            $this->render->view("hb_error", $data);
        } else {
            $res = $this->HB_G_I_Model->index();
            if ($res["bool"] == false) {
                $data = array(
                    "error" => "db",
                    "crud" => "d"
                );
                $this->render->view("hb_error", $data);
            } else {
                $res = $res["res"];
                $res["crud"] = "d";
                $this->render->view("hb_g_i", $res);
            }
        }
    }
}
