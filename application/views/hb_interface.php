<!-- Content Wrapper. Contains page content -->
<?php
$crud = $data["crud"];
$month_t = $data["month_t"];
$month_l = $data["month_l"];
$sum_tm = $data["sum_tm"];
$sum_lm = $data["sum_lm"];
$sum_all = $data["sum_all"];
$sum_daily = $data["sum_daily"];
$sum_expected = $data["sum_expected"];
$genre = $data["genre"];
$sum_rank = $data["sum_rank"];
$genre_rank = $data["genre_rank"];
$r_cost = $data["r_cost"];
$total_cost = $data["total_cost"];
$i_all = $data["i_all"];
$saving_this_month = $data["saving_this_month"];

$today = date("m月d日");
$length = count($genre);
$i = 0;
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">家計グラフ</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h5 class="card-title"><?php echo date('Y年m月'); ?>支出 ジャンル別割合 (合計支出額:<?php echo $sum_tm; ?>円)</h5>
                        </div>
                        <div class="card-body">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="Chartjs_doughnut_month_t" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h5 class="card-title"><?php echo date('Y年m月', strtotime(date('Y-m-1') . ' -1 month')); ?>支出 ジャンル別割合 (合計支出額:<?php echo $sum_lm; ?>円)</h5>
                        </div>
                        <div class="card-body">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="Chartjs_doughnut_month_l" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
                <div class="col-md-6">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h5 class="card-title"><?php echo date('Y年m月'); ?>支出ランキング</h5>
                        </div>
                        <div class="card-body">
                            <?php for ($i = 1; $i <= 3; $i++) { ?>
                                <h5 style="padding-top: .5em; border-bottom: solid 1px #000;">第<?php echo $i; ?>位：<?php echo $genre_rank["rank" . $i]; ?> <?php echo $sum_rank["rank" . $i]; ?>円</h5><br>
                            <?php }
                            $i = 0; ?>
                        </div>
                    </div>
                    <div class="card card-warning">
                        <div class="card-header">
                            <h5 class="card-title"><?php echo date('Y年m月'); ?>支出 日割り</h5>
                        </div>
                        <div class="card-body">
                            <h5 style="padding-top: .5em; border-bottom: solid 2px #000;"><?php echo $today; ?>現在：<?php echo $sum_daily; ?>円</h5><br>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h5 class="card-title"><?php echo date('Y年m月'); ?>の総支出（予想）</h5>
                        </div>
                        <div class="card-body">
                            <h5 style="padding-top: .5em; border-bottom: solid 2px #000;">1か月あたりのランニングコスト：<?php echo $r_cost; ?>円</h5><br>
                        </div>
                        <div class="card-body">
                            <h5 style="padding-top: .5em; border-bottom: solid 2px #000;"><?php echo date('Y年m月'); ?>の支出（予想）：<?php echo $sum_expected; ?>円</h5><br>
                        </div>
                        <div class="card-body">
                            <h5 style="padding-top: .5em; border-bottom: solid 2px #000;"><?php echo date('Y年m月'); ?>の総支出（予想）：<?php echo $total_cost; ?>円</h5><br>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h5 class="card-title"><?php echo date('Y年m月'); ?>の貯金金額（予想）</h5>
                        </div>
                        <div class="card-body">
                            <h5 style="padding-top: .5em; border-bottom: solid 2px #000;"><?php echo date('Y年m月'); ?>の総収入（予想）：<?php echo $i_all; ?>円</h5><br>
                        </div>
                        <div class="card-body">
                            <h5 style="padding-top: .5em; border-bottom: solid 2px #000;"><?php echo date('Y年m月'); ?>の貯金金額（予想）：<?php echo $saving_this_month; ?>円</h5><br>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div class="popup" id="js-popup">
    <div class="popup-inner">
        <?php if ($crud == "c") {
            echo "入力したデータの登録に成功しました。";
        } elseif ($crud == "r") {
            echo "データベースのデータの参照に成功しました。";
        } elseif ($crud == "u") {
            echo "選択したデータの編集に成功しました。";
        } elseif ($crud == "d") {
            echo "選択したデータの削除に成功しました。";
        }
        ?>
    </div>
</div>
<script>
    // 今月のドーナツグラフ
    var ctx = document.getElementById('Chartjs_doughnut_month_t').getContext('2d');
    var Chartjs_doughnut_month_t = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                <?php foreach ($genre as $row) {
                    echo "'" . $row["genre"] . "'";
                    $i++;
                    if ($i !== $length) {
                        echo ",";
                    }
                }
                $i = 0; ?>
            ], //各棒の名前（name)
            datasets: [{
                data: [
                    <?php foreach ($month_t as $row) {
                        echo $row;
                        $i++;
                        if ($i !== $length) {
                            echo ",";
                        }
                    }
                    $i = 0; ?>
                ], //各縦棒の高さ(値段)
                backgroundColor: [
                    <?php
                    foreach ($genre as $row) {
                        $randomString = md5($row["id"]);
                        $r = hexdec(substr($randomString, 0, 2));
                        $g = hexdec(substr($randomString, 2, 2));
                        $b = hexdec(substr($randomString, 4, 2));
                        echo "'rgba(" . $r . "," . $g . "," . $b . ",0.5)'";
                        $i++;
                        if ($i !== $length) {
                            echo ",";
                        }
                    }
                    $i = 0; ?>
                ],
                hoverBackgroundColor: [
                    <?php
                    foreach ($genre as $row) {
                        $randomString = md5($row["id"]);
                        $r = hexdec(substr($randomString, 0, 2));
                        $g = hexdec(substr($randomString, 2, 2));
                        $b = hexdec(substr($randomString, 4, 2));
                        echo "'rgba(" . $r . "," . $g . "," . $b . ",1)'";
                        $i++;
                        if ($i !== $length) {
                            echo ",";
                        }
                    }
                    $i = 0; ?>
                ],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        }
    });

    // 先月のドーナツグラフ
    var ctx = document.getElementById('Chartjs_doughnut_month_l').getContext('2d');
    var Chartjs_doughnut_month_l = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                <?php foreach ($genre as $row) {
                    echo "'" . $row["genre"] . "'";
                    $i++;
                    if ($i !== $length) {
                        echo ",";
                    }
                }
                $i = 0; ?>
            ], //各棒の名前（name)
            datasets: [{
                data: [
                    <?php foreach ($month_l as $row) {
                        echo $row;
                        $i++;
                        if ($i !== $length) {
                            echo ",";
                        }
                    }
                    $i = 0; ?>
                ], //各縦棒の高さ(値段)
                backgroundColor: [
                    <?php
                    foreach ($genre as $row) {
                        $randomString = md5($row["id"]);
                        $r = hexdec(substr($randomString, 0, 2));
                        $g = hexdec(substr($randomString, 2, 2));
                        $b = hexdec(substr($randomString, 4, 2));
                        echo "'rgba(" . $r . "," . $g . "," . $b . ",0.5)'";
                        $i++;
                        if ($i !== $length) {
                            echo ",";
                        }
                    }
                    $i = 0; ?>
                ],
                hoverBackgroundColor: [
                    <?php
                    foreach ($genre as $row) {
                        $randomString = md5($row["id"]);
                        $r = hexdec(substr($randomString, 0, 2));
                        $g = hexdec(substr($randomString, 2, 2));
                        $b = hexdec(substr($randomString, 4, 2));
                        echo "'rgba(" . $r . "," . $g . "," . $b . ",1)'";
                        $i++;
                        if ($i !== $length) {
                            echo ",";
                        }
                    }
                    $i = 0; ?>
                ],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        }
    });
</script>