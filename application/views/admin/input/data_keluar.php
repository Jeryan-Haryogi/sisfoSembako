

       
            <div class="content">
            	   <div class="container">
                    	<div class="row">
                    		<div class="col-sm-12">
                    			<?php if ($this->session->flashdata()): ?>
						     <h3 class="text-success"><b> <?= $this->session->flashdata('flash') ?></b></h3>
            	   	<?php endif ?>
                    			<form action="" method="POST">
                    				<input type="hidden" class="form-control" name="<?=$csrf['name'];?>" value="<?=$csrf['hash']?>">
							 	<div class="row">
							 		<div class="col-sm-4">
							 			 <div class="form-group">
							    <label >Nama Barang</label>
							    <select class="form-control" name="id_barang">
							    	<?php foreach ($data as $key => $d): ?>
							    		
							      <option value="<?= $d['id_barang'] ?>"><?= $d['nama_barang'] ?></option>
							    	<?php endforeach ?>
							    </select>
							 		</div>
							 	</div>
							 		<div class="col-sm-4">
							 			 <div class="form-group">
							    <label for="">Stok Barang Keluar</label>
							    <input type="text" class="form-control"  placeholder="Masukan Stok Brang" name="stok_barang">
							    <?php if (validation_errors()): ?>
							    	<small class="text-danger"><?= form_error('stok_barang') ?></small>
							    <?php endif ?>
							  </div>
							 		</div>
							 		<div class="col-sm-4">
							 			 <div class="form-group">
							    <label >Harga Barang Keluar</label>
							    <input type="text" class="form-control" placeholder="Masukan Harga Barang"   name="harga">
							     <?php if (validation_errors()): ?>
							    	<small class="text-danger"><?= form_error('harga') ?></small>
							    <?php endif ?>
							  </div>
							  
							  
							 	</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block" name="krm_data">Kirim</button>
							</form>
                    		</div>
                    	</div>
                    </div>
                </div>
               
                    </div>
                 