<?PHP
defined('BASEPATH') or exit('No direct script access allowed');

class hb_s_model extends CI_Model
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
        $sql = "select hb_s.id,hb_s.date,hb_g.genre,hb_s.amount,hb_s.comment from hb_s  left join hb_g on hb_s.genre = hb_g.id where DATE_FORMAT(hb_s.date, '%Y%m') = DATE_FORMAT(NOW(), '%Y%m') ORDER BY date asc;";
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
        $sql = "select hb_s.id,hb_s.date,hb_g.genre,hb_s.amount,hb_s.comment from hb_s  left join hb_g on hb_s.genre = hb_g.id where DATE_FORMAT(hb_s.date, '%Y%m') = DATE_FORMAT('".$posts['page_sort']."', '%Y%m') ORDER BY date asc;";
        try {
            $res = $this->db->query($sql)->result_array();
        } catch (Exception $e) {
            $bool = false;
        }
        return ["res" => $res, "bool" => $bool];
    }

    function preparation(){
        $sql = "SELECT id,genre from hb_g order by id asc;";
        $res = $this->db->query($sql)->result_array();
        return $res;
    }


    function create($data)
    {
        $bool = true;
        if ($data["comment"] == null) {
            $data["comment"] = "No Comment";
        }
        $sql = "INSERT into hb_s(date,genre,amount,comment) value('" . $data["date"] . "','" . $data["genre"] . "','" . $data["amount"] . "','" . $data["comment"] . "')";
        try {
            $res = $this->db->query($sql);
        } catch (Exception $e) {
            $bool = false;
        }
        return ["res" => $res, "bool" => $bool];
    }

    function update_preparation($id)
    {
        $sql = "select hb_s.id,hb_s.date,hb_g.genre,hb_s.amount,hb_s.comment from hb_s  left join hb_g on hb_s.genre = hb_g.id where hb_s.id=" . $id . ";";
        $res = $this->db->query($sql)->row_array();
        return $res;
    }

    function update($posts)
    {
        $bool = true;
        $sql = "update hb_s set date = '". $posts["date"]."', genre = '". $posts["genre"]."', amount = '" . $posts["amount"] . "' , comment = '" . $posts["comment"] . "' where id = " . $posts["id"] . ";";
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
        $sql = "delete from hb_s where id = " . $id . " and amount = '" . $amount . "';";
        try {
            $res = $this->db->query($sql);
        } catch (Exception $e) {
            $bool = false;
        }
        return ["res" => $res, "bool" => $bool];
    }
}
