
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
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
        
                 <?php if ($this->session->flashdata()): ?>
				   <script type="text/javascript">
				     setTimeout(function() {
				      Swal.fire({
				        position: 'top-end',
				        icon: 'success',
				        title: '<?= $this->session->flashdata('flash') ?>',
				        showConfirmButton: false,
				        timer: 1500
				      });
				     }, 300);
				   </script>
				    
  <?php endif ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                     <th>Nama Barang</th>
                     <th>Kode Barang</th>
                      <th>Stok Beli</th>
                   <th>Harga Beli </th>
                    <th>Aksi</th>                   
                  </tr>
                  </thead>
                  <tbody>
                  	<?php $no = 1; foreach ($pesanan as $key => $d): ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $d['nama_penerima'] ?></td>
                    <td><?= $d['kode_transaksi'] ?></td>
                    <td><?= $d['stok_terjual'] ?></td>
                    <td> Rp.<?= number_format($d['harga_terjual'],0,',','.') ?></td>
                    <td>
                    	<a href="<?= base_url('kasir/hapus_pesanan/') ?><?= $d['id'] ?>" class="btn btn-danger btn-lg">Hapus</a>
                      <a href="<?= base_url('kasir/update_pesanan/') ?><?= $d['id'] ?>" class="btn btn-info btn-lg">Update</a>
                    </td>
                  </tr>
                  <?php $no++ ?>
                  	<?php endforeach ?>
                  </tbody>
                  <tfoot>
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


<!-- ./wrapper -->

<!-- jQuery -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="<?= base_url('assets/kasir/') ?>plugins/jquery/jquery.min.js"></script>
  <!-- DataTables -->
  <script src="<?= base_url('assets/kasir/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/kasir/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets/kasir/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url('assets/kasir/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
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
