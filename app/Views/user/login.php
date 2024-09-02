<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                <form method="post" action="<?= site_url('user/login') ?>">
                    <div>
               
                        <div class="row">
                             
                            <div class="col">
                                <div class="form-group m-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" name="Username" value="<?= set_value('Username')?>">
                                    <p class="text-danger"><?= validation_show_error('Username') ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group m-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="Password" value="<?= set_value('Password')?>">
                                    <p class="text-danger"><?= validation_show_error('Password') ?></p>
                                </div>
                            </div>
                             
                        </div>
                    </div>
                    <div class="d-lg-flex d-xl-flex justify-content-lg-center justify-content-xl-center align-items-xl-center mt-3">
                        <button class="btn btn-primary text-bg-primary m-1" type="submit">Login</button>
                     
                    </div>
                </form>  
                </div>
            </div>

<?= $this->endSection() ?>