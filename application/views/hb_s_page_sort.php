<?php $crud = $data["crud"]; ?>
<?php unset($data["crud"]); ?>
<?php $ym = $data["page_sort"]; ?>
<?php unset($data["page_sort"]); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">支出一覧</h1><br>
                    <h2 class="m-0"><?php echo $ym; ?></h2>
                </div><!-- /.col -->
                <div class="col-sm-2">
                    <div class="card card-primary">
                    <div class="card-header">
                            <h5 class="card-title">参照データ変更</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" action="<?php echo base_url(); ?>hb_s/page_sort" method="POST" accept-charset="utf-8">
                            <div class="card-body">
                                <p>
                                    <?php echo validation_errors(); ?>
                                </p>
                                <div class="input-group input-group-sm">
                                    <input type="month" name="page_sort" class="form-control">
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-primary" 　>変更</button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
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
                                        <th style="width: 15%;">日付</th>
                                        <th style="width: 15%;">支出ジャンル</th>
                                        <th style="width: 20%;">使用金額</th>
                                        <th style="width: 30%;">コメント</th>
                                        <th style="width: 10%;">編集</th>
                                        <th style="width: 10%;">削除</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $row) { ?>
                                        <tr>
                                            <td hidden><?php echo $row["id"]; ?></td>
                                            <td style="width: 15%;"><?php echo $row["date"]; ?></td>
                                            <td style="width: 15%;"><?php echo $row["genre"]; ?></td>
                                            <td style="width: 20%;"><?php echo $row["amount"]; ?>円</td>
                                            <td style="width: 30%;"><?php echo $row["comment"]; ?></td>
                                            <td style="width: 10%;"><a type="button" class="btn btn-block bg-gradient-success btn-lg" href="<?php echo base_url(); ?>hb_s/update_preparation/<?php echo $row['id']; ?>/">編集</a></td>
                                            <td style="width: 10%;"><a type="button" class="btn btn-block bg-gradient-danger btn-lg" onclick="confirm3(<?php echo $row['id']; ?>,'<?php echo $row['date']; ?>','<?php echo $row['genre']; ?>','<?php echo $row['amount']; ?>')">削除</a></td>
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