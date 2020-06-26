
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
                      <div class="col-sm-4">
                        <form action="" method="POST">
                         <input type="hidden" class="form-control" name="<?=$csrf['name'];?>" value="<?=$csrf['hash']?>">
            <div class="form-group">
              <label>Nama Barang</label>
               <select class="form-control" name="nama_barang" >
                <?php foreach ($barang_masuk as $key => $v): ?>
                <option value="<?= $v['id_barang'] ?>"><?= $v['nama_barang'] ?></option>
                <?php endforeach ?>
              </select>
              <?php if (validation_errors()): ?>
                <small class="text-danger"><?= form_error('nama_barang') ?></small>
              <?php endif ?>
            </div>
                      </div>
                      <div class="col-sm-4">
            <div class="form-group">

              <label>Stok Barang</label>
              <input type="text" class="form-control" placeholder="Masukan Stok Barang" name="stok">
              <?php if (validation_errors()): ?>
                <small class="text-danger"><?= form_error('stok') ?></small>
              <?php endif ?>
            </div>
                      </div>
                       <div class="col-sm-4">
            <div class="form-group">

              <label>Masukan Harga Masuk</label>
              <input type="text" class="form-control" placeholder="Masukan Harga Masuk" name="harga">
              <?php if (validation_errors()): ?>
                <small class="text-danger"><?= form_error('harga') ?></small>
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
       
