    
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
                                    <h3> Jumlah Barang : <a href="<?= base_url('admin/detail_keranjang') ?>"><?= $this->cart->total_items() ?></a> </h3>
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
                                                    <th>Harga Barang</th>
                                                  
                                                    <th class="disabled-sorting text-right">Aksi</th>
                                                </tr>
                                            </thead>
                                             
                                            <tbody>
                                              <?php $no = 1; ?>
                                              <?php foreach ($barang as $d): ?>
                                                
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $d['nama_barang'] ?></td>
                                                    <td><?= $d['kode_barang'] ?></td>
                                                    <td>Rp. <?= $d['harga'] ?></td>
                                                   
                                                    <td class="text-right">
                                                      <a href="<?= base_url('admin/keranjang_barang/') ?><?= $d['id_barang'] ?>" class="btn btn-primary ">Pesan Barang</a>

                                                      
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
