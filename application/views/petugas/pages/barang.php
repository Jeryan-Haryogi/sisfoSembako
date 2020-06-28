

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
                                                   <th>Jumlah Harga Masuk : Rp. <?= number_format($count2[0]['SUM(harga)'],0,',','.') ?> </th>
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
                            <td>Rp. <?= number_format($d['harga'],0,',','.') ?></td>
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
                    <h4>Data Keluar</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Penerima</th>
                            <th>Kode Transaksi</th>
                            <th>Stok Beli </th>
                            <th>Total Harga Beli </th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <th></th>
                          <th></th>
                          <th></th>
                          
                        </tfoot>
                        <tbody>
                          <?php $no2 = 1; ?>
                          <?php foreach ($keluar as $key => $v): ?>
                           <tr>
                            <td>
                              <?= $no2 ?>
                            </td>
                            <td><?= $v['nama_barang']?></td>
                            <td><?= $v['kode_barang']?></td>
                            <td><?= $v['stok_terjual']?></td>
                            <td>Rp. <?= $v['harga_terjual']?></td>
                            <td>
                              <a href="<?= base_url('petugas/update_barang_keluar/') ?><?= $v['id_barang_keluar'] ?>" class="btn btn-info">Update</a>
                              <a href="<?= base_url('petugas/hapus_barang_keluar/') ?><?= $v['id_barang_keluar'] ?>" class="btn btn-danger">Hapus</a>
                            </td>
                          </tr>
                          <?php $no2++ ?>
                          <?php endforeach ?>
                        </tbody>
                      </table>
                    </div>
                  </div>


                </div>
              </div>
            </div>

        </section>
   
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