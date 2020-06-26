    
            <div class="content">
                <div class="container-fluid">
                 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">

                                
                               <?php if ($this->session->flashdata()): ?>
                 <h3 class="text-success text-center"><b> <?= $this->session->flashdata('flash') ?></b></h3>
                  <?php endif ?>
                                <div class="card-content">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".example-modal-lg">Total</button>
                                    <div class="modal fade example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Jumlah Total</h4>
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
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
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
                                            <div class="modal-footer">
                                                
                                                <button type="button" class="btn btn-info" data-dismiss="modal">Close
                                            </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                                                  
                                                    <th class="disabled-sorting text-right">Aksi</th>
                                                </tr>
                                            </thead>
                                             <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th>Jumlah Barang Masuk : <?= $jmlhbrangmsk[0]['COUNT(id_barang)'] ?></th>
                                                    <th></th>
                                                    <th>Jumlah Stok: <?= $count[0]['SUM(stok)'] ?></th>
                                                    <th>Jumlah Harga Masuk : Rp. <?= $count2[0]['SUM(harga)'] ?> </th>
                                                    <th class="text-right">Actions</th>
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
                                                    <td>Rp. <?= $d['harga'] ?></td>
                                                   
                                                    <td class="text-right">
                                                      <a href="<?= base_url('admin/update_barang/') ?><?= $d['id_barang'] ?>" class="btn btn-simple btn-warning btn-icon " data-toggle="tooltip" title='Update Data'><i class="material-icons">dvr</i></a>

                                                        <a href="<?= base_url('admin/hapus_barang/') ?><?= $d['id_barang'] ?>" class="btn btn-simple btn-danger btn-icon " data-toggle="tooltip" title='Hapus Data' data-toggle="modal" data-target="#delete"><i class="material-icons">close</i></a>
                                                    </td>
                                                </tr>
                                                <?php $no++ ?>
                                              <?php endforeach ?>
                                            </tbody>
                                        </table>
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Penerima</th>
                                                    <th>Nama Barang</th>
                                                    <th>Kode Barang</th>
                                                    <th>Stok Keluar</th>
                                                    <th>Harga Barang Keluar</th>
                                                  
                                                    <th class="disabled-sorting text-right">Aksi</th>
                                                </tr>
                                            </thead>
                                             <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Jumlah Barang : <?= $jmlhbrang[0]['COUNT(id_barang)']  ?></th>
                                                    <th></th>
                                                    <th>Jumlah Stok Keluar : <?= $count_stok[0]['SUM(stok_terjual)'] ?></th>
                                                    <th>Jumlah Harga Keluar : Rp. <?= $count_harga[0]['SUM(harga_terjual)'] ?> </th>
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                              <?php $no = 1; ?>
                                              <?php foreach ($barang_keluar as $ad): ?>
                                                
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $ad['nama_penerima'] ?></td>
                                                    <td><?= $ad['nama_barang'] ?></td>
                                                    <td><?= $ad['kode_barang'] ?></td>
                                                    <td><?= $ad['stok_terjual'] ?></td>
                                                    <td>Rp. <?= $ad['harga_terjual'] ?></td>
                                                   
                                                    <td class="text-right">
                                                      <a href="<?= base_url('admin/update_barang_keluar/') ?><?= $ad['id_barang_keluar'] ?>" class="btn btn-simple btn-warning btn-icon " data-toggle="tooltip" title='Update Data'><i class="material-icons">dvr</i></a>

                                                        <a href="<?= base_url('admin/hapus_barang_keluar/') ?><?= $ad['id_barang_keluar'] ?>" class="btn btn-simple btn-danger btn-icon " data-toggle="tooltip" title='Hapus Data' data-toggle="modal" data-target="#delete"><i class="material-icons">close</i></a>
                                                    </td>
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
