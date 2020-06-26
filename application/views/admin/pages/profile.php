<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card" id="profile-main">

                                <div class="card-content">

                                    <h3>Welcome Kate!</h3>



                                    <div role="tabpanel">
                                        <ul class="nav nav-pills">
                                            <li class="active"><a href="#profile11" aria-controls="profile11" role="tab" data-toggle="tab">Profile</a>
                                            </li>
                                            <!-- <li><a href="#activities11" aria-controls="messages11" role="tab" data-toggle="tab">Activities</a>
                                            </li>
                                            <li><a href="#settings11" aria-controls="settings11" role="tab" data-toggle="tab">Settings</a>
                                            </li> -->

                                        </ul>

                                        <div class="tab-content">

                                            <div role="tabpanel" class="tab-pane active" id="profile11">     <?php if ($this->session->flashdata()): ?>
                                                        <h3><?= $this->session->flashdata('flash') ?></h3>
                                                    <?php endif ?>
                                                <form method="POST" >
                                                    <input type="hidden" class="form-control" name="<?=$csrf['name'];?>" value="<?=$csrf['hash']?>">
                                                <label for="">Masukan Passowrd Lama</label>
                                <input type="Password" class="form-control"  placeholder="Masukan Passowrd Lama" name="Passowrd">
                                <?php if (validation_errors()): ?>
                                    <small class="text-danger"><?= form_error('Passowrd') ?></small>
                                <?php endif ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="">Password Baru</label>
                                <input type="Password" class="form-control"  placeholder="Masukan Password Baru" name="Passwordbaru">
                                 <?php if (validation_errors()): ?>
                                    <small class="text-danger"><?= form_error('Passwordbaru') ?></small>
                                <?php endif ?>
                                    </div>
                                       <div class="col-sm-6">
                                        <label for="">Komfirmasi Password Baru</label>
                                <input type="Password" class="form-control"  placeholder="Komfirmasi Password Baru" name="Passwordbaru2">
                                 <?php if (validation_errors()): ?>
                                    <small class="text-danger"><?= form_error('Passwordbaru2') ?></small>
                                <?php endif ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="krm_data">Kirim</button>
                                </form>
                                            </div>

                                            <div role="tabpanel" class="tab-pane" id="activities11">
                                                <div class="widget p-25">

                                                    <div class="widget-body">
                                                        <div class="streamline sl-style-2">
                                                            <div class="sl-item sl-primary">
                                                                <div class="sl-content">
                                                                    <small class="text-muted">5 mins ago</small>
                                                                    <p>Williams has just joined Project X</p>
                                                                </div>
                                                            </div>
                                                            <div class="sl-item sl-danger">
                                                                <div class="sl-content">
                                                                    <small class="text-muted">25 mins ago</small>
                                                                    <p>Jane sent you a request to grant access to the project folder</p>
                                                                </div>
                                                            </div>
                                                            <div class="sl-item sl-success">
                                                                <div class="sl-content">
                                                                    <small class="text-muted">40 mins ago</small>
                                                                    <p>Kate added you to her team</p>
                                                                </div>
                                                            </div>
                                                            <div class="sl-item">
                                                                <div class="sl-content">
                                                                    <small class="text-muted">55</small>
                                                                    <p>John has finished his task</p>
                                                                </div>
                                                            </div>
                                                            <div class="sl-item sl-warning">
                                                                <div class="sl-content">
                                                                    <small class="text-muted">60 mins ago</small>
                                                                    <p>Jim shared a folder with you</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="settings11">
                                                <div class="widget p-25">
                                                    <div class="widget-body">
                                                        <div class="select">
                                                            <select class="form-control">
																		<option>Select an Option</option>
																		<option>Option 1</option>
																		<option>Option 2</option>
																		<option>Option 3</option>
																		<option>Option 4</option>
																		<option>Option 5</option>
																	</select>
                                                        </div>
                                                        <div class="select m-t-15">
                                                            <select class="form-control">
																		<option>Select an Option</option>
																		<option>Option 1</option>
																		<option>Option 2</option>
																		<option>Option 3</option>
																		<option>Option 4</option>
																		<option>Option 5</option>
																	</select>
                                                        </div>

                                                        <div class="togglebutton m-t-30">
                                                            <label>
                                        <input type="checkbox"> Toggle Setting 1
                                    </label>
                                                        </div>
                                                        <div class="togglebutton m-t-15">
                                                            <label>
                                        <input type="checkbox" checked> Toggle Setting 2
                                    </label>
                                                        </div>

                                                        <div class="checkbox m-b-15 m-t-30">
                                                            <label><input type="checkbox" value=""><i class="input-helper f-10"></i>Settings option 1</label>
                                                        </div>
                                                        <div class="checkbox m-b-15 m-t-10">
                                                            <label><input type="checkbox" value=""><i class="input-helper f-10"></i>Settings option 2</label>
                                                        </div>

                                                        <div class="m-t-30">
                                                            <div class="radio">
                                                                <label>
                                                                          <input type="radio" name="optionsRadios" checked="true"> Option 1
                                                                      </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                          <input type="radio" name="optionsRadios"> Option 2
                                                                      </label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-profile">
                                <div class="card-avatar">
                                        <img class="img" src="https://icons-for-free.com/iconfiles/png/512/headset+male+man+support+user+young+icon-1320196267025138334.png" />
                                </div>
                                <div class="card-content">
                                    <h6 class="category text-gray">Administrator</h6>
                                    <h4 class="card-title">Jeryan Haryogi</h4>
                                    </p>
                                    <a href="#pablo" class="btn btn-rose btn-round">Follow</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>