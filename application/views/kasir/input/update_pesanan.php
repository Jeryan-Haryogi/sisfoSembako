  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          

            <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="text-right">
                  <?php foreach ($barang as $key => $bo): ?>
                    
                          <form action="" method="POST">
                  <button class="btn btn-success" style="font-size: 25px;"> Rp. <?= number_format($bo['harga_terjual'],0,',','.') ?></button>
                  </div>
                                      <input type="hidden" name="<?= $csrf['name'] ?>" value='<?= $csrf['hash'] ?>'>
                                      
                  <div class="row">
                                    <div class="col-sm-6">
                                       <div class="form-group">
                      <label for="exampleInputEmail1">Nama Penerima</label>
                      <input type="text" class="form-control" name="nama_penerima" value="<?= $bo['nama_penerima'] ?>">
                      <?php if (validation_errors()): ?>
                    <small class="text-danger"><?= form_error('nama_penerima') ?></small>
                  <?php endif ?>
                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                       <div class="form-group">
                      <label for="exampleInputEmail1">Harga Beli</label>
                      <input type="text" name="harga" class="form-control" value="<?= $bo['harga_terjual']?>">
                      <?php if (validation_errors()): ?>
                    <small class="text-danger"><?= form_error('harga') ?></small>
                  <?php endif ?>
                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                       <div class="form-group">
                      <label for="exampleInputEmail1">Kode Transaksi</label>
                      <input type="text" name="kode" class="form-control" value="<?= $bo['kode_transaksi'] ?>">
                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                       <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Barang</label>
                      <input type="text" name="jmlbarang" class="form-control" value="<?= $bo['stok_terjual'] ?>">
                    </div>
                                    </div>
                                  </div>
                                  <button class="btn btn-primary" type="submit" name="bayar">Bayar</button>
                                    </form>

                  <?php endforeach ?>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/kasir/') ?>plugins/jquery/jquery.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/kasir/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/kasir/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/kasir/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/kasir/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
