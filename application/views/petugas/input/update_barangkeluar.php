
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
                         <?php foreach ($barang_keluar as $key => $d): ?>
                          
                        <form action="" method="POST">
                         <input type="hidden" class="form-control" name="<?=$csrf['name'];?>" value="<?=$csrf['hash']?>">

            <div class="form-group">

              <label>Stok Barang Keluar</label>
              <input type="text" class="form-control" value="<?= $d['stok_terjual'] ?>" name="stok_keluar">
              <?php if (validation_errors()): ?>
                <small class="text-danger"><?= form_error('stok_keluar') ?></small>
              <?php endif ?>
            </div>
                      </div>
                       <div class="col-sm-6">
            <div class="form-group">

              <label>Masukan Harga Keluar</label>
              <input type="text" class="form-control" value="<?= $d['harga_terjual'] ?>" name="harga_keluar">
              <?php if (validation_errors()): ?>
                <small class="text-danger"><?= form_error('harga_keluar') ?></small>
              <?php endif ?>
            </div>
                      </div>
                    </div>
                     <button type="submit" class="btn btn-primary btn-lg btn-block" style="border-radius: 20px; width: 600px; margin-left: 20px;" type="submit" name="kirim">Kirim</button>
                    </form>

                        <?php endforeach ?>
                  </div>
                </div>
              </div>
            </div>
           
           
          </div>
            
         
        
        </section>
       
