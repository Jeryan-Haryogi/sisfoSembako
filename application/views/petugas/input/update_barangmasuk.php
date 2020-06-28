
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
                        <?php foreach ($barang_masuk as $key => $value): ?>
                          
                         <form action="" method="POST">
                         <input type="hidden" class="form-control" name="<?=$csrf['name'];?>" value="<?=$csrf['hash']?>">
            <div class="form-group">

              <label>Stok Barang</label>
              <input type="text" class="form-control" value="<?= $value['stok'] ?>" name="stok">
              <?php if (validation_errors()): ?>
                <small class="text-danger"><?= form_error('stok') ?></small>
              <?php endif ?>
            </div>
                      </div>
                       <div class="col-sm-6">
            <div class="form-group">

              <label>Masukan Harga Masuk</label>
              <input type="text" class="form-control" value="<?= $value['harga'] ?>" name="harga">
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
       
