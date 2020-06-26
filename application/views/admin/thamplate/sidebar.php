    <div class="wrapper">
        <div class="sidebar">
            <div class="logo">
                <a href="#" class="simple-text">
                    <b>SEMBAKO / ADMIN</b>
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="#" class="simple-text">
                    S
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active">
                        <a href="<?= base_url('admin') ?>">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#layouts" class="collapsed" aria-expanded="false">
                            <i class="material-icons">aspect_ratio</i>
                            <p>Input
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="layouts" aria-expanded="false" style="height: 0px;">
                            <ul class="nav">
                                <li>
                                    <a href="<?= base_url('admin/input_admin') ?>">Input Admin</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/input_kasir') ?>">Input Kasir</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/input_petugas') ?>">Input Petugas</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/input_barang') ?>">Input barang </a>
                                </li>

                                <li>
                                    <a href="<?= base_url('admin/barang_masuk') ?>">Input barang Masuk</a>
                                </li>

                                <li>
                                    <a href="<?= base_url('admin/barang_keluar') ?>">Input barang Keluar</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#tables" class="collapsed" aria-expanded="false">
                            <i class="material-icons">grid_on</i>
                            <p>Database
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="tables" aria-expanded="false" style="height: 0px;">
                            <ul class="nav">
                                <li><a href="<?= base_url('admin/data_admin') ?>">Data Admin</a></li>
                                <li><a href="<?= base_url('admin/data_petugas') ?>">Data Petugas</a></li>

                                <li><a href="<?= base_url('admin/data_kasir') ?>">Data Kasir</a></li>

                                <li><a href="<?= base_url('admin/data_barang') ?>">Data Barang</a></li>
                            </ul>
                        </div>
                    </li>
                     <li>
                        <a data-toggle="collapse" href="#pages" class="collapsed" aria-expanded="false">
                            <i class="material-icons">content_copy</i>
                            <p>Laporan 
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="pages" aria-expanded="false" style="height: 0px;">
                            <ul class="nav">
                                <li><a href="<?= base_url('admin/laporan_admin') ?>">Laporan admin</a>
                                </li>
                                <li><a href="<?= base_url('admin/laporan_petugas') ?>">Laporan Petugas</a>
                                </li>
                                <li><a href="<?= base_url('admin/laporan_kasir') ?>">Laporan Kasir</a>
                                </li>
                                <li><a href="<?= base_url('admin/laporan_barang') ?>">Laporan barang</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                   
                </ul>

            </div>
        </div>