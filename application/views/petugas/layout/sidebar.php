      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="<?= base_url('assets/petugas') ?>/img/logo.png" class="header-logo" /> <span
                class="logo-name">Otika</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="<?=base_url('petugas') ?>" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            
            
            
            <li class="menu-header">Maps</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="layout"></i><span>Input </span></a>
              <ul class="dropdown-menu">
                <li><a href="<?= 
                base_url('petugas/input_barang') ?>">Input Barang</a></li>
                <li><a href="<?= base_url('petugas/input_barangmasuk') ?>">Input Barang Masuk</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="grid"></i><span>Data</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?= base_url('petugas/barang') ?>">Data Barang</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="file"></i><span>Laporan</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?= base_url('petugas/laporan_barang') ?>">Laporan Barang</a></li>
              </ul>
            </li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>