<!-- Content Wrapper. Contains page content -->
<?php $this->load->helper('form'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="data mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ランニングコスト編集</h1>
                </div><!-- /.col -->
            </div><!-- /.data -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="data">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">編集元データ</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th hidden>ID</th>
                                        <th style="width: 18.75%;">ランニングコスト名</th>
                                        <th style="width: 9.375%;">ランニングペース(係数)</th>
                                        <th style="width: 9.375%;">ランニングペース(単位)</th>
                                        <th style="width: 25%;">ランニングコスト金額</th>
                                        <th style="width: 37.5%;">コメント</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                            <td hidden><?php echo $data["id"]; ?></td>
                                            <td style="width: 18.75%;"><?php echo $data["name"]; ?></td>
                                            <td style="width: 9.375%;"><?php echo $data["pace_num"]; ?></td>
                                            <td style="width: 9.375%;"><?php echo $data["pace_period"]; ?></td>                                            
                                            <td style="width: 25%;"><?php echo $data["amount"]; ?>円</td>
                                            <td style="width: 37.5%;"><?php echo $data["comment"]; ?></td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">編集するデータを入力してください。</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" action="<?php echo base_url(); ?>hb_r/update" method="POST" accept-charset="utf-8">
                            <div class="card-body">
                                <p>
                                    <?php echo validation_errors(); ?>
                                </p>
                                <div class="form-group">
                                    <input hidden type="number" name="id" class="form-control" value="<?php echo $data['id']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>ランニングコスト名</label>
                                    <input type="text" name="name" class="form-control"  value="<?php echo $data['name']; ?>">
                                </div>
                                <label>ランニングペース</label>
                                <p>例)係数:1 単位:week → 毎週毎, 係数:6 単位:month → 半年毎</p>
                                <div class="form-group">
                                    <label>係数</label>
                                    <input type="number" name="pace_num" class="form-control"  value="<?php echo $data['pace_num']; ?>">
                                </div>
                                <?php if ($data["pace_num"] == "day") { ?>
                                    <div class="form-group">
                                    <label>単位</label>
                                    <select name="pace_period" class="form-control">
                                        <option selected>単位を選択してください</option>
                                        <option value="day">日</option>
                                        <option value="week">週</option>
                                        <option value="month">月</option>
                                        <option value="year">年</option>
                                    </select>
                                </div>
                                <?php } elseif ($data["pace_period"] == "day") { ?>
                                    <div class="form-group">
                                    <label>単位</label>
                                    <select name="pace_period" class="form-control">
                                        <option value="day" selected>日</option>
                                        <option value="week">週</option>
                                        <option value="month">月</option>
                                        <option value="year">年</option>
                                    </select>
                                </div>
                                <?php } elseif ($data["pace_period"] == "week") { ?>
                                    <div class="form-group">
                                    <label>単位</label>
                                    <select name="pace_period" class="form-control">
                                        <option value="day">日</option>
                                        <option value="week" selected>週</option>
                                        <option value="month">月</option>
                                        <option value="year">年</option>
                                    </select>
                                </div>
                                <?php } elseif ($data["pace_period"] == "month") { ?>
                                    <div class="form-group">
                                    <label>単位</label>
                                    <select name="pace_period" class="form-control">
                                        <option value="day">日</option>
                                        <option value="week">週</option>
                                        <option value="month" selected>月</option>
                                        <option value="year">年</option>
                                    </select>
                                </div>
                                <?php } elseif ($data["pace_period"] == "year") { ?>
                                    <div class="form-group">
                                    <label>単位</label>
                                    <select name="pace_period" class="form-control">
                                        <option value="day">日</option>
                                        <option value="week">週</option>
                                        <option value="month">月</option>
                                        <option value="year" selected>年</option>
                                    </select>
                                </div>
                                <?php } else { ?>
                                    <div class="form-group">
                                    <label>単位</label>
                                    <select name="pace_period" class="form-control">
                                        <option selected>単位を選択してください</option>
                                        <option value="day">日</option>
                                        <option value="week">週</option>
                                        <option value="month">月</option>
                                        <option value="year">年</option>
                                    </select>
                                </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label>ランニングコスト金額(円)</label>
                                    <input type="number" name="amount" class="form-control" value="<?php echo $data['amount']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>コメント</label>
                                    <input type="textbox" name="comment" class="form-control" value="<?php echo $data['comment']; ?>">
                                    <p class="help-block">※コメントは必須ではありません</p>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" 　>編集</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.data -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->