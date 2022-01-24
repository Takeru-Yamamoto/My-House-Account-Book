  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php base_url(); ?>" class="brand-link">
      <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">MY 家計簿</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a class="nav-link active">
              <i class="nav-icon fas fa-house-user"></i>
              <p>
                家計管理
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link active">
                  <i class="nav-icon fas fa-hand-holding-usd"></i>
                  <p>
                    支出編集
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="hb_s/index" class="nav-link active">
                      <i class="fas fa-angle-double-right"></i>
                      <p>支出一覧</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="hb_s/create_preparation" class="nav-link active">
                      <i class="fas fa-angle-double-right"></i>
                      <p>支出追加</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link active">
                  <i class="nav-icon fas fa-running"></i>
                  <p>
                    ランニングコスト編集
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="hb_r/index" class="nav-link active">
                      <i class="fas fa-angle-double-right"></i>
                      <p>ランニングコスト一覧</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="hb_r/create_preparation" class="nav-link active">
                      <i class="fas fa-angle-double-right"></i>
                      <p>ランニングコスト追加</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link active">
                  <i class="nav-icon fas fa-coins"></i>
                  <p>
                    収入編集
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="hb_i/index" class="nav-link active">
                      <i class="fas fa-angle-double-right"></i>
                      <p>収入一覧</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="hb_i/create_preparation" class="nav-link active">
                      <i class="fas fa-angle-double-right"></i>
                      <p>収入追加</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link active">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    支出ジャンル編集
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="hb_g/index" class="nav-link active">
                      <i class="fas fa-angle-double-right"></i>
                      <p>支出ジャンル一覧</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="hb_g/create_preparation" class="nav-link active">
                      <i class="fas fa-angle-double-right"></i>
                      <p>支出ジャンル追加</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link active">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    収入ジャンル編集
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="hb_g_i/index" class="nav-link active">
                      <i class="fas fa-angle-double-right"></i>
                      <p>収入ジャンル一覧</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="hb_g_i/create_preparation" class="nav-link active">
                      <i class="fas fa-angle-double-right"></i>
                      <p>収入ジャンル追加</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>