

      <!-- Main Content -->
        <?php if ($this->session->flashdata()): ?>
         <script type="text/javascript">
          setTimeout(function()
          {
               Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: '<?= $this->session->flashdata('flash') ?>',
      showConfirmButton: false,
      timer: 1500
    });
             }, 500);
         </script>
       <?php endif ?>
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4><?= $title ?></h4>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                      data-target=".bd-example-modal-lg">Total </button>
                  </div>

                  <div class="card-body">

                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              No
                            </th>
                            <th>Nama Barang</th>
                            <th>Kode Barang</th>
                            <th>Stok Barang Masuk </th>
                            <th>Harga Barang Masuk</th>
                            <th>Aksi</th>
                         
                          </tr>
                        </thead>
                        <tfoot>
                           <tr>
                                                   <th></th>
                                                   <th>Jumlah Barang : <?= $jmlhbrangmsk[0]['COUNT(id_barang)'] ?></th>
                                                   <th></th>
                                                    <th>Jumlah  Stok: <?= $count[0]['SUM(stok)'] ?>
                                                    </th>
                                                    <?php $asi = $count2[0]['SUM(harga)'] - $count_harga[0]['SUM(harga_terjual)'];
                                                     ?>
                                                   <th>Jumlah Harga Masuk : Rp. <?= $count2[0]['SUM(harga)'] ?> </th>
                                                </tr>
                        </tfoot>
                        <tbody>
                          <?php  $no = 1; ?>
                          <?php foreach ($barang as $key => $d): ?>
                            
                          <tr>
                            <td>
                              <?= $no ?>
                            </td>
                            <td><?= $d['nama_barang']?></td>
                            <td><?= $d['kode_barang']?></td>
                            <td><?= $d['stok']?></td>
                            <td>Rp. <?= $d['harga']?></td>
                            <td>
                              <a href="<?= base_url('petugas/update_barang/') ?><?= $d['id_brng_masuk'] ?>" class="btn btn-info">Update</a>
                              <a href="<?= base_url('petugas/hapus_barang/') ?><?= $d['id_brng_masuk'] ?>" class="btn btn-danger">Hapus</a>
                            </td>
                          </tr>
                          <?php $no++ ?>
                          <?php endforeach ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Multi Select</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Penerima</th>
                            <th>Nama Barang</th>
                            <th>Kode Barang</th>
                            <th>Stok Barang Keluar </th>
                            <th>Harga Barang Keluar</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <th></th>
                          <th></th>
                          <th>Jumlah Barang : <?= $jmlhbrangkeluar[0]['COUNT(id_barang)'] ?></th>

                          <th></th>
                          <td><b>Jumlah   Stok Keluar: <?= $count_stok[0]['SUM(stok_terjual)'] ?></b></td>
                          <td><b>Jumlah Harga Keluar : Rp. <?= $count_harga[0]['SUM(harga_terjual)'] ?></b></td>
                        </tfoot>
                        <tbody>
                          <?php $no1 = 1; ?>
                          <?php foreach ($barang2 as $key => $v): ?>
                           <tr>
                            <td>
                              <?= $no1 ?>
                            </td>
                            <td><?= $v['nama_penerima']?></td>
                            <td><?= $v['nama_barang']?></td>
                            <td><?= $v['kode_barang']?></td>
                            <td><?= $v['stok_terjual']?></td>
                            <td>Rp. <?= $v['harga_terjual']?></td>
                            <td>
                              <a href="<?= base_url('petugas/update_barang_keluar/') ?><?= $v['id_barang_keluar'] ?>" class="btn btn-info">Update</a>
                              <a href="<?= base_url('petugas/hapus_barang_keluar/') ?><?= $v['id_barang_keluar'] ?>" class="btn btn-danger">Hapus</a>
                            </td>
                          </tr>
                          <?php $no1++ ?>
                          <?php endforeach ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      
       <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Total</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                 <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Stok </th>
                                                    <th>Stok Keluar</th>
                                                    <th>Harga</th>
                                                    <th>Harga Barang Keluar</th>
                                                  
                                                  
                                                </tr>
                                            </thead>
                                             <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <?php 
                                                        $jma = $count[0]['SUM(stok)'] -  $count_stok[0]['SUM(stok_terjual)'];
                                                         ?>
                                                    <th>Jumlah Sisa Stok: <?= $jma ?>
                                                    </th>
                                                    <?php $asi = $count2[0]['SUM(harga)'] - $count_harga[0]['SUM(harga_terjual)'];
                                                     ?>
                                                    <th>Jumlah Siswa Harga : Rp. <?= $asi ?> </th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                              <?php $no = 1; ?>
                                  
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $count[0]['SUM(stok)'] ?></td>
                                                    <td><?= $count_stok[0]['SUM(stok_terjual)'] ?></td>
                                                    <td> Rp. <?= $count2[0]['SUM(harga)'] ?></td>
                                                    <td>Rp. <?= $count_harga[0]['SUM(harga_terjual)'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
              </div>
            </div>
          </div>
        </div>