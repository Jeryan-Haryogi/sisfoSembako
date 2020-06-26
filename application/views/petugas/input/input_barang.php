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
                        <form action="" method="POST">
                         <input type="hidden" class="form-control" name="<?=$csrf['name'];?>" value="<?=$csrf['hash']?>">
            <div class="form-group">
              <label>Masukan Nama Barang</label>
             <input type="text" class="form-control" placeholder="Masukan Nama Barang" name="nama_barang">
              <?php if (validation_errors()): ?>
                <small class="text-danger"><?= form_error('nama_barang') ?></small>
              <?php endif ?>
            </div>
                      </div>
                      <div class="col-sm-6">
            <div class="form-group">

              <label>Masukan Kode Brang</label>
              <input type="text" class="form-control" value="<?= $kode ?>" name="kode_barang">
              <?php if (validation_errors()): ?>
                <small class="text-danger"><?= form_error('kode_barang') ?></small>
              <?php endif ?>
            </div>
                      </div>
                      <button type="submit" class="btn btn-primary btn-lg btn-block" style="border-radius: 20px; width: 400px; margin-left: 20px;" type="submit" name="kirim">Kirim</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
           
          </div>
            
         
        
        </section>
       
