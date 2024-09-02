<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="card mx-auto shadow-lg" style="max-width: 50rem;">
        <div class="card-body">
            <h1 class="card-title mb-4"><?= $title ?></h1>

            <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>

            <?= form_open('inventory/suppliers/add') ?>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>" placeholder="Enter supplier name">
                            <p class="text-danger"><?= validation_show_error('name') ?></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contact">Contact Information</label>
                            <input type="text" class="form-control" id="contact" name="contact" value="<?= set_value('contact') ?>" placeholder="Enter contact information">
                            <p class="text-danger"><?= validation_show_error('contact') ?></p>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?= set_value('phone') ?>" placeholder="Enter phone number">
                            <p class="text-danger"><?= validation_show_error('phone') ?></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>" placeholder="Enter email address">
                            <p class="text-danger"><?= validation_show_error('email') ?></p>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="address">Address of the Supplier</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?= set_value('address') ?>" placeholder="Enter address">
                    <p class="text-danger"><?= validation_show_error('address') ?></p>
                </div>

                <div class="d-inline-flex justify-content-center w-100 mt-3">
                    <button type="submit" class="btn btn-primary d-flex align-items-center me-3">
                        <i class="fa fa-plus me-2"></i> Add Supplier
                    </button> &nbsp;
                    <a href="<?= site_url('inventory/suppliers') ?>" class="btn btn-secondary d-flex align-items-center">
                        <i class="fa fa-arrow-left me-2"></i> Back to List
                    </a>
                </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
