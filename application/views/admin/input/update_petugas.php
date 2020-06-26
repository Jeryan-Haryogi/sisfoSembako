

       
            <div class="content">
            	   <div class="container">
                    	<div class="row">
                    		<div class="col-sm-12">
                    			<?php foreach ($petugas as $d): ?>
                    				
                    		
                    			<form action="" method="POST">
                    				<input type="hidden" class="form-control" name="<?=$csrf['name'];?>" value="<?=$csrf['hash']?>">
							 	<div class="row">
							 		<div class="col-sm-6">
							 			 <div class="form-group">
							    <label for="nama_lkp">Nama Lengkap</label>
							    <input type="text" class="form-control"  value="<?= $d['nama_lengkap'] ?>" name="nama_lengkap">
							    <?php if (validation_errors()): ?>
							    	<small class="text-danger"><?= form_error('nama_lengkap') ?></small>
							    <?php endif ?>
							  </div>
							 		</div>
							 		<div class="col-sm-6">
							 			 <div class="form-group">
							    <label for="username">Masukan Username</label>
							    <input type="text" class="form-control" value="<?= $d['username'] ?>" name="username">
							     <?php if (validation_errors()): ?>
							    	<small class="text-danger"><?= form_error('username') ?></small>
							    <?php endif ?>
							  </div>
							 		</div>
							 		<?php $password2 = $d['password'] ?>
							 		<div class="col-sm-6">
							 			 <div class="form-group">
							    <label for="password">Masukan Password</label>
							    <input type="password" class="form-control" value="<?= $d['password'] ?>" name="password">
							     <?php if (validation_errors()): ?>
							    	<small class="text-danger"><?= form_error('password') ?></small>
							    <?php endif ?>
							  </div>
							 		</div>
							 		<div class="col-sm-6">
							 			 <div class="form-group">
							    <label for="">Komfirmasi Password</label>
							    <input type="password" value="<?= $password2?>" class="form-control"  name="password2">
							     <?php if (validation_errors()): ?>
							    	<small class="text-danger"><?= form_error('password2') ?></small>
							    <?php endif ?>
							  </div>
							 		</div>
							 		
							 	</div>
							 	 <div class="form-group">
							    <label for="">Kode Petugas</label>
							    <input type="text" class="form-control" value="<?= $d['kode_petugas'] ?>" name="kode_petugas">
							     <?php if (validation_errors()): ?>
							    	<small class="text-danger"><?= form_error('kode_petugas') ?></small>
							    <?php endif ?>
							  </div>
							 	 <div class="form-group">
							    <label for="">Level</label>
							  <select class="form-control" id="exampleFormControlSelect1" name="level">
					      <option value="PETUGAS">PETUGAS</option>
					    </select>    							  
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block" name="krm_data">Kirim</button>
							</form>
								<?php endforeach ?>
                    		</div>
                    	</div>
                    </div>
                </div>
               
                    </div>
                 