<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <title><?= $title ?></title>
  </head>
  <body>
    <div class="container mt-5 ">
        <div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-sm-6">
          <img src="https://cdn.dribbble.com/users/2416268/screenshots/6764317/ux-writingartboard_2-100.jpg" width="100%">
        </div>
        <div class="col-sm-6">
          <h2><b>Welcome Back :)</b></h2>
          <h4>Sistem Informasi Pelayanan Sembako</h4>
          <hr>
          <form method="post">
            <input type="hidden" class="form-control" name="<?=$csrf['name'];?>" value="<?=$csrf['hash']?>">
  <div class="form-group mt-3">
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Username" style="border: none;" name="username">
     <?php if (validation_errors()): ?>
                    <small class="text-danger"><?= form_error('username') ?></small>
                  <?php endif ?>
  </div>
  <div class="form-group mt-3">
    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Password" style="border: none;" name="password">
     <?php if (validation_errors()): ?>
                    <small class="text-danger"><?= form_error('password') ?></small>
                  <?php endif ?>
    <button class="btn btn-primary mt-3" name="login" type="submit">Login</button>
  </div>
</form>
        </div>
    </div>
    </div>     
      </div>
    </div>
    <?php if ($this->session->flashdata()): ?>
      <script type="text/javascript">
        setTimeout(function(){
           Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: '<?= $this->session->flashdata('flash') ?>',
        showConfirmButton: false,
        timer: 1000
      });
        }, 200);
       
      </script>
    <?php endif ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>