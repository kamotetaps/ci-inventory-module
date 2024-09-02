<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4 d-flex justify-content-center">
    <div class="card shadow-lg" style="width: 50rem;">
        <div class="card-body">
            <h1 class="text-center mb-4">Delete User</h1>

            <form action="<?= base_url(); ?>user/delete?id=<?= md5(set_value('UserID')."delete"); ?>" method="POST">
                <input type="hidden" name="UserID" value="<?= set_value('UserID'); ?>">

                <!-- User Details Display -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group m-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="LastName" value="<?= set_value('LastName') ?>" readonly>
                            <p class="text-danger"><?= validation_show_error('LastName') ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group m-3">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" name="FirstName" value="<?= set_value('FirstName') ?>" readonly>
                            <p class="text-danger"><?= validation_show_error('FirstName') ?></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group m-3">
                            <label class="form-label">Middle Name</label>
                            <input type="text" class="form-control" name="MiddleName" value="<?= set_value('MiddleName') ?>" readonly>
                            <p class="text-danger"><?= validation_show_error('MiddleName') ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group m-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="Username" value="<?= set_value('Username') ?>" readonly>
                            <p class="text-danger"><?= validation_show_error('Username') ?></p>
                        </div>
                    </div>
                </div>

                <!-- Confirmation Message -->
                <div class="text-center mt-4">
                    <p class="text-danger font-weight-bold">Do you want to delete this user?</p>
                </div>

                <!-- Action Buttons with Icons -->
                <div class="d-flex justify-content-center align-items-center mt-3">
                    <button class="btn btn-success m-2" type="submit">
                        <i class="fas fa-check"></i> Yes
                    </button>
                    <a class="btn btn-danger m-2" href="<?= base_url() ?>user">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
