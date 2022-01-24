<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ランニングコスト追加</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php $this->load->helper('form'); ?>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- form start -->
                        <form role="form" action="<?php echo base_url(); ?>hb_r/create" method="POST" accept-charset="utf-8">
                            <div class="card-body">
                                <p>
                                    <?php echo validation_errors(); ?>
                                </p>
                                <div class="form-group">
                                    <label>ランニングコスト名</label>
                                    <input type="text" name="name" class="form-control" placeholder="ランニングコスト名を入力してください">
                                </div>
                                <label>ランニングペース</label>
                                <p>例)係数:1 単位:week → 毎週毎, 係数:6 単位:month → 半年毎</p>
                                <div class="form-group">
                                    <label>係数</label>
                                    <input type="number" name="pace_num" class="form-control" placeholder="係数を入力してください">
                                </div>
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
                                <div class="form-group">
                                    <label>ランニングコスト金額</label>
                                    <input type="number" name="amount" class="form-control" placeholder="ランニングコスト金額を入力してください">
                                </div>
                                <div class="form-group">
                                    <label>コメント</label>
                                    <input type="textbox" name="comment" class="form-control" placeholder="コメントを入力してください">
                                    <p class="help-block">※コメントは必須ではありません</p>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" 　>追加</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">登録済み</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th hidden>ID</th>
                                        <th style="width: 15%;">ランニングコスト名</th>
                                        <th style="width: 15%;">ランニングペース</th>
                                        <th style="width: 20%;">ランニングコスト金額</th>
                                        <th style="width: 30%;">コメント</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $row) { ?>
                                        <tr>
                                            <td hidden><?php echo $row["id"]; ?></td>
                                            <td style="width: 15%;"><?php echo $row["name"]; ?></td>
                                            <td style="width: 15%;"><?php echo $row["pace_num"]; ?> <?php echo $row["pace_period"]; ?></td>
                                            <td style="width: 20%;"><?php echo $row["amount"]; ?>円</td>
                                            <td style="width: 30%;"><?php echo $row["comment"]; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->