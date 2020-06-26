    
            <div class="content">
                <div class="container-fluid">
                 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                               <?php if ($this->session->flashdata()): ?>
                 <h3 class="text-success text-center"><b> <?= $this->session->flashdata('flash') ?></b></h3>
                  <?php endif ?>
                                <div class="card-content">
                                     <a href="<?= base_url('admin/cetak_kasir') ?>" class="btn btn-danger">CETAK</a>
                                    <h4 class="card-title"><?= $title ?></h4>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Username</th>
                                                    <th>Level</th>
                                                    <th>Kode Kasir</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php $no = 1; ?>
                                              <?php foreach ($kasir as $d): ?>
                                                
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $d['nama_lengkap'] ?></td>
                                                    <td><?= $d['username'] ?></td>
                                                    <td><?= $d['level'] ?></td>
                                                    <td><?= $d['kd_kasir'] ?></td>
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
                        <!-- end col-md-12 -->
                    </div>
                </div>
            </div>
          
        </div>
    </div>
