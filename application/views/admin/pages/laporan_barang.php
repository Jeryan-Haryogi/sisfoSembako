    
            <div class="content">
                <div class="container-fluid">
                 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">

                                
                               <?php if ($this->session->flashdata()): ?>
                 <h3 class="text-success text-center"><b> <?= $this->session->flashdata('flash') ?></b></h3>
                  <?php endif ?>
                                <div class="card-content">
                            <a href="<?= base_url('admin/cetak_barang') ?>" class="btn btn-danger">CETAK</a>

                                    <h4 class="card-title"><?= $title ?></h4>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Kode Barang</th>
                                                    <th>Stok</th>
                                                    <th>Harga Barang Masuk</th>
                                                  
                                                </tr>
                                            </thead>
                                             <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th>Jumlah Barang : <?= $barang_masuk[0]['COUNT(id_barang)'] ?></th>
                                                    <th></th>
                                                    <th>Jumlah Stok: <?= $count[0]['SUM(stok)'] ?></th>
                                                    <th>Jumlah Harga Masuk : Rp. <?= $count2[0]['SUM(harga)'] ?> </th>
                                                   
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                              <?php $no = 1; ?>
                                              <?php foreach ($barang as $d): ?>
                                                
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $d['nama_barang'] ?></td>
                                                    <td><?= $d['kode_barang'] ?></td>
                                                    <td><?= $d['stok'] ?></td>
                                                    <td>Rp. <?= $d['harga'] ?></td>`
                                                </tr>
                                                <?php $no++ ?>
                                              <?php endforeach ?>
                                            </tbody>
                                        </table>
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Kode Barang</th>
                                                    <th>Stok Keluar</th>
                                                    <th>Harga Barang Keluar</th>
                                                  
                                                </tr>
                                            </thead>
                                             <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th>Jumlah Barang : <?= $jmlhbarang[0]['COUNT(id_barang)'] ?></th>
                                                    <th></th>
                                                    <th>Jumlah Stok Keluar : <?= $count_stok[0]['SUM(stok_terjual)'] ?></th>
                                                    <th>Jumlah Harga Keluar : Rp. <?= $count_harga[0]['SUM(harga_terjual)'] ?> </th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                              <?php $no = 1; ?>
                                              <?php foreach ($barang_keluar as $ad): ?>
                                                
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $ad['nama_barang'] ?></td>
                                                    <td><?= $ad['kode_barang'] ?></td>
                                                    <td><?= $ad['stok_terjual'] ?></td>
                                                    <td>Rp. <?= $ad['harga_terjual'] ?></td>
                                                    
                                                </tr>
                                                <?php $no++ ?>
                                              <?php endforeach ?>
                                            </tbody>
                                        </table>
                                          <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Stok Terjual</th>
                                                    <th>Harga Barang Keluar</th>
                                                    <th>Kode Transaksi</th>
                                                  
                                                </tr>
                                            </thead>
                                             <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Jumlah Stok Keluar : <?= $count_stok2[0]['SUM(stok_terjual)'] ?></th>
                                                    <th>Jumlah Harga Keluar : Rp. <?= $count_harga2[0]['SUM(harga_terjual)'] ?> </th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                              <?php $no = 1; ?>
                                              <?php $asu = $this->db->get('tbl_pesanan')->result_array() ?>
                                              <?php foreach ($asu as $sa): ?>
                                                
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $sa['nama_penerima'] ?></td>
                                                    <td><?= $sa['stok_terjual'] ?></td>
                                                    <td>Rp. <?= $sa['harga_terjual'] ?></td>

                                                    <td><?= $sa['kode_transaksi'] ?></td>
                                                    
                                                </tr>
                                                <?php $no++ ?>
                                              <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>
                         
                         </div>

            </div>
          
        </div>
    </div>
