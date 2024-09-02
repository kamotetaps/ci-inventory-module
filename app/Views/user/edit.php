<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4 d-flex justify-content-center">
    <div class="card shadow-lg" style="width: 50rem;">
        <div class="card-body">
            <h2 class="text-center mb-4">Edit User</h2>
            <form action="<?= base_url(); ?>user/edit?id=<?= md5(set_value('UserID')."edit"); ?>" method="POST">
                <input type="hidden" name="UserID" value="<?= set_value('UserID'); ?>">

                <!-- Name Fields Row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group m-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="LastName" value="<?= set_value('LastName') ?>">
                            <p class="text-danger"><?= validation_show_error('LastName') ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group m-3">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" name="FirstName" value="<?= set_value('FirstName') ?>">
                            <p class="text-danger"><?= validation_show_error('FirstName') ?></p>
                        </div>
                    </div>
                </div>

                <!-- Middle Name and Username Row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group m-3">
                            <label class="form-label">Middle Name</label>
                            <input type="text" class="form-control" name="MiddleName" value="<?= set_value('MiddleName') ?>">
                            <p class="text-danger"><?= validation_show_error('MiddleName') ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group m-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="Username" value="<?= set_value('Username') ?>">
                            <p class="text-danger"><?= validation_show_error('Username') ?></p>
                        </div>
                    </div>
                </div>

                <!-- Password Fields Row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group m-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="Password" value="<?= set_value('Password') ?>">
                            <p class="text-danger"><?= validation_show_error('Password') ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group m-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="ConfirmPassword" value="<?= set_value('ConfirmPassword') ?>">
                            <p class="text-danger"><?= validation_show_error('ConfirmPassword') ?></p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-center align-items-center mt-4">
                    <button class="btn btn-success m-1" type="submit">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                    <a class="btn btn-danger m-1" href="<?= base_url() ?>user">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
