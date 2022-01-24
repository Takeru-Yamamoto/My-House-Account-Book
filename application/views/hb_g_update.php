<!-- Content Wrapper. Contains page content -->
<?php $this->load->helper('form'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="data mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">支出ジャンル編集</h1>
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
                                        <th style="width: 40%;">ジャンル</th>
                                        <th style="width: 60%;">コメント</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td hidden><?php echo $data["id"]; ?></td>
                                        <td style="width: 40%;"><?php echo $data["genre"]; ?></td>
                                        <td style="width: 60%;"><?php echo $data["comment"]; ?></td>
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
                        <form role="form" action="<?php echo base_url(); ?>hb_g/update" method="POST" accept-charset="utf-8">
                            <div class="card-body">
                                <p>
                                    <?php echo validation_errors(); ?>
                                </p>
                                <div class="form-group">
                                    <input hidden type="number" name="id" class="form-control" value="<?php echo $data['id']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>支出ジャンル名</label>
                                    <input type="text" name="genre" class="form-control" value="<?php echo $data['genre']; ?>">
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