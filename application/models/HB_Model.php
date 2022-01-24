<?PHP
defined('BASEPATH') or exit('No direct script access allowed');

class hb_model extends CI_Model
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
        $date = date("Y-m-d");
        $day = date("d");
        $day_count = date("t");
        $bool = true;
        $i = 0;
        $sum = 0;
        $sum_rank1 = 0;
        $genre_rank1 = 0;
        $sum_rank2 = 0;
        $genre_rank2 = 0;
        $sum_rank3 = 0;
        $genre_rank3 = 0;
        $sum_tm = 0;
        $sum_lm = 0;
        $sum_all = 0;
        $r_cost_per_day = 0;
        $i_all = 0;

        $sql = "select id,genre from hb_g order by id asc;";
        try {
            $genre = $this->db->query($sql)->result_array();
        } catch (Exception $e) {
            $bool = false;
        }

        $sql = "select pace_num,pace_period,amount from hb_r order by id asc;";
        try {
            $r_cost_all = $this->db->query($sql)->result_array();
        } catch (Exception $e) {
            $bool = false;
        }

        foreach ($r_cost_all as $row) {
            if ($row["pace_period"] == "day") {
                $r_cost_per_day += ($row["amount"] / $row["pace_num"]);
            } elseif ($row["pace_period"] == "week") {
                $r_cost_per_day += ($row["amount"] / ($row["pace_num"] * 7));
            } elseif ($row["pace_period"] == "month") {
                $r_cost_per_day += ($row["amount"] / ($row["pace_num"] * $day_count));
            } elseif ($row["pace_period"] == "year") {
                if (date("L")) {
                    $r_cost_per_day += ($row["amount"] / ($row["pace_num"] * 366));
                } else {
                    $r_cost_per_day += ($row["amount"] / ($row["pace_num"] * 365));
                }
            }
        }

        $r_cost = $r_cost_per_day * $day_count;

        $sql = "select amount from hb_i where DATE_FORMAT(date, '%Y%m') = DATE_FORMAT('" . $date . "', '%Y%m') order by id asc;";
        try {
            $i_month_t = $this->db->query($sql)->result_array();
        } catch (Exception $e) {
            $bool = false;
        }

        foreach ($i_month_t as $row) {
            $i_all += $row["amount"];
        }

        foreach ($genre as $row) {
            $i = $row["id"];
            $sql = "select amount from hb_s where genre = '" . $row["id"] . "' and DATE_FORMAT(date, '%Y%m') = DATE_FORMAT('" . $date . "', '%Y%m');";
            try {
                $buffer = $this->db->query($sql)->result_array();
            } catch (Exception $e) {
                $bool = false;
            }
            foreach ($buffer as $a) {
                $sum += $a["amount"];
            }

            if ($sum > $sum_rank1) {
                $sum_rank3 = $sum_rank2;
                $genre_rank3 = $genre_rank2;
                $sum_rank2 = $sum_rank1;
                $genre_rank2 = $genre_rank1;
                $sum_rank1 = $sum;
                $genre_rank1 = $row["genre"];
            } elseif ($sum > $sum_rank2) {
                $sum_rank3 = $sum_rank2;
                $genre_rank3 = $genre_rank2;
                $sum_rank2 = $sum;
                $genre_rank2 = $row["genre"];
            } elseif ($sum > $sum_rank3) {
                $sum_rank3 = $sum;
                $genre_rank3 = $row["genre"];
            }
            $res1["$i"] = $sum;
            $sum_tm += $sum;
            $sum_all += $sum;
            $sum = 0;
            $buffer = array(0);
        }

        $i = 0;
        $sum = 0;
        $sum_daily = $sum_all / $day;
        $sum_expected = $sum_daily * $day_count;
        $total_cost = $sum_expected + $r_cost;
        $saving_this_month = $i_all - $total_cost;

        foreach ($genre as $row) {
            $i = $row["id"];
            $sql = "select amount from hb_s where genre = '" . $row["id"] . "' and date_format(date, '%Y%m') = date_format(now() - interval 1 month, '%Y%m');";
            try {
                $buffer = $this->db->query($sql)->result_array();
            } catch (Exception $e) {
                $bool = false;
            }
            foreach ($buffer as $a) {
                $sum += $a["amount"];
            }
            $res2["$i"] = $sum;
            $sum_lm += $sum;
            $sum = 0;
            $buffer = array(0);
        }

        $sum_rank = array(
            "rank1" => $sum_rank1,
            "rank2" => $sum_rank2,
            "rank3" => $sum_rank3
        );
        $genre_rank = array(
            "rank1" => $genre_rank1,
            "rank2" => $genre_rank2,
            "rank3" => $genre_rank3
        );
        $res = array(
            "genre" => $genre,
            "month_t" => $res1,
            "month_l" => $res2,
            "sum_tm" => $sum_tm,
            "sum_lm" => $sum_lm,
            "sum_all" => $sum_all,
            "sum_daily" => $sum_daily,
            "sum_expected" => $sum_expected,
            "sum_rank" => $sum_rank,
            "genre_rank" => $genre_rank,
            "r_cost" => $r_cost,
            "total_cost" => $total_cost,
            "i_all" => $i_all,
            "saving_this_month" => $saving_this_month,

        );
        return ["res" => $res, "bool" => $bool];
    }
}
