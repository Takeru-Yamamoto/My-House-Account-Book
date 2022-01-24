<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">エラー</h1>
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
                <div class="card bg-danger">
              <div class="card-header">
              <?php if($data["error"]=="db"){?>
                <h3 class="card-title">データベースエラー</h3>
                <?php }else{?>
                    <h3 class="card-title">エラー</h3>
                <?php }?>
              </div>
              <div class="card-body">
              <?php if($data["crud"]=="c"){?>
                入力したデータをデータベースに登録できませんでした。
                <?php }elseif($data["crud"]=="r"){?>
                    データベースの目的のデータを参照できませんでした。
                <?php }elseif($data["crud"]=="u"){?>
                    データベースの選択したデータを更新できませんでした。
                <?php }elseif($data["crud"]=="d"){?>
                    データベースの選択したデータを削除できませんでした。
                <?php }else{?>
                予期せぬエラーが発生しました。
                <?php }?>
                データベースの設定やソースコードを確認してください。
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->