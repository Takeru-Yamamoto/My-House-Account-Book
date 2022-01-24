<?php $crud = $data["crud"]; ?>
<?php unset($data["crud"]); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">支出ジャンル一覧</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th hidden>ID</th>
                                        <th style="width: 30%;">ジャンル</th>
                                        <th style="width: 40%;">コメント</th>
                                        <th style="width: 15%;">編集</th>
                                        <th style="width: 15%;">削除</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $row) { ?>
                                        <tr>
                                            <td hidden><?php echo $row["id"]; ?></td>
                                            <td style="width: 30%;"><?php echo $row["genre"]; ?></td>
                                            <td style="width: 40%;"><?php echo $row["comment"]; ?></td>
                                            <td style="width: 15%;"><a type="button" class="btn btn-block bg-gradient-success btn-lg" href="<?php echo base_url(); ?>hb_g/update_preparation/<?php echo $row['id']; ?>/">編集</a></td>
                                            <td style="width: 15%;"><a type="button" class="btn btn-block bg-gradient-danger btn-lg" onclick="confirm1(<?php echo $row['id']; ?>,'<?php echo $row['genre']; ?>')">削除</a></td>
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