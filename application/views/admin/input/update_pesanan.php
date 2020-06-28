


       
            <div class="content">
            	
            	   <div class="container">
            	   
                    	<div class="row">
                    		<div class="col-sm-12">
                    				<?php if ($this->session->flashdata()): ?>
						     <h3 class="text-success"><b> <?= $this->session->flashdata('flash') ?></b></h3>
            	   	<?php endif ?>
            	   	<?php foreach ($detil as $key => $as): ?>
            	   		
                    			<form action="" method="POST">
                    				<input type="hidden" class="form-control" name="<?=$csrf['name'];?>" value="<?=$csrf['hash']?>">
							 	<div class="row">
							 		<div class="col-sm-6">
							 			 <div class="form-group">
							    <label for="">Nama Penerima</label>
							    <input type="text" class="form-control" value="<?= $as['nama_penerima']  ?>" name="nama_penerima">
							    <?php if (validation_errors()): ?>
							    	<small class="text-danger"><?= form_error('nama_penerima') ?></small>
							    <?php endif ?>
							  </div>
							 		</div>
							 		<div class="col-sm-6">
							 			 <div class="form-group">
							    <label >Kode Transaksi</label>
							    <input type="text" class="form-control" value="<?= $as['kode_transaksi'] ?>"  name="kode">
							     <?php if (validation_errors()): ?>
							    	<small class="text-danger"><?= form_error('kode') ?></small>
							    <?php endif ?>
							  </div>
							</div>
							<div class="col-sm-6">
							 			 <div class="form-group">
							    <label >Stok Beli</label>
							    <input type="text" class="form-control" value="<?= $as['stok_terjual'] ?>"  name="stok">
							     <?php if (validation_errors()): ?>
							    	<small class="text-danger"><?= form_error('stok') ?></small>
							    <?php endif ?>
							  </div>
							</div>
							<div class="col-sm-6">
							 			 <div class="form-group">
							    <label >Harga Beli</label>
							    <input type="text" class="form-control" value="<?= $as['harga_terjual'] ?>"  name="harga">
							     <?php if (validation_errors()): ?>
							    	<small class="text-danger"><?= form_error('harga') ?></small>
							    <?php endif ?>
							  </div>
							</div>
							  
							  
							 	</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block" name="krm_data" style="border-radius: 20px;">Kirim</button>
							</form>

            	   	<?php endforeach ?>

                    		</div>
                    	</div>
                    </div>
                </div>
               
                    </div>
                