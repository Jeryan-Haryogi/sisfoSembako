  <?php  ?>

  <!-- Content Wrapper. Contains page content -->
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
         
          <!-- ./col -->
          <div class="col-lg-12 ">
            <!-- small box -->
            <div class="card">
          <div class="card-body">
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
            <div class="row">
      <div class="col-sm-6">
        <?php foreach ($update as $key => $asu): ?>
          
                 <form action="" method="POST">
                  <input type="hidden" name="<?= $csrf['name'] ?>" value='<?= $csrf['hash'] ?>'>
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Barang</label>
     <select class="form-control" id="exampleFormControlSelect1" name="nama_barang">
      <?php foreach ($barang as $key => $d): ?>
      <option value="<?= $d['id_barang'] ?>"><?= $d['nama_barang'] ?></option>
      <?php endforeach ?>
    </select>
  </div>
      </div>
       <div class="col-sm-6">
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Penerima</label>
    <input type="text" class="form-control"  value="<?= $asu['nama_penerima'] ?>" name="nama_penerima">
     <?php if (validation_errors()): ?>
                    <small class="text-danger"><?= form_error('nama_penerima') ?></small>
                  <?php endif ?>
  </div>
      </div>
       <div class="col-sm-6">
  <div class="form-group">
    <label for="exampleInputEmail1">Stok Terjual</label>
    <input type="text" class="form-control" value="<?= $asu['stok_terjual'] ?>" name="stok_terjual">
     <?php if (validation_errors()): ?>
                    <small class="text-danger"><?= form_error('stok_terjual') ?></small>
                  <?php endif ?>
  </div>
      </div>
       <div class="col-sm-6">
  <div class="form-group">
    <label for="exampleInputEmail1">Harga Terjual</label>
    <input type="text" class="form-control" value="<?= $asu['harga_terjual'] ?>" name="harga_terjual">
     <?php if (validation_errors()): ?>
                    <small class="text-danger"><?= form_error('harga_terjual') ?></small>
                  <?php endif ?>
  </div>
      </div>
            </div>
            </div>
            <button class="btn btn-primary" type="submit" name="kirim">Kirim</button>
          </form>

        <?php endforeach ?>
          </div>
        </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.content-wrapper -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
