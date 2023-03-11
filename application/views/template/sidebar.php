<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url() ?>assets/dist/img/user4-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Sistem Absensi</p>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php if ($this->ion_auth->is_admin()) : ?>
        <ul class="sidebar-menu">
            <li>
                <a href="<?php echo base_url('dashboard') ?>">
                    <i class="fa fa-laptop"></i> <span>DASHBOARD</span>
                    <small class="label pull-right bg-red"><i class="fa fa-laptop"></i></small>
                </a>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-folder"></i> <span>MASTER DATA </span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu" style="display: block;">
                    <li><a href="<?php echo base_url('kegiatan') ?>"><i class="fa fa-file-text"></i> <span>DATA KEGIATAN</span></a></li>
                    <li><a href="<?php echo base_url('panitia') ?>"><i class="fa fa-chalkboard-teacher"></i> <span>DATA PANITIA</span></a></li>
                    <li><a href="<?php echo base_url('penguji') ?>"><i class="fa fa-blind"></i> <span>DATA PENGUJI</span></a></li>
                    <li><a href="<?php echo base_url('siswa') ?>"><i class="fa fa-users"></i> <span>DATA SISWA</span></a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo base_url('scan') ?>">
                    <i class="fa fa-camera"></i> <span>SCAN QR</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('presensi') ?>">
                    <i class="fa fa-paperclip"></i> <span>REKAP ABSENSI</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('menu') ?>">
                    <i class="fa fa-paperclip"></i> <span>SETTING MENU</span>
                </a>
            </li>


            <?php /*
                $menu = $this->db->get_where('menu', array('is_parent' => 0, 'is_active' => 1));
                foreach ($menu->result() as $m) {
                    // chek ada sub menu
                    $submenu = $this->db->get_where('menu', array('is_parent' => $m->id, 'is_active' => 1));
                    if ($submenu->num_rows() > 0) {
                        // tampilkan submenu
                        echo "<li class='treeview'>
                                    " . anchor('#',  "<i class='$m->icon'></i> <span>" . strtoupper($m->name) . ' </span><i class="fa fa-angle-left pull-right"></i>') . "
                                        <ul class='treeview-menu'>";
                        foreach ($submenu->result() as $s) {
                            echo "<li>" . anchor($s->link, "<i class='$s->icon'></i> <span>" . strtoupper($s->name)) . "</span></li>";
                        }
                        echo "</ul>
                                    </li>";
                    } else {
                        echo "<li>" . anchor($m->link, "<i class='$m->icon'></i> <span>" . strtoupper($m->name)) . "</span></li>";
                    }
                }
            */    ?>
        </ul>
        <?php else: ?>
        <ul class="sidebar-menu">
            <li class="active">
                <a href="<?php echo base_url('dashboard') ?>">
                    <i class="fa fa-laptop"></i> <span>DASHBOARD</span>
                    <small class="label pull-right bg-red"><i class="fa fa-laptop"></i></small>
                </a>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-folder"></i> <span>MASTER DATA </span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu" style="display: block;">
                <li><a href="<?php echo base_url('kegiatan') ?>"><i class="fa fa-file-text"></i> <span>DATA KEGIATAN</span></a></li>
                    <li><a href="<?php echo base_url('siswa') ?>"><i class="fa fa-users"></i> <span>DATA SISWA</span></a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo base_url('scan') ?>">
                    <i class="fa fa-camera"></i> <span>SCAN QR</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('presensi') ?>">
                    <i class="fa fa-paperclip"></i> <span>REKAP ABENSI</span>
                </a>
            </li>
        </ul>
        <?php endif; ?>
    </section>
</aside>