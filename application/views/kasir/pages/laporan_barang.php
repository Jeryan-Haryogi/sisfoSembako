
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
                <h3 class="card-title"><?= $title ?></h3>
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

                <a href="<?= base_url('kasir/cetak') ?>" class="btn btn-danger ml-2">Cetak</a>
              </div>


              <!-- /.card-header -->
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                     <th>Nama Penerima</th>
                     <th>Kode Barang</th>
                      <th>Stok Beli</th>
                   <th>Harga Barang Beli</th>          
                  </tr>
                  </thead>
                  <tbody>
                  	<?php $no = 1; foreach ($brana as $key => $d): ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $d['nama_penerima'] ?></td>
                    <td><?= $d['kode_transaksi'] ?></td>
                    <td><?= $d['stok_terjual'] ?></td>
                    <td>Rp. <?= $d['harga_terjual'] ?></td>
                  </tr>
                  <?php $no++ ?>
                  	<?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Jumlah Stok Beli : <?= $count2[0]['SUM(stok_terjual)'] ?> </th>
                    <th>Total Harga Beli : Rp. <?= number_format($count3[0]['SUM(harga_terjual)'],0,',','.') ?> </th>
                    <th></th>
                  </tr>
                  </tfoot>
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
