<?PHP
defined('BASEPATH') or exit('No direct script access allowed');

class hb_i_model extends CI_Model
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
        $sql = "select hb_i.id,hb_i.date,hb_g_i.genre,hb_i.amount,hb_i.comment from hb_i  left join hb_g_i on hb_i.genre = hb_g_i.id where DATE_FORMAT(hb_i.date, '%Y%m') = DATE_FORMAT(NOW(), '%Y%m') ORDER BY date asc;";
        try {
            $res = $this->db->query($sql)->result_array();
        } catch (Exception $e) {
            $bool = false;
        }
        return ["res" => $res, "bool" => $bool];
    }

    function page_sort($posts)
    {
        $posts["page_sort"] = $posts["page_sort"]."-01";
        $bool = true;
        $sql = "select hb_i.id,hb_i.date,hb_g_i.genre,hb_i.amount,hb_i.comment from hb_i  left join hb_g_i on hb_i.genre = hb_g_i.id where DATE_FORMAT(hb_i.date, '%Y%m') = DATE_FORMAT('".$posts['page_sort']."', '%Y%m') ORDER BY date asc;";
        try {
            $res = $this->db->query($sql)->result_array();
        } catch (Exception $e) {
            $bool = false;
        }
        return ["res" => $res, "bool" => $bool];
    }

    function preparation(){
        $sql = "SELECT id,genre from hb_g_i order by id asc;";
        $res = $this->db->query($sql)->result_array();
        return $res;
    }


    function create($data)
    {
        $bool = true;
        if ($data["comment"] == null) {
            $data["comment"] = "No Comment";
        }
        $sql = "INSERT into hb_i(date,genre,amount,comment) value('" . $data["date"] . "','" . $data["genre"] . "','" . $data["amount"] . "','" . $data["comment"] . "')";
        try {
            $res = $this->db->query($sql);
        } catch (Exception $e) {
            $bool = false;
        }
        return ["res" => $res, "bool" => $bool];
    }

    function update_preparation($id)
    {
        $sql = "select hb_i.id,hb_i.date,hb_g_i.genre,hb_i.amount,hb_i.comment from hb_i  left join hb_g_i on hb_i.genre = hb_g_i.id where hb_i.id=" . $id . ";";
        $res = $this->db->query($sql)->row_array();
        return $res;
    }

    function update($posts)
    {
        $bool = true;
        $sql = "update hb_i set date = '". $posts["date"]."', genre = '". $posts["genre"]."', amount = '" . $posts["amount"] . "' , comment = '" . $posts["comment"] . "' where id = " . $posts["id"] . ";";
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
        $sql = "delete from hb_i where id = " . $id . " and amount = '" . $amount . "';";
        try {
            $res = $this->db->query($sql);
        } catch (Exception $e) {
            $bool = false;
        }
        return ["res" => $res, "bool" => $bool];
    }
}
