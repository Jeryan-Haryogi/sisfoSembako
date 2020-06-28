  <?php if ($this->session->flashdata()): ?>
         <script type="text/javascript">
          setTimeout(function()
          {
               Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: '<?= $this->session->flashdata('flash') ?>',
      showConfirmButton: false,
      timer: 1500
    });
             }, 500);
         </script>
       <?php endif ?>
        <div class="loader"></div>
  
 <div class="main-content">
        <section class="section">
          <div class="row ">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">

                      <h3><?= $title ?></h3>
                    <div class="row ">
                      <div class="col-sm-6">
                        <?php foreach ($pesanan as $key => $k): ?>
                          
                        <form action="" method="POST">
                         <input type="hidden" class="form-control" name="<?=$csrf['name'];?>" value="<?=$csrf['hash']?>">
            <div class="form-group">
              <label>Nama Penerima</label>
                <input type="text" class="form-control" value="<?= $k['nama_penerima'] ?>" name="nama_penerima">
              <?php if (validation_errors()): ?>
                <small class="text-danger"><?= form_error('nama_penerima') ?></small>
              <?php endif ?>
            </div>
                      </div>
                      <div class="col-sm-6">
            <div class="form-group">

              <label>Kode Transaksi</label>
              <input type="text" class="form-control" value="<?= $k['kode_transaksi'] ?>" name="kode">
              <?php if (validation_errors()): ?>
                <small class="text-danger"><?= form_error('kode') ?></small>
              <?php endif ?>
            </div>
                      </div>
                       <div class="col-sm-6">
            <div class="form-group">

              <label>Stok Dibeli</label>
              <input type="text" class="form-control" value="<?= $k['stok_terjual'] ?>" name="stok_terjual">
              <?php if (validation_errors()): ?>
                <small class="text-danger"><?= form_error('stok_terjual') ?></small>
              <?php endif ?>
            </div>
                      </div>
                      <div class="col-sm-6">
            <div class="form-group">

              <label> Harga Beli</label>
              <input type="text" class="form-control" value="<?= $k['harga_terjual'] ?>" name="harga">
              <?php if (validation_errors()): ?>
                <small class="text-danger"><?= form_error('harga') ?></small>
              <?php endif ?>
            </div>
                      </div>
                      <button type="submit" class="btn btn-primary btn-lg btn-block" style="border-radius: 20px; width: 400px; margin-left: 20px;" type="submit" name="kirim">Kirim</button>
                    </form>

                        <?php endforeach ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
           
          </div>
            
         
        
        </section>
       
