<?php 
$gren = 0;
$brg = 0;
$Barang = "";
if ($keranjang = $this->cart->contents()) {
	foreach ($keranjang as $key ) {
		$gren = $gren + $key['subtotal'];
		$brg = $brg + $key['qty'];
	}

}
 ?>

            <div class="content">
                <div class="container-fluid">
                 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">

                                
                               <?php if ($this->session->flashdata()): ?>
                 <h3 class="text-success text-center"><b> <?= $this->session->flashdata('flash') ?></b></h3>
                  <?php endif ?>
                                <div class="card-content">
                                	<div class="text-right">
                                	<h2 class="btn btn-lg  btn-success" style="font-size: 30px; border-radius: 20px;">Rp. <?= $this->cart->format_number($gren,0,',','.') ?></h2>
                                	</div>
                                	<div class="row">
                                		<form action="" method="POST">
                                			<input type="hidden" name="<?= $csrf['name'] ?>" value='<?= $csrf['hash'] ?>'>
                                		<div class="col-sm-6">
                                			 <div class="form-group">
									    <label for="exampleInputEmail1">Nama Penerima</label>
									    <input type="text" class="form-control" name="nama_penerima" placeholder="Nama Penerima">
									    <?php if (validation_errors()): ?>
							    	<small class="text-danger"><?= form_error('nama_penerima') ?></small>
							    <?php endif ?>
									  </div>
                                		</div>
                                		<div class="col-sm-6">
                                			 <div class="form-group">
									    <label for="exampleInputEmail1">Harga Beli</label>
									    <input type="text" name="harga" class="form-control" value="<?= $gren ?>">
									    <?php if (validation_errors()): ?>
							    	<small class="text-danger"><?= form_error('harga') ?></small>
							    <?php endif ?>
									  </div>
                                		</div>
                                		<div class="col-sm-6">
                                			 <div class="form-group">
									    <label for="exampleInputEmail1">Kode Transaksi</label>
									    <input type="text" name="kode" class="form-control" value="<?= $kode ?>">
									  </div>
                                		</div>
                                		<div class="col-sm-6">
                                			 <div class="form-group">
									    <label for="exampleInputEmail1">Jumlah Barang</label>
									    <input type="text" name="jmlbarang" class="form-control" value="<?= $brg ?>">
									  </div>
                                		</div>
                                		<p class="ml-2">Barang Yang Dibeli</p>
                                		<ul>
                                			<?php foreach ($keranjang as $key => $value): ?>
                                				
                                			<li><?= $value['name'] ?></li>

                                			<?php endforeach ?>
                                		</ul>
                                	</div>
                                	<button class="btn btn-primary" type="submit" name="bayar">Bayar</button>
                                		</form>
                                </div>
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>
                         
                         </div>

            </div>
          
        </div>
    </div>
