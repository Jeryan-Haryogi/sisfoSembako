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
                  <a href="<?= base_url('kasir/hapus_keranjang') ?>" class="btn btn-danger">Hapus Keranjang</a>
                  <a href="<?= base_url('kasir/pembayaran') ?>" class="btn btn-info">Pembayaran</a>
                  <a href="<?= base_url('kasir/input_barangkeluar') ?>" class="btn btn-success">Lanjut Belanja</a>
                </div>

                  <br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kode Barang</th>
                    <th>Stok</th>
                    <th>Harga Barang</th>
                    <th>Subtotal</th>
                  </tr>
                  </thead>
                  <tfoot>
                     <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>Total :Rp. <?= $this->cart->format_number($this->cart->total(), 0,',','.') ?></th>
                    </tfoot>
                  <tbody>
                    <?php $no = 1; foreach ($this->cart->contents() as $key => $vaa): ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $vaa['name'] ?></td>
                    <td><?= $vaa['kode'] ?></td>
                    <td><?= $vaa['qty'] ?></td>
                    <td>
                      <?php $harga = $vaa['price'] ?>
                       Rp. <?= $this->cart->format_number($harga,0,',','.') ?>
                      </td>
                    <td>
                      <?php $total =  $vaa['subtotal'] ?>
                        Rp. <?= $this->cart->format_number($total,0,',','.') ?>
                      </td>
                  </tr>
                  <?php $no++ ?>

                    <?php endforeach ?>
                </tbody>
                </table>
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
