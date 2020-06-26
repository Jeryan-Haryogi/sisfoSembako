


       
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
							 		<div class="col-sm-6">
							 			 <div class="form-group">
							    <label >Nama Barang</label>
							    <select class="form-control" name="id_barang">
							    	<?php foreach ($data as $key => $d): ?>
							    		
							      <option value="<?= $d['id_barang'] ?>"><?= $d['nama_barang'] ?></option>
							    	<?php endforeach ?>
							    </select>
							 		</div>
							 	</div>
							 	<div class="col-sm-6">
							 			 <div class="form-group">
							    <label for="">Nama Penerima</label>
							    <input type="text" class="form-control"  placeholder="Masukan Nama Penerima" name="nama_penerima">
							    <?php if (validation_errors()): ?>
							    	<small class="text-danger"><?= form_error('nama_penerima') ?></small>
							    <?php endif ?>
							  </div>
							 		</div>
							 		<div class="col-sm-6">
							 			 <div class="form-group">
							    <label for="">Stok Jual Barang</label>
							    <input type="text" class="form-control"  placeholder="Masukan Stok Jual Barang" name="stok">
							    <?php if (validation_errors()): ?>
							    	<small class="text-danger"><?= form_error('stok') ?></small>
							    <?php endif ?>
							  </div>
							 		</div>
							 		<div class="col-sm-6">
							 			 <div class="form-group">
							    <label >Harga Jual Barang</label>
							    <input type="text" class="form-control" placeholder="Masukan Harga Jual Barang"   name="harga">
							     <?php if (validation_errors()): ?>
							    	<small class="text-danger"><?= form_error('harga') ?></small>
							    <?php endif ?>
							  </div>
							  
							  
							 	</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block" name="krm_data" style="border-radius: 20px;">Kirim</button>
							</form>
                    		</div>
                    	</div>
                    </div>
                </div>
               
                    </div>
                