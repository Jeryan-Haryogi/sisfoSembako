    
            <div class="content">
                <div class="container-fluid">
                 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                               <?php if ($this->session->flashdata()): ?>
                 <h3 class="text-success text-center"><b> <?= $this->session->flashdata('flash') ?></b></h3>
                  <?php endif ?>
                                <div class="card-content">
                                    <a href="<?= base_url('admin/cetak_admin') ?>" class="btn btn-danger">CETAK</a>
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
                                                    <th class="disabled-sorting text-right">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php $no = 1; ?>
                                              <?php foreach ($database as $d): ?>
                                                
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $d['nama_lengkap'] ?></td>
                                                    <td><?= $d['username'] ?></td>
                                                    <td><?= $d['level'] ?></td>
                                                    <td class="text-right">
                                                      <a href="<?= base_url('admin/update_admin/') ?><?= $d['id'] ?>" class="btn btn-simple btn-warning btn-icon " data-toggle="tooltip" title='Update Data'><i class="material-icons">dvr</i></a>

                                                        <a href="<?= base_url('admin/hapus_admin/') ?><?= $d['id'] ?>" class="btn btn-simple btn-danger btn-icon " data-toggle="tooltip" title='Hapus Data' data-toggle="modal" data-target="#delete"><i class="material-icons">close</i></a>
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
                        <!-- end col-md-12 -->
                    </div>
                </div>
            </div>
          
        </div>
    </div>
