

       
            <div class="content">
            	   <div class="container">
                    	<div class="row">
                    		<div class="col-sm-12">
                    			<form action="" method="POST">
                    				<input type="hidden" class="form-control" name="<?=$csrf['name'];?>" value="<?=$csrf['hash']?>">
							 	<div class="row">
							 		<div class="col-sm-6">
							 			 <div class="form-group">
							    <label for="">Nama Barang</label>
							    <input type="text" class="form-control"  placeholder="Masukan Nama Barang" name="nama_barang">
							    <?php if (validation_errors()): ?>
							    	<small class="text-danger"><?= form_error('nama_barang') ?></small>
							    <?php endif ?>
							  </div>
							 		</div>
							 		<div class="col-sm-6">
							 			 <div class="form-group">
							    <label >Kode Barang</label>
							    <input type="text" class="form-control" value="<?= $kode ?>"   name="kode_brang">
							     <?php if (validation_errors()): ?>
							    	<small class="text-danger"><?= form_error('kode_brang') ?></small>
							    <?php endif ?>
							  </div>
							 		</div>
							 	</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block" name="krm_data">Kirim</button>
							</form>
                    		</div>
                    	</div>
                    </div>
                </div>
               
                    </div>
                 