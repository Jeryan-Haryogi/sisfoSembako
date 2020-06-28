    
            <div class="content">
                <div class="container-fluid">
                 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">

                                
                               <?php if ($this->session->flashdata()): ?>
                 <h3 class="text-success text-center"><b> <?= $this->session->flashdata('flash') ?></b></h3>
                  <?php endif ?>
                                <div class="card-content">
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
                                          <div class="material-datatables">
                                         <div class="text-right">
                                        <a href="<?= base_url('admin/hapus_keranjang') ?>" class="btn btn-danger">Hapus Keranjang</a>
                                        <a href="<?= base_url('admin/pembayaran') ?>" class="btn btn-primary">pembayaran</a>
                                         <a href="<?= base_url('admin/barang_keluar') ?>" class="btn btn-success">Lanjutkan Belanja</a>
                                        </div>
                                </div>
                                    </div>

                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Kode Barang</th>
                                                    <th>Jumlah Barang</th>
                                                    <th>Harga Barang</th>
                                                    <th>Sub Total</th>
                                                  
                                                   
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>Rp. <?=$this->cart->format_number($this->cart->total()); ?></th>
                                            </tfoot>
                                             
                                            <tbody>
                                              <?php $no = 1; ?>
                                              <?php foreach ($this->cart->contents() as $d): ?>
                                                
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $d['name'] ?></td>
                                                    <td><?= $d['kode'] ?></td>
                                                    <td><?= $d['qty'] ?></td>
                                                    <td>Rp. <?= $this->cart->format_number($d['price'],0,',','.'); ?></td>
                                                     <td>Rp. <?= $this->cart->format_number($d['subtotal'],0,',','.'); ?></td>
                                                </tr>
                                                <?php $no++ ?>
                                              <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                   
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>
                         
                         </div>

            </div>
          
        </div>
    </div>
