<?PHP
defined('BASEPATH') or exit('No direct script access allowed');

class hb_r_model extends CI_Model
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
        $sql = "select * from hb_r ;";
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
        if ($data["comment"] == null) {
            $data["comment"] = "No Comment";
        }
        $sql = "INSERT into hb_r(pace_num,pace_period,name,amount,comment) value('" . $data["pace_num"] . "','" . $data["pace_period"] . "','" . $data["name"] . "','" . $data["amount"] . "','" . $data["comment"] . "')";
        try {
            $res = $this->db->query($sql);
        } catch (Exception $e) {
            $bool = false;
        }
        return ["res" => $res, "bool" => $bool];
    }

    function update_preparation($id)
    {
        $sql = "select * from hb_r where id=" . $id . ";";
        $res = $this->db->query($sql)->row_array();
        return $res;
    }

    function update($posts)
    {
        $bool = true;
        $sql = "update hb_r set pace_num = '". $posts["pace_num"]."', pace_period = '". $posts["pace_period"]."', name = '". $posts["name"]."', amount = '" . $posts["amount"] . "' , comment = '" . $posts["comment"] . "' where id = " . $posts["id"] . ";";
        try {
            $res = $this->db->query($sql);
        } catch (Exception $e) {
            $bool = false;
        }
        return ["res" => $res, "bool" => $bool];
    }

    function delete($id, $amount)
    {
        $bool = true;
        $sql = "delete from hb_r where id = " . $id . " and amount = '" . $amount . "';";
        try {
            $res = $this->db->query($sql);
        } catch (Exception $e) {
            $bool = false;
        }
        return ["res" => $res, "bool" => $bool];
    }
}
