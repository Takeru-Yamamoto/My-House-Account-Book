<?php $from_genre = $data["from_genre"]; ?>
<?php unset($data["from_genre"]); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">支出追加</h1>
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
                        <form role="form" action="<?php echo base_url(); ?>hb_s/create" method="POST" accept-charset="utf-8">
                            <div class="card-body">
                                <p>
                                    <?php echo validation_errors(); ?>
                                </p>
                                <div class="form-group">
                                    <label>日付</label>
                                    <input type="date" name="date" class="form-control" placeholder="日付を入力してください">
                                </div>
                                <div class="form-group">
                                    <label>支出ジャンル</label>
                                    <select name="genre" class="form-control">
                                        <option selected>支出ジャンルを選択してください</option>
                                        <?php foreach ($from_genre as $row) { ?>
                                            <option value="<?php echo $row["id"]; ?>"><?php echo $row["genre"]; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>使用金額(円)</label>
                                    <input type="number" name="amount" class="form-control" placeholder="使用金額を入力してください">
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
                                        <th style="width: 18.75%;">日付</th>
                                        <th style="width: 18.75%;">支出ジャンル</th>
                                        <th style="width: 25%;">使用金額</th>
                                        <th style="width: 37.5%;">コメント</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $row) { ?>
                                        <tr>
                                            <td hidden><?php echo $row["id"]; ?></td>
                                            <td style="width: 18.75%;"><?php echo $row["date"]; ?></td>
                                            <td style="width: 18.75%;"><?php echo $row["genre"]; ?></td>
                                            <td style="width: 25%;"><?php echo $row["amount"]; ?>円</td>
                                            <td style="width: 37.5%;"><?php echo $row["comment"]; ?></td>
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