<?PHP
defined('BASEPATH') or exit('No direct script access allowed');

class hb_g_i_model extends CI_Model
{

    function __construct()
    {
        // Model クラスのコンストラクタを呼び出す
        parent::__construct();
        //$this->load->database();
        $this->load->database();
    }

    function index()
    {
        $bool = true;
        $sql = "select * from hb_g_i ;";
        try {
            $res = $this->db->query($sql)->result_array();
        } catch (Exception $e) {
            $bool = false;
        }
        return ["res" => $res, "bool" => $bool];
    }

    function create($data)
    {
        $bool = true;
        $sql = "SELECT id from hb_g_i order by id desc";
        try {
            $res = $this->db->query($sql)->result_array();
        } catch (Exception $e) {
            $bool = false;
        }
        $count = count($res);
        if ($count == 1 && $res[0]["id"] == 2147483647) {
            $id = 1;
        } elseif ($count == 1 && $res[0]["id"] != 2147483647) {
            $id = $res[0]["id"] + 1;
        } elseif ($res == null) {
            $id = 1;
        } else {
            $id = $res[1]["id"] + 1;
        }
        if ($data["comment"] == null) {
            $data["comment"] = "No Comment";
        }
        $sql = "INSERT into hb_g_i(id,genre,comment) value('" . $id . "','" . $data["genre"] . "','" . $data["comment"] . "')";
        try {
            $res = $this->db->query($sql);
        } catch (Exception $e) {
            $bool = false;
        }
        return ["res" => $res, "bool" => $bool];
    }

    function update_preparation($id)
    {
        $sql = "select * from hb_g_i where id=" . $id . ";";
        $res = $this->db->query($sql)->row_array();
        return $res;
    }

    function update($posts)
    {
        $bool = true;
        $sql = "update hb_g_i set genre = '" . $posts["genre"] . "' , comment = '" . $posts["comment"] . "' where id = " . $posts["id"] . ";";
        try {
            $res = $this->db->query($sql);
        } catch (Exception $e) {
            $bool = false;
        }
        return ["res" => $res, "bool" => $bool];
    }

    function delete($id)
    {
        $bool = true;
        $sql = "delete from hb_g_i where id = " . $id . ";";
        try {
            $res = $this->db->query($sql);
        } catch (Exception $e) {
            $bool = false;
        }
        return ["res" => $res, "bool" => $bool];
    }
}
